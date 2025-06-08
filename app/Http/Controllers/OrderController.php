<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\ProductDB;
use App\Models\JobsDB;
use App\Models\JobDetailsDB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::with(['user', 'items.product'])
            ->latest()
            ->paginate(10);
        $title = 'order';

        return view('orders.index', compact('orders', 'title'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items.product'])
            ->findOrFail($id);

        $title = 'order';
        return view('orders.show', compact('order', 'title'));
    }

    public function getOrderHistory(Request $request)
    {
        try {
            $orders = Order::with(['user', 'items.product'])
                ->latest()
                ->paginate(10);

            return response()->json([
                'status' => 'success',
                'data' => $orders
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memuat data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function process($id)
    {
        try {
            $order = Order::with(['user', 'items.product'])->findOrFail($id);

            // Update order status to process
            $order->status = 'process';
            $order->payment_status = 'paid';

            $order->save();

            // Create event for each order item
            foreach ($order->items as $item) {
                // Find matching products with same brand, category, and type
                $matchingProducts = ProductDB::where('brand', $item->product->brand)
                    ->where('category', $item->product->category)
                    ->where('type', $item->product->type)
                    ->where('is_available', 1)
                    ->orderBy('updated_at', 'asc')
                    ->take($item->quantity)
                    ->get();

                if ($matchingProducts->count() > 0) {
                    // Create event for each matching product
                    foreach ($matchingProducts as $product) {
                        $job = JobsDB::create([
                            'event_name' => 'Order #' . $order->order_number,
                            'client' => $order->user_id,
                            'order_id' => $order->id,
                            'status' => 'process',
                            'created_by' => auth()->id()
                        ]);

                        // Create job detail
                        JobDetailsDB::create([
                            'event_id' => $job->id,
                            'id_product' => $product->id,
                            'is_installed' => false,
                            'created_by' => auth()->id()
                        ]);

                        // Update product availability
                        $product->is_available = 0;
                        $product->event_id = $job->id;
                        $product->save();
                    }
                }
            }

            return redirect()->route('orders.show', $order->id)
                ->with('success', 'Order has been processed successfully');
        } catch (\Exception $e) {
            return redirect()->route('orders.show', $id)
                ->with('error', 'Failed to process order: ' . $e->getMessage());
        }
    }
}
