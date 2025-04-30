<?php

namespace App\Http\Controllers;

use App\Models\HistoriesDB;
use App\Models\ProductDB;
use App\Models\ProductTypeDB;
use App\Models\TeamsDB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use ProductType;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request)
    {
        $data = $request->all();
        $startFrom = 0;
        $limit = 100;
        $orderBy = 'product_code';
        $orderPriority = 'asc';
        if (array_key_exists('start_from', $data)) {
            $startFrom = $data['start_from'];
        }
        if (array_key_exists('limit', $data)) {
            $limit = $data['limit'];
        }
        if (array_key_exists('order_by', $data)) {
            $limit = $data['order_by'];
        }
        if (array_key_exists('order_priority', $data)) {
            $limit = $data['order_priority'];
        }
        $result = ProductDB::
            // take($limit)->skip($startFrom)->
            orderBy($orderBy, $orderPriority);

        if (array_key_exists('category', $data)) {
            $result = $result->where('category', 'LIKE', '%' . $data['category'] . '%');
        }
        if (array_key_exists('type', $data)) {
            $result = $result->where('type', 'LIKE', '%' . $data['type'] . '%');
        }
        if (array_key_exists('brand', $data)) {
            $result = $result->where('brand', 'LIKE', '%' . $data['brand'] . '%');
        }
        if (array_key_exists('product_code', $data)) {
            $result = $result->where('product_code', 'LIKE', '%' . $data['product_code'] . '%');
        }
        if (array_key_exists('product_name', $data)) {
            $result = $result->where('product_name', 'LIKE', '%' . $data['product_name'] . '%');
        }

        // Get all products for grouping
        $allProducts = $result->get();

        // Group products by category, brand, and type
        $groupedProducts = [];
        foreach ($allProducts as $product) {
            $key = $product->category . '|' . $product->brand . '|' . $product->type;
            if (!isset($groupedProducts[$key])) {
                $groupedProducts[$key] = [
                    'category' => $product->category,
                    'brand' => $product->brand,
                    'type' => $product->type,
                    'products' => [],
                    'total_quantity' => 0,
                    'available_quantity' => 0,
                    'non_available_quantity' => 0
                ];
            }
            $groupedProducts[$key]['products'][] = $product;
            $groupedProducts[$key]['total_quantity']++;
            if ($product->is_available == 1) {
                $groupedProducts[$key]['available_quantity']++;
            } else {
                $groupedProducts[$key]['non_available_quantity']++;
            }
        }

        // Sort groups by category, brand, and type
        ksort($groupedProducts);

        // Paginate the results for standard view
        $result = $result->paginate(10);

        return view('page.product.list', [
            'data' => $result,
            'groupedProducts' => $groupedProducts,
            'number' => $startFrom,
            'title' => 'product'
        ]);
    }
    public function myItem(Request $request)
    {
        $data = $request->all();
        $startFrom = 0;
        $limit = 100;
        $orderBy = 'product_code';
        $orderPriority = 'asc';
        if (array_key_exists('start_from', $data)) {
            $startFrom = $data['start_from'];
        }
        if (array_key_exists('limit', $data)) {
            $limit = $data['limit'];
        }
        if (array_key_exists('order_by', $data)) {
            $limit = $data['order_by'];
        }
        if (array_key_exists('order_priority', $data)) {
            $limit = $data['order_priority'];
        }
        $myTeamIds = TeamsDB::where('user_id', Auth::user()->id)->pluck('group_id');
        $result = ProductDB::
            // take($limit)->skip($startFrom)->
            orderBy($orderBy, $orderPriority);
        $result = $result->whereIn('team_id', $myTeamIds);

        if (array_key_exists('category', $data)) {
            $result = $result->where('category', 'LIKE', '%' . $data['category'] . '%');
        }
        if (array_key_exists('type', $data)) {
            $result = $result->where('type', 'LIKE', '%' . $data['type'] . '%');
        }
        if (array_key_exists('brand', $data)) {
            $result = $result->where('brand', 'LIKE', '%' . $data['brand'] . '%');
        }
        if (array_key_exists('product_code', $data)) {
            $result = $result->where('product_code', 'LIKE', '%' . $data['product_code'] . '%');
        }
        if (array_key_exists('product_name', $data)) {
            $result = $result->where('product_name', 'LIKE', '%' . $data['product_name'] . '%');
        }
        if (array_key_exists('input_date', $data)) {
            if ($data['input_date'] != '') {
                # code...
                $paramStart = Carbon::parse($data['input_date'] . ' 00:00:00')->format('Y-m-d H:i:s');
                $paramEnd = Carbon::parse($data['input_date'] . ' 23:59:59')->format('Y-m-d H:i:s');
                $result = $result->where(
                    'created_at',
                    '>=',
                    $paramStart
                )->where(
                    'created_at',
                    '<=',
                    $paramEnd
                );
            }
        }
        $result = $result->paginate(10);
        return view('page.profile.item_list', ['data' => $result, 'number' => $startFrom, 'title' => 'my item']);
    }
    public function submit(Request $request)
    {
        $data = $request->all();
        # code...
        $data['category'] = strtoupper($data['category']);
        $data['brand'] = strtoupper($data['brand']);
        $data['type'] = strtoupper($data['type']);
        $data['looping'] = (int) $request->total_input_item;
        $productType = ProductTypeDB::whereNull('deleted_at')
            ->where('category', $data['category'])
            ->where('brand', $data['brand'])
            ->where('type', $data['type'])->first();
        for ($xxx = 0; $xxx < $data['looping']; $xxx++) {
            $data['price'] = preg_replace('/[^0-9]/', '', $data['price']);
            $data['rental_price'] = preg_replace('/[^0-9]/', '', $data['rental_price']);
            $product = new ProductDB();
            $product->product_name = $data['name'];
            $product->description = $data['description'];
            $product->brand = $data['brand'];
            $product->category = $data['category'];
            $product->type = $data['type'];
            $product->payment_date =
                date("Y-m-d", strtotime($data['date']));
            $product->price = $data['price'];
            $product->purchase_price = $data['price'];
            $product->rental_price = $data['rental_price'];
            $product->status = $data['status'];
            // dd($data);qr_string
            $totalType = ProductDB::whereNull('deleted_at')
                ->where('category', $data['category'])
                ->where('brand', $data['brand'])
                ->where('type', $data['type'])->count();
            if ($productType) {
                $newCode = $productType->code;
                $code = $this->generateCode($totalType, $newCode);
            } else {
                $newCode = $this->generateNewCode($data['category'], $data['brand'], $data['type']);
                $code = $this->generateCode($totalType, $newCode);
            }
            if (array_key_exists('consumable', $data)) {
                $product->is_consumable = 1;
            }
            // if ($data['code'] != null) {
            //     if ($data['looping'] > 1) {
            //         $product->product_code = $code;
            //     } else {
            //         $product->product_code = $data['code'];
            //     }
            // } else {
            $product->product_code = $code;
            // }
            $product->code = $code;

            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 100; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $product->qr_string = $randomString;
            $product->created_by =
                Auth::user()->id;
            $product->save();
            // dd($data);

            if (!$productType) {
                $productType = new ProductTypeDB();
                $productType->category = $data['category'];
                $productType->brand = $data['brand'];
                $productType->type = $data['type'];
                $productType->code = $newCode;
                $productType->created_by = Auth::user()->id;
                $productType->save();
            }
        }


        return redirect(URL::To('/list-product'))->with('success', 'Berhasil menambahkan produk');
    }
    public function input()
    {
        return view('page.product.input', ['title' => 'product']);
    }
    public function edit($code)
    {
        $product = ProductDB::where('product_code', $code)->first();
        return view('page.product.edit', ['data' => $product, 'title' => 'product']);
    }

    public function submitEdit(Request $request)
    {
        $data = $request->all();
        $data['category'] = strtoupper($data['category']);
        $data['brand'] = strtoupper($data['brand']);
        $data['type'] = strtoupper($data['type']);

        $product = ProductDB::where('id', $data['id'])->first();
        $oldData = clone $product;
        if (array_key_exists('product_code', $data)) {
            $product->product_code = $data['product_code'];
        } else {
            $product->product_code = $oldData->product_code;
        }
        if (array_key_exists('product_name', $data)) {
            $product->product_name = $data['product_name'];
        } else {
            $product->product_name = $oldData->product_name;
        }
        if (array_key_exists('category', $data)) {
            $product->category = $data['category'];
        } else {
            $product->category = $oldData->category;
        }
        if (array_key_exists('brand', $data)) {
            $product->brand = $data['brand'];
        } else {
            $product->brand = $oldData->brand;
        }
        if (array_key_exists('type', $data)) {
            $product->type = $data['type'];
        } else {
            $product->type = $oldData->type;
        }
        if (array_key_exists('code', $data)) {
            $product->code = $data['code'];
        } else {
            $product->code = $oldData->code;
        }
        if (array_key_exists('description', $data)) {
            $product->description = $data['description'];
        } else {
            $product->description = $oldData->description;
        }
        if (array_key_exists('payment_date', $data)) {
            $product->payment_date = $data['payment_date'];
        } else {
            $product->payment_date = $oldData->payment_date;
        }
        if (array_key_exists('purpose_used', $data)) {
            $product->purpose_used = $data['purpose_used'];
        } else {
            $product->purpose_used = $oldData->purpose_used;
        }
        if (array_key_exists('price', $data)) {
            $data['price'] = preg_replace('/[^0-9]/', '', $data['price']);
            $product->price = $data['price'];
        } else {
            $product->price = $oldData->price;
        }
        if (array_key_exists('rental_price', $data)) {
            $data['rental_price'] = preg_replace('/[^0-9]/', '', $data['rental_price']);
            $product->rental_price = $data['rental_price'];
        } else {
            $product->rental_price = $oldData->rental_price;
        }
        if (array_key_exists('status', $data)) {
            $product->status = $data['status'];
        } else {
            $product->status = $oldData->status;
        }
        if (array_key_exists('event_id', $data)) {
            $product->event_id = $data['event_id'];
        } else {
            $product->event_id = $oldData->event_id;
        }
        if (array_key_exists('storage_location', $data)) {
            $product->storage_location = $data['storage_location'];
        } else {
            $product->storage_location = $oldData->storage_location;
        }
        if (array_key_exists('is_available', $data)) {
            $product->is_available = $data['is_available'];
        } else {
            $product->is_available = $oldData->is_available;
        }
        if (array_key_exists('note', $data)) {
            $product->note = $data['note'];
        } else {
            $product->note = $oldData->note;
        }
        if (array_key_exists('user_id', $data)) {
            $product->user_id = $data['user_id'];
        } else {
            $product->user_id = $oldData->user_id;
        }
        if (array_key_exists('qr_string', $data)) {
            $product->qr_string = $data['qr_string'];
        } else {
            $product->qr_string = $oldData->qr_string;
        }
        if (array_key_exists('is_consumable', $data)) {
            $product->is_consumable = $data['is_consumable'];
        } else {
            $product->is_consumable = $oldData->is_consumable;
        }
        if (array_key_exists('remarks', $data)) {
            $product->remarks = $data['remarks'];
        } else {
            $product->remarks = $oldData->remarks;
        }
        if (array_key_exists('created_by', $data)) {
            $product->created_by = Auth::user()->id;
        } else {
            $product->created_by = Auth::user()->id;
        }
        if (array_key_exists('deleted_by', $data)) {
            $product->deleted_by = $data['deleted_by'];
        } else {
            $product->deleted_by = $oldData->deleted_by;
        }
        if (array_key_exists('updated_by', $data)) {
            $product->updated_by = $data['updated_by'];
        } else {
            $product->updated_by = $oldData->updated_by;
        }

        $additionalData = clone $oldData;
        $additionalData = $additionalData->toArray();

        $history = new HistoriesDB();
        $old = '';
        $new = '';
        $column = '';


        if (array_key_exists('product_code', $data)) {
            if ($data['product_code'] != $additionalData['product_code']) {
                $column = 'product_code';
                $old = $additionalData['product_code'];
                $new = $data['product_code'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('product_name', $data)) {
            if ($data['product_name'] != $additionalData['product_name']) {
                $column = 'product_name';
                $old = $additionalData['product_name'];
                $new = $data['product_name'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('category', $data)) {

            if ($data['category'] != $additionalData['category']) {
                $column = 'category';
                $old = $additionalData['category'];
                $new = $data['category'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('brand', $data)) {

            if ($data['brand'] != $additionalData['brand']) {
                $column = 'brand';
                $old = $additionalData['brand'];
                $new = $data['brand'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('type', $data)) {

            if ($data['type'] != $additionalData['type']) {
                $column = 'type';
                $old = $additionalData['type'];
                $new = $data['type'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('code', $data)) {

            if ($data['code'] != $additionalData['code']) {
                $column = 'code';
                $old = $additionalData['code'];
                $new = $data['code'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('description', $data)) {

            if ($data['description'] != $additionalData['description']) {
                $column = 'description';
                $old = $additionalData['description'];
                $new = $data['description'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('payment_date', $data)) {

            if ($data['payment_date'] != $additionalData['payment_date']) {
                $column = 'payment_date';
                $old = $additionalData['payment_date'];
                $new = $data['payment_date'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('purpose_used', $data)) {

            if ($data['purpose_used'] != $additionalData['purpose_used']) {
                $column = 'purpose_used';
                $old = $additionalData['purpose_used'];
                $new = $data['purpose_used'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('price', $data)) {

            if ($data['price'] != $additionalData['price']) {
                $column = 'price';
                $old = $additionalData['price'];
                $new = $data['price'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('rental_price', $data)) {

            if ($data['rental_price'] != $additionalData['rental_price']) {
                $column = 'rental_price';
                $old = $additionalData['rental_price'];
                $new = $data['rental_price'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('status', $data)) {

            if ($data['status'] != $additionalData['status']) {
                $column = 'status';
                $old = $additionalData['status'];
                $new = $data['status'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('event_id', $data)) {

            if ($data['event_id'] != $additionalData['event_id']) {
                $column = 'event_id';
                $old = $additionalData['event_id'];
                $new = $data['event_id'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('storage_location', $data)) {

            if ($data['storage_location'] != $additionalData['storage_location']) {
                $column = 'storage_location';
                $old = $additionalData['storage_location'];
                $new = $data['storage_location'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('is_available', $data)) {

            if ($data['is_available'] != $additionalData['is_available']) {
                $column = 'is_available';
                $old = $additionalData['is_available'];
                $new = $data['is_available'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('note', $data)) {

            if ($data['note'] != $additionalData['note']) {
                $column = 'note';
                $old = $additionalData['note'];
                $new = $data['note'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('user_id', $data)) {

            if ($data['user_id'] != $additionalData['user_id']) {
                $column = 'user_id';
                $old = $additionalData['user_id'];
                $new = $data['user_id'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('qr_string', $data)) {

            if ($data['qr_string'] != $additionalData['qr_string']) {
                $column = 'qr_string';
                $old = $additionalData['qr_string'];
                $new = $data['qr_string'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('is_consumable', $data)) {

            if ($data['is_consumable'] != $additionalData['is_consumable']) {
                $column = 'is_consumable';
                $old = $additionalData['is_consumable'];
                $new = $data['is_consumable'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('remarks', $data)) {

            if ($data['remarks'] != $additionalData['remarks']) {
                $column = 'remarks';
                $old = $additionalData['remarks'];
                $new = $data['remarks'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('created_by', $data)) {

            if ($data['created_by'] != $additionalData['created_by']) {
                $column = 'created_by';
                $old = $additionalData['created_by'];
                $new = $data['created_by'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('deleted_by', $data)) {

            if ($data['deleted_by'] != $additionalData['deleted_by']) {
                $column = 'deleted_by';
                $old = $additionalData['deleted_by'];
                $new = $data['deleted_by'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('updated_by', $data)) {

            if ($data['updated_by'] != $additionalData['updated_by']) {
                $column = 'updated_by';
                $old = $additionalData['updated_by'];
                $new = $data['updated_by'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        $product->save();
        $oldData->updated_by = Auth::user()->id;
        $oldData->save();
        // $oldData->delete();


        return redirect(URL::To('/list-product'))->with('success', 'Berhasil mengubah data produk');
    }

    function generateNewCode($key1, $key2, $key3)
    {
        $result = '';
        $key1Array = explode(' ', $key1);
        $key2Array = explode(' ', $key2);
        $key3Array = explode(' ', $key3);

        for ($i = 0; $i < count($key1Array); $i++) {
            if (count($key1Array) > 0) {
                if (strlen($key1Array[$i]) > 0) {
                    $result = $result . $key1Array[$i][0] . $key1Array[$i][1];
                }
            }
        }
        for ($i = 0; $i < count($key2Array); $i++) {
            if (count($key2Array) > 0) {
                if (strlen($key2Array[$i]) > 0) {
                    $result = $result . $key2Array[$i][0] . $key2Array[$i][0];
                }
            }
        }
        for ($i = 0; $i < count($key3Array); $i++) {
            if (count($key3Array) > 0) {
                if (strlen($key3Array[$i]) > 0) {
                    $result = $result . $key3Array[$i][0] . $key3Array[$i][0];
                }
            }
        }
        return strtoupper($result);
    }
    function generateCode($currectDigit, $key)
    {
        $result = $key;
        $longString = strlen((string)$currectDigit);


        for ($i = 0; $i < (6 - $longString); $i++) {
            $result = $result . '0';
        }
        $result = $result . $currectDigit;
        return $result;
    }


    public function inputManage($type)
    {
        // dd($type);
        return view('page.management.input', ['data' => $type, 'number' => 0, 'title' => 'product']);
    }
    public function detailManage(Request $request) {}
    public function listManage(Request $request)
    {
        $data = ProductTypeDB::where('id', '>', 0);
        $params = $request->all();
        if (array_key_exists('category', $params)) {
            # code...
            if ($params['category'] != '') {
                $data = $data->where('category', 'LIKE', "%" . $params['category'] . "%");
            }
        }
        if (array_key_exists('brand', $params)) {
            # code...
            if ($params['brand'] != '') {
                $data = $data->where('brand', 'LIKE', "%" . $params['brand'] . "%");
            }
        }
        if (array_key_exists('type', $params)) {
            # code...
            if ($params['type'] != '') {
                $data = $data->where('type', 'LIKE', "%" . $params['type'] . "%");
            }
        }
        if (array_key_exists('code', $params)) {
            # code...
            if ($params['code'] != '') {
                $data = $data->where('code', 'LIKE', "%" . $params['code'] . "%");
            }
        }
        $data = $data->orderBy('category', 'asc')->paginate(25);
        // $result = $result->get();
        return view('page.management.list', ['data' => $data, 'number' => 0, 'title' => 'product']);
    }
    public function submitManage(Request $request)
    {


        $request->validate([
            'category' => 'required|min:2',
            'brand' => 'required|min:2',
            'type' => 'required|min:2',
        ]);
        $data = new ProductTypeDB();
        $data->category = $request->category;
        $data->brand = $request->brand;
        $data->type = $request->type;

        $newCode = $this->generateNewCode($request->category, $request->brand, $request->type);
        $data->code = $newCode;
        $data->created_by = Auth::user()->id;
        $data->save();
        $history = new HistoriesDB();
        $history->input($data->id, 'product_type', 'create', '', '', '', '');
        return redirect()->back()->with('success', 'Berhasil menambahkan data baru');
    }
    public function deleteManage($id)
    {
        $productTypeDB =   ProductTypeDB::where('id', $id)->first();

        $history = new HistoriesDB();
        $history->input($productTypeDB->id, 'product_type', 'delete', '', '', '', '');
        $productTypeDB->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
