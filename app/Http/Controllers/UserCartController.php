<?php

namespace App\Http\Controllers;

use App\Helpers\ToastHelper;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductDB;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = ProductDB::where('is_available', 1)
            ->whereNull('deleted_at')
            ->get()
            ->groupBy(function ($product) {
                return $product->category . '|' . $product->brand . '|' . $product->type;
            });

        $groupedProducts = [];
        foreach ($products as $key => $productGroup) {
            list($category, $brand, $type) = explode('|', $key);
            $groupedProducts[] = [
                'category' => $category,
                'brand' => $brand,
                'type' => $type,
                'products' => $productGroup,
                'total_quantity' => $productGroup->count(),
                'available_quantity' => $productGroup->where('is_available', 1)->count()
            ];
        }

        // Sort by category, brand, and type
        usort($groupedProducts, function ($a, $b) {
            $categoryCompare = strcmp($a['category'], $b['category']);
            if ($categoryCompare !== 0) return $categoryCompare;

            $brandCompare = strcmp($a['brand'], $b['brand']);
            if ($brandCompare !== 0) return $brandCompare;

            return strcmp($a['type'], $b['type']);
        });

        return view('page.cart.index', [
            'groupedProducts' => $groupedProducts,
            'title' => 'Product Catalog'
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $product = ProductDB::findOrFail($request->product_id);

            if (!$product->is_available) {
                ToastHelper::error('Product is not available');
                return redirect()->back();
            }

            $cart = new UserCart();
            $cart->user_id = Auth::id();
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->notes = $request->notes;
            $cart->requested_at = now();
            $cart->save();

            DB::commit();

            ToastHelper::success('Product added to cart successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            ToastHelper::error('Failed to add product to cart: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function removeFromCart($id)
    {
        try {
            $cart = UserCart::where('user_id', Auth::id())
                ->where('id', $id)
                ->where('status', 'pending')
                ->firstOrFail();

            $cart->delete();

            ToastHelper::success('Product removed from cart successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            ToastHelper::error('Failed to remove product from cart');
            return redirect()->back();
        }
    }

    public function myCart()
    {
        $cartItems = UserCart::with(['product', 'user'])
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->get();

        return view('page.cart.my-cart', [
            'cartItems' => $cartItems,
            'title' => 'My Cart'
        ]);
    }

    public function approveCart($id)
    {
        if (!Auth::user()->hasRole(['admin', 'owner', 'super_user'])) {
            ToastHelper::error('Unauthorized access');
            return redirect()->back();
        }

        try {
            DB::beginTransaction();

            $cart = UserCart::findOrFail($id);
            $cart->status = 'approved';
            $cart->approved_at = now();
            $cart->approved_by = Auth::id();
            $cart->save();

            // Update product availability
            $product = ProductDB::findOrFail($cart->product_id);
            $product->is_available = 0;
            $product->save();

            DB::commit();

            ToastHelper::success('Cart request approved successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            ToastHelper::error('Failed to approve cart request');
            return redirect()->back();
        }
    }

    public function rejectCart($id)
    {
        if (!Auth::user()->hasRole(['admin', 'owner', 'super_user'])) {
            ToastHelper::error('Unauthorized access');
            return redirect()->back();
        }

        try {
            $cart = UserCart::findOrFail($id);
            $cart->status = 'rejected';
            $cart->save();

            ToastHelper::success('Cart request rejected successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            ToastHelper::error('Failed to reject cart request');
            return redirect()->back();
        }
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:20',
            'notes' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $cartItems = UserCart::with('product')
                ->where('user_id', Auth::id())
                ->where('status', 'pending')
                ->get();

            if ($cartItems->isEmpty()) {
                ToastHelper::error('Your cart is empty');
                return redirect()->back();
            }

            // Calculate amounts
            $totalAmount = 0;
            $totalRentalAmount = 0;
            foreach ($cartItems as $item) {
                $totalAmount += $item->product->rental_price * $item->quantity;
                $totalRentalAmount += $item->product->rental_price * $item->quantity;
            }

            // Create order
            $order = new Order();
            $order->order_number = Order::generateOrderNumber();
            $order->user_id = Auth::id();
            $order->user_name = $request->user_name;
            $order->user_email = $request->user_email;
            $order->user_phone = $request->user_phone;
            $order->total_amount = $totalAmount;
            $order->rental_amount = $totalRentalAmount;
            $order->total_rental_amount = $totalRentalAmount;
            $order->notes = $request->notes;
            $order->order_date = now();
            $order->save();

            // Create order items
            foreach ($cartItems as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item->product_id;
                $orderItem->quantity = $item->quantity;
                $orderItem->rental_amount = $item->product->rental_price;
                $orderItem->total_rental_amount = $item->product->rental_price * $item->quantity;
                $orderItem->notes = $item->notes;
                $orderItem->save();

                // Update cart item status
                $item->status = 'ordered';
                $item->save();
            }

            DB::commit();

            ToastHelper::success('Order placed successfully');
            return redirect()->route('orders.show', $order->id);
        } catch (\Exception $e) {
            DB::rollBack();
            ToastHelper::error('Failed to place order: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function showCheckout()
    {
        $cartItems = UserCart::with('product')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->get();

        if ($cartItems->isEmpty()) {
            ToastHelper::error('Your cart is empty');
            return redirect()->route('catalog');
        }

        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item->product->rental_price * $item->quantity;
        }

        return view('page.cart.checkout', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'title' => 'Checkout'
        ]);
    }
}
