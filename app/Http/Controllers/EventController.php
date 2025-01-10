<?php

namespace App\Http\Controllers;

use App\Models\HistoriesDB;
use App\Models\JobsDB;
use App\Models\ProductDB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Product;

class EventController extends Controller
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
        $orderBy = 'id';
        $orderPriority = 'desc';
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
        $result = JobsDB::
            // take($limit)->skip($startFrom)->
            orderBy($orderBy, $orderPriority);

        if (array_key_exists('event_name', $data)) {
            $result = $result->where('event_name', 'LIKE', '%' . $data['event_name'] . '%');
        }
        if (array_key_exists('event_location', $data)) {
            $result = $result->where('event_location', 'LIKE', '%' . $data['event_location'] . '%');
        }
        if (array_key_exists('starter_user', $data)) {
            $userIds = User::where('name', 'LIKE', "%$request->starter_user%")->orWhere('email', 'LIKE', "%$request->starter_user%")->orWhere('phone', 'LIKE', "%$request->starter_user%")->get()->toArray();
            $result = $result->whereIn('starter_user_id', $userIds);
        }
        if (array_key_exists('closer_user', $data)) {
            $userIds = User::where('name', 'LIKE', "%$request->closer_user%")->orWhere('email', 'LIKE', "%$request->closer_user%")->orWhere('phone', 'LIKE', "%$request->closer_user%")->get()->toArray();
            $result = $result->where('closer_user_id', $userIds);
        }
        if (array_key_exists('client', $data)) {
            $result = $result->where('client', 'LIKE', '%' . $data['client'] . '%');
        }
        if (array_key_exists('date', $data)) {
            $result = $result->where(
                'start_date',
                '<=',
                date("Y-m-d", strtotime($data['date']))
            );
            $result = $result->where(
                'finish_date',
                '>=',
                date("Y-m-d", strtotime($data['date']))
            );
        }
        if (array_key_exists('start_date', $data)) {
            $result = $result->where('start_date', 'LIKE', '%' . $data['start_date'] . '%');
        }
        if (array_key_exists('finish_date', $data)) {
            $result = $result->where('finish_date', 'LIKE', '%' . $data['finish_date'] . '%');
        }
        if (array_key_exists('lat', $data)) {
            $result = $result->where('lat', 'LIKE', '%' . $data['lat'] . '%');
        }
        if (array_key_exists('lng', $data)) {
            $result = $result->where('lng', 'LIKE', '%' . $data['lng'] . '%');
        }
        if (array_key_exists('starter_user_id', $data)) {
            $result = $result->where('starter_user_id', 'LIKE', '%' . $data['starter_user_id'] . '%');
        }
        if (array_key_exists('closer_user_id', $data)) {
            $result = $result->where('closer_user_id', 'LIKE', '%' . $data['closer_user_id'] . '%');
        }

        $result = $result->paginate(5);
        // $result = $result->get();
        return view('page.event.list', ['data' => $result, 'number' => $startFrom, 'title' => 'event']);
    }

    public function submit(Request $request)
    {
        $data = $request->all();
        $itemId = array_values($request->item_id);
        $ip = request()->ip();
        $ip = '72.14.201.145';           // something like 127.0.0.1
        $url = "http://ip-api.com/json/" . $ip;    // http://ip-api.com/127.0.0.1
        $ipResult = Http::get($url);
        $data['ip'] = json_decode($ipResult->body());
        $data['lat'] = $data['ip']->city;
        if ($request->has('event_id')) {
            if ($request->event_id != 0) {
                $job = JobsDB::where('id')->first();
                $additionalData = clone $job;
                $additionalData = $additionalData->toArray();



                $history = new HistoriesDB();
                $old = '';
                $new = '';
                $column = '';
                $parameter = [
                    'id'=>$job['id'],
                    'event_name'=>$job['event_name'],
                    'event_location'=>$job['event_location'],
                    'lat'=>$job['lat'],
                    'lng'=>$job['lng'],
                    'starter_user_id'=>$job['starter_user_id'],
                    'closer_user_id'=>$job['closer_user_id'],
                    'user_city'=>$job['user_city'],
                    'user_province'=>$job['user_province'],
                    'user_address'=>$job['user_address'],
                    'client'=>$job['client'],
                    'start_date'=>$job['start_date'],
                    'finish_date'=>$job['finish_date'],
                ];

                $column = '';
                $old = '';
                $new = '';
                $history->input($additionalData['id'], 'event', 'update', $old, $new, $column, $parameter);
            } else {
                $job = new JobsDB();
            }
        } else {
            $job = new JobsDB();
        }
        $job->event_name = $data['event_name'];
        $job->event_location = $data['event_location'];
        $job->lat = $data['ip']->lat;
        $job->lng = $data['ip']->lon;
        $job->starter_user_id = $data[''];
        // $job->closer_user_id= $data[''];
        $job->user_city = $data['ip']->city;
        $job->user_province = $data['ip']->regionName;
        $job->user_address = $data['ip']->city . ' ' . $data['ip']->regionName . ', ' . $data['ip']->country;
        $job->client = $data['client'];
        $job->start_date = now();
        // $job->finish_date= $request->;
        $job->save();

        if ($request->has('event_id')) {
            if ($request->event_id != 0) {
            
            }}

        //   "_token" => "bGiRinOMzdhPn77BWyk6e4CuVpoKSfPb9mw69Psd"
        //   "event_name" => "Fun"
        //   "event_location" => "Dufan"
        //   "client" => "PT. XYZ"
        //   "item_id" => array:1 [▼
        //     0 => "3"
        //   ]
        //   "ip" => {#351 ▼
        //     +"status": "success"
        //     +"country": "Indonesia"
        //     +"countryCode": "ID"
        //     +"region": "JK"
        //     +"regionName": "Jakarta"
        //     +"city": "Jakarta"
        //     +"zip": ""
        //     +"lat": -6.19445
        //     +"lon": 106.823
        //     +"timezone": "Asia/Jakarta"
        //     +"isp": "Google LLC"
        //     +"org": "Google Chrome Prefetch Proxy"
        //     +"as": "AS15169 Google LLC"
        //     +"query": "72.14.201.145"
        //   }
        //   "lat" => "Jakarta"

        dd($data);
        return redirect(URL::To('/list-event'));
    }
    public function input()

    {
        $data = ProductDB::where('user_id', Auth::user()->id)->whereNull('event_location')->get();
        return view('page.event.input', ['data' => $data, 'title' => 'event', 'event' => null]);
    }
    public function edit($id)
    {
        $product = JobsDB::where('id', $id)->first();
        return view('page.event.edit', ['data' => $product, 'title' => 'event', 'event' => null]);
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
            $product->price = $data['price'];
        } else {
            $product->price = $oldData->price;
        }
        if (array_key_exists('status', $data)) {
            $product->status = $data['status'];
        } else {
            $product->status = $oldData->status;
        }
        if (array_key_exists('event_location', $data)) {
            $product->event_location = $data['event_location'];
        } else {
            $product->event_location = $oldData->event_location;
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
        if (array_key_exists('status', $data)) {

            if ($data['status'] != $additionalData['status']) {
                $column = 'status';
                $old = $additionalData['status'];
                $new = $data['status'];
                $history->input($oldData->id, 'product', 'update', $old, $new, $column, $additionalData);
            }
        }
        if (array_key_exists('event_location', $data)) {

            if ($data['event_location'] != $additionalData['event_location']) {
                $column = 'event_location';
                $old = $additionalData['event_location'];
                $new = $data['event_location'];
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
        $oldData->delete();


        return redirect(URL::To('/list-product'));
    }
}
