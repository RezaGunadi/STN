<?php

namespace App\Http\Controllers;

use App\Helpers\ToastHelper;
use App\Models\JobsDB;
use App\Models\JobDetailsDB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function processOrder($orderId)
    {
        try {
            DB::beginTransaction();

            $order = Order::with('items.product')->findOrFail($orderId);

            // Create job
            $job = new JobsDB();
            $job->event_name = 'Order #' . $order->order_number;
            $job->event_location = $order->user_address ?? '';
            $job->total_price = $order->total_amount;
            $job->price_before_discount = $order->total_amount;
            $job->discount = 0;
            $job->additional_price = 0;
            $job->client = $order->user_id;
            $job->start_date = now();
            $job->created_by = Auth::id();
            $job->save();

            // Process each order item
            foreach ($order->items as $orderItem) {
                $product = $orderItem->product;
                $quantity = $orderItem->quantity;

                // Find available products of same type, brand, and category
                $availableProducts = ProductDB::where('category', $product->category)
                    ->where('brand', $product->brand)
                    ->where('type', $product->type)
                    ->orderBy('is_available', 'desc')
                    ->orderBy('updated_at', 'asc')
                    ->orderBy('id', 'desc')
                    ->take($quantity)
                    ->get();

                // If not enough available products, create new ones
                if ($availableProducts->count() < $quantity) {
                    $needed = $quantity - $availableProducts->count();
                    for ($i = 0; $i < $needed; $i++) {
                        $newProduct = $product->replicate();
                        $newProduct->product_code = $product->product_code . '-' . Str::random(4);
                        $newProduct->is_available = 1;
                        $newProduct->save();
                        $availableProducts->push($newProduct);
                    }
                }

                // Create job details for each product
                foreach ($availableProducts as $availableProduct) {
                    $jobDetail = new JobDetailsDB();
                    $jobDetail->event_id = $job->id;
                    $jobDetail->id_product = $availableProduct->id;
                    $jobDetail->total_price = $availableProduct->rental_price;
                    $jobDetail->price_before_discount = $availableProduct->rental_price;
                    $jobDetail->discount = 0;
                    $jobDetail->additional_price = 0;
                    $jobDetail->created_by = Auth::id();
                    $jobDetail->save();

                    // Update product availability
                    $availableProduct->is_available = 0;
                    $availableProduct->event_id = $job->id;
                    $availableProduct->save();
                }
            }

            // Update order status
            $order->status = 'in_progress';
            $order->save();

            DB::commit();

            ToastHelper::success('Order processed into job successfully');
            return redirect()->route('jobs.show', $job->id);
        } catch (\Exception $e) {
            DB::rollBack();
            ToastHelper::error('Failed to process order: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $job = JobsDB::with(['details.product', 'order'])->findOrFail($id);
        return view('page.jobs.show', [
            'job' => $job,
            'title' => 'Job Details'
        ]);
    }
}
