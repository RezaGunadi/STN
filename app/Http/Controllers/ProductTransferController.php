<?php

namespace App\Http\Controllers;

use App\Models\ProductDB;
use App\Models\TeamsDB;
use App\Models\ProductTransfer;
use App\Models\HistoriesDB;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ToastHelper;
class ProductTransferController extends Controller
{
    public function index()
    {
        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        $teams = TeamsDB::groupBy('group_id')->get();
        $title = 'Transfer Produk';
        $transfers = ProductTransfer::with(['product', 'fromTeam', 'toTeam'])->get();
        return view('page.transaction.transfer', compact('teams', 'title', 'transfers'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $teamId = $request->input('team_id');

        // Get the team's group_id
        // $team = Team::find($teamId);
        // if (!$team) {
        //     return response()->json([]);
        // }

        $products = ProductDB::where('team_id', $teamId)
            ->where(function ($q) use ($query) {
                $q->where('product_code', 'like', "%{$query}%")
                    ->orWhere('product_name', 'like', "%{$query}%");
            })
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'text' => $product->product_code . ' - ' . $product->product_name,
                    'product_code' => $product->product_code,
                    'product_name' => $product->product_name,
                    'status' => $product->status
                ];
            });

        return response()->json($products);
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'source_team' => 'required|exists:teams,id',
            'destination_team' => 'required|exists:teams,id|different:source_team',
            'product_ids' => 'required|array',
        ]);
        // dd($request->all());
        try {
            DB::beginTransaction();

            foreach ($request->product_ids as $productId) {
                $product = ProductDB::findOrFail($productId);

                // Check if product belongs to source team
                if ($product->team_id != $request->source_team) {
                    throw new \Exception("Product does not belong to source team");
                }

                // Track old values for history
                $oldTeamId = $product->team_id;
                $additionalData = $product->toArray();

                // Create transfer record
                ProductTransfer::create([
                    'product_id' => $productId,
                    'source_team_id' => $request->source_team,
                    'destination_team_id' => $request->destination_team,
                    'quantity' => 1,
                    'status' => 'completed',
                    'transferred_by' => auth()->id()
                ]);

                // Update product team_id to destination team
                $product->update([
                    'team_id' => $request->destination_team
                ]);

                // Create history entry
                $history = new HistoriesDB();
                $history->input(
                    $product->id,
                    'product',
                    'update',
                    $oldTeamId,
                    $request->destination_team,
                    'team_id',
                    $additionalData
                );

                // // Record history
                // History::create([
                //     'user_id' => Auth::id(),
                //     'action' => 'transfer_product',
                //     'description' => "Transferred 1 unit of product '{$product->product_name}' from team '{$oldTeamId}' to team '{$request->destination_team}'",
                //     'data' => [
                //         'product_id' => $product->id,
                //         'from_team_id' => $oldTeamId,
                //         'to_team_id' => $request->destination_team,
                //         'quantity' => 1,
                //         'transfer_id' => $history->id
                //     ]
                // ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Transfer berhasil dilakukan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $products = ProductDB::all();
        $teams = TeamsDB::all();
        return view('product-transfers.create', compact('products', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'from_team_id' => 'required|exists:teams,id',
            'to_team_id' => 'required|exists:teams,id|different:from_team_id',
            'quantity' => 'required|integer|min:1',
            'transfer_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        $product = ProductDB::where('id', $request->product_id)->first();
        if ($product->team_id != $request->from_team_id) {
            ToastHelper::error('Product is not in the specified source team.');
            return back();
        }

        if ($product->quantity < $request->quantity) {
            ToastHelper::error('Insufficient product quantity.');
            return back();
        }

        $transfer = ProductTransfer::create($request->all());

        // Update product quantity
        // $product->quantity -= $request->quantity;
        // $product->save();

        // Create new product instance for destination team
        // $newProduct = $product->replicate();
        // $newProduct->team_id = $request->to_team_id;
        // $newProduct->quantity = $request->quantity;
        // $newProduct->save();
        $product->update([
            'team_id' => $request->to_team_id,
            // 'quantity' => $product->quantity - $request->quantity
        ]);
        // Record history
        HistoriesDB::create([
            'ref_id' => $product->id,
            'created_by' => Auth::id(),
            'ref_type' => 'transfer_product',
            'desc' => "Transferred {$request->quantity} units of product '{$product->product_name}' from team '{$request->from_team_id}' to team '{$request->to_team_id}'",
            'data' => [
                'product_id' => $product->id,
                'from_team_id' => $request->from_team_id,
                'to_team_id' => $request->to_team_id,
                'quantity' => $request->quantity,
                'transfer_id' => $transfer->id
            ]
        ]);

        ToastHelper::success('Product transfer created successfully.');
        return redirect()->route('product-transfers.index');
    }

    public function show(ProductTransfer $productTransfer)
    {
        return view('product-transfers.show', compact('productTransfer'));
    }

    public function edit(ProductTransfer $productTransfer)
    {
        $products = ProductDB::all();
        $teams = TeamsDB::all();
        return view('product-transfers.edit', compact('productTransfer', 'products', 'teams'));
    }

    public function update(Request $request, ProductTransfer $productTransfer)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'from_team_id' => 'required|exists:teams,id',
            'to_team_id' => 'required|exists:teams,id|different:from_team_id',
            'quantity' => 'required|integer|min:1',
            'transfer_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        $oldQuantity = $productTransfer->quantity;
        $productTransfer->update($request->all());

        // Record history
        HistoriesDB::create([
            'ref_id' => $productTransfer->id,
            'created_by' => Auth::id(),
            'ref_type' => 'update_transfer',
            'desc' => "Updated transfer of product '{$productTransfer->product->product_name}' from team '{$request->from_team_id}' to team '{$request->to_team_id}'",
            'data' => [
                'product_id' => $productTransfer->product_id,
                'from_team_id' => $request->from_team_id,
                'to_team_id' => $request->to_team_id,
                'old_quantity' => $oldQuantity,
                'new_quantity' => $request->quantity,
                'transfer_id' => $productTransfer->id
            ]
        ]);

        return redirect()->route('product-transfers.index')
            ->with('success', 'Product transfer updated successfully.');
    }

    public function destroy(ProductTransfer $productTransfer)
    {
        // Record history before deletion
        HistoriesDB::create([
            'ref_id' => $productTransfer->id,
            'created_by' => Auth::id(),
            'ref_type' => 'delete_transfer',
            'desc' => "Deleted transfer of product '{$productTransfer->product->product_name}' from team '{$productTransfer->fromTeam->name}' to team '{$productTransfer->toTeam->name}'",
            'data' => [
                'product_id' => $productTransfer->product_id,
                'from_team_id' => $productTransfer->from_team_id,
                'to_team_id' => $productTransfer->to_team_id,
                'quantity' => $productTransfer->quantity,
                'transfer_id' => $productTransfer->id
            ]
        ]);

        $productTransfer->delete();

        return redirect()->route('product-transfers.index')
            ->with('success', 'Product transfer deleted successfully.');
    }
}
