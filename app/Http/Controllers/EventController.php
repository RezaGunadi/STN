<?php

namespace App\Http\Controllers;

use App\Models\HistoriesDB;
use App\Models\JobDetailsDB;
use App\Models\JobsDB;
use App\Models\ProductDB;
use App\Models\ReportDB;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Product;
use Report;

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
        // event_name
        // event_location
        // starter_user
        // closer_user
        // client
        // date
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
            if ($data['starter_user'] != '') {
                $userIds = User::where('name', 'LIKE', "%$request->starter_user%")->orWhere('email', 'LIKE', "%$request->starter_user%")->orWhere('phone', 'LIKE', "%$request->starter_user%")->pluck('id')->toArray();
                $result = $result->whereIn('starter_user_id', $userIds);
            }
        }
        if (array_key_exists('closer_user', $data)) {
            if ($data['closer_user'] != '') {
                $userIds = User::where('name', 'LIKE', "%$request->closer_user%")->orWhere('email', 'LIKE', "%$request->closer_user%")->orWhere('phone', 'LIKE', "%$request->closer_user%")->pluck('id')->toArray();
                $result = $result->where('closer_user_id', $userIds);
            }
        }
        if (array_key_exists('client', $data)) {
            $result = $result->where('client', 'LIKE', '%' . $data['client'] . '%');
        }
        if (array_key_exists('status', $data)) {
            if ($data['status'] != null) {
                if ($data['status'] != '' && $data['status']!='all') {
                    if ($data['status'] == 'pending') {
                        $result = $result->whereNull('finish_date');
                    } else {
                        if ($data['status'] == 'finish') {
                            $result = $result->whereNotNull('finish_date');
                        }
                    }
                }
            }
        }
        if (array_key_exists('status', $data)) {
            $result = $result->where('client', 'LIKE', '%' . $data['client'] . '%');
        }
        if (array_key_exists('start_date', $data)) {
            // dd($paramStart);
            if ($data['start_date'] != '') {
                $paramStart = Carbon::parse($data['start_date'] . ' 00:00:00')->format('Y-m-d H:i:s') ;
                $result = $result->where(
                    'start_date',
                    '>=',
                    $paramStart
                );
            }
        }
        if (array_key_exists('end_date', $data)) {
            if ($data['end_date'] != '') {
                $paramEnd = Carbon::parse($data['end_date'] . ' 23:59:59')->format('Y-m-d H:i:s');
                $result = $result->where(
                    'finish_date',
                    '<=',
                    $paramEnd
                );
            }
        }
        $result = $result->paginate(10);
        // $result = $result->get();
        return view('page.event.list', ['data' => $result, 'number' => $startFrom, 'title' => 'event']);
    }

    public function submit(Request $request)
    {
        $data = $request->all();
        if ($request->has('item_id')) {
            if (count($request->item_id) > 0) {
                # code...
                $itemId = array_values($request->item_id);
            }
        }
        $ip = request()->ip();
        $ip = '72.14.201.145';           // something like 127.0.0.1
        $url = "http://ip-api.com/json/" . $ip;    // http://ip-api.com/127.0.0.1
        $ipResult = Http::get($url);
        $data['ip'] = json_decode($ipResult->body());
        $data['lat'] = $data['ip']->city;
        $isEdit = false;;
        if ($request->has('event_id')) {
            if ($request->event_id != 0) {
                $isEdit = true;
                $job = JobsDB::where('id', $request->event_id)->first();
                $additionalData = clone $job;
                $additionalData = $additionalData->toArray();



                $history = new HistoriesDB();
                $old = '';
                $new = '';
                $column = '';
                $parameter = [
                    'id' => $additionalData['id'],
                    'event_name' => $additionalData['event_name'],
                    'event_location' => $additionalData['event_location'],
                    'client' => $additionalData['client'],
                    'lat' => $additionalData['lat'],
                    'lng' => $additionalData['lng'],
                    'starter_user_id' => $additionalData['starter_user_id'],
                    'closer_user_id' => $additionalData['closer_user_id'],
                    'user_city' => $additionalData['user_city'],
                    'user_province' => $additionalData['user_province'],
                    'user_address' => $additionalData['user_address'],
                    'start_date' => $additionalData['start_date'],
                    'finish_date' => $additionalData['finish_date'],
                ];

                if ($additionalData['event_name'] != $data['event_name']) {
                    $column = 'nama event';
                    $old = $additionalData['event_name'];
                    $new = $data['event_name'];
                    $history->input($additionalData['id'], 'event', 'update', $old, $new, $column, $parameter);
                }
                if ($additionalData['event_location'] != $data['event_location']) {
                    $column = 'lokasi event';
                    $old = $additionalData['event_location'];
                    $new = $data['event_location'];
                    $history->input($additionalData['id'], 'event', 'update', $old, $new, $column, $parameter);
                }
                if ($additionalData['client'] != $data['client']) {
                    $column = 'nama client';
                    $old = $additionalData['client'];
                    $new = $data['client'];
                    $history->input($additionalData['id'], 'event', 'update', $old, $new, $column, $parameter);
                }

                // $jobs = JobDetailsDB::where('id', $request->event_id)->get();
                // foreach ($jobs as $job) {
                //     $additionalData = clone $job;
                //     $additionalData = $additionalData->toArray();



                //     $history = new HistoriesDB();
                //     $old = '';
                //     $new = '';
                //     $column = '';
                //     $parameter = [
                //         'id' => $additionalData['id'],
                //         'job_detail_id' => $additionalData['id'],
                //         'id_product' => $additionalData['id_product'],
                //         'lat_user' => $additionalData['lat_user'],
                //         'lng_user' => $additionalData['lng_user'],
                //         'event_id' => $additionalData['event_id'],
                //         'created_by' => $additionalData['created_by'],
                //         'updated_by' => $additionalData['updated_by'],
                //         'deleted_by' => $additionalData['deleted_by'],
                //     ];

                //         $column = '';
                //         $old = '';
                //         $new = '';
                //         $history->input($additionalData['id'], 'event_detail', 'update', $old, $new, $column, $parameter);
                //         # code...
                // }
            } else {
                $job = new JobsDB();
                $checkEvent = JobsDB::where('event_name',$data['event_name'])->first();
                return Redirect::back()->with('error', 'Nama event tidak boleh sama');
            }
        } else {
            $job = new JobsDB();
            $checkEvent = JobsDB::where('event_name',$data['event_name'])->first();
            if ($checkEvent) {
                return Redirect::back()->with('error', 'Nama event tidak boleh sama');
            }
        }

        $job->event_name = $data['event_name'];
        $job->event_location = $data['event_location'];
        $job->lat = $data['ip']->lat;
        $job->lng = $data['ip']->lon;
        $job->starter_user_id = Auth::user()->id;
        $job->created_by = Auth::user()->id;
        $job->user_city = $data['ip']->city;
        $job->user_province = $data['ip']->regionName;
        $job->user_address = $data['ip']->city . ' ' . $data['ip']->regionName . ', ' . $data['ip']->country;
        $job->client = $data['client'];
        if ($isEdit) {
            # code...
            $job->start_date = now();
            $job->closer_user_id = 0;
            $job->deleted_by = 0;
            $job->updated_by
                =
                Auth::user()->id;
        }
        // $job->finish_date= $request->;
        $job->save();
        if ($request->has('item_id')) {
            # code...
            foreach ($request->item_id as $value) {
                # code...
                $checkJob = JobDetailsDB::where('id_product', $value)->where('event_id', $job->id)->first();
                if (!$checkJob) {
                    # code...
                    $jobDetail = new JobDetailsDB();
                    $jobDetail->id_product = $value;
                    $jobDetail->lat_user = $data['ip']->lat;
                    $jobDetail->lng_user = $data['ip']->lon;
                    $jobDetail->event_id
                        = $job->id;
                    $jobDetail->created_by = Auth::user()->id;
                    $jobDetail->deleted_by = 0;
                    $jobDetail->updated_by = Auth::user()->id;
                    $jobDetail->save();
                    $product = ProductDB::where('id', $value)->first();
                    $product->event_id = $job->id;
                    $product->save();

                    $additionalData = clone $jobDetail;
                    $additionalData = $additionalData->toArray();



                    $history = new HistoriesDB();
                    $old = '';
                    $new = '';
                    $column = '';
                    $parameter = [
                        'id' => $additionalData['id'],
                        'job_detail_id' => $additionalData['id'],
                        'id_product' => $additionalData['id_product'],
                        'lat_user' => $additionalData['lat_user'],
                        'lng_user' => $additionalData['lng_user'],
                        'event_id' => $additionalData['event_id'],
                        'created_by' => $additionalData['created_by'],
                        'updated_by' => $additionalData['updated_by'],
                        'deleted_by' => $additionalData['deleted_by'],
                    ];

                    $column = '';
                    $old = '';
                    $new = '';
                    $history->input($additionalData['id'], 'event_detail', 'update', $old, $new, $column, $parameter);
                }
            }
        }


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

        // dd($data);
        return redirect(URL::To('/list-event'))->with('success', $isEdit ? 'Berhasil mengubah event' : 'Berhasil menambahkan event');
    }
    public function submitClose(Request $request)
    {
        $data = $request->all();
        $itemId = array_values($request->item_id);
        $ip = request()->ip();
        $ip = '72.14.201.145';           // something like 127.0.0.1
        $url = "http://ip-api.com/json/" . $ip;    // http://ip-api.com/127.0.0.1
        $ipResult = Http::get($url);
        $data['ip'] = json_decode($ipResult->body());
        $data['lat'] = $data['ip']->city;
        // dd($data);
        $product_ids = [];
        if ($request->has('item_id')) {
            foreach ($request->item_id as $key => $value) {
                array_push($product_ids, $key);
            }
        }
        if ($request->has('event_id')) {
            if ($request->event_id != 0) {
                $job = JobsDB::where('id', $request->event_id)->first();
                // $additionalData = clone $job;
                // $additionalData = $additionalData->toArray();



                // $history = new HistoriesDB();
                // $old = '';
                // $new = '';
                // $column = '';
                // $parameter = [
                //     'id' => $job['id'],
                //     'event_name' => $job['event_name'],
                //     'event_location' => $job['event_location'],
                //     'lat' => $job['lat'],
                //     'lng' => $job['lng'],
                //     'starter_user_id' => $job['starter_user_id'],
                //     'closer_user_id' => Auth::user()->id,
                //     'user_city' => $job['user_city'],
                //     'user_province' => $job['user_province'],
                //     'user_address' => $job['user_address'],
                //     'client' => $job['client'],
                //     'start_date' => $job['start_date'],
                //     'finish_date' => $job['finish_date'],
                // ];


                // $column = '';
                // $old = '';
                // $new = '';
                // $history->input($additionalData['id'], 'event', 'update', $old, $new, $column, $parameter);

                // $jobs = JobDetailsDB::where('event_id', $request->event_id)->get();
                // foreach ($jobs as $job) {
                //     $additionalData = clone $job;
                //     $additionalData = $additionalData->toArray();



                //     $history = new HistoriesDB();
                //     $old = '';
                //     $new = '';
                //     $column = '';
                //     $parameter = [
                //         'job_detail_id' => $job['job_detail_id'],
                //         'id_product' => $job['id_product'],
                //         'lat_user' => $job['lat_user'],
                //         'lng_user' => $job['lng_user'],
                //         'event_id' => $job['event_id'],
                //         'created_by' => $job['created_by'],
                //         'updated_by' => Auth::user()->id,
                //         'deleted_by' => $job['deleted_by'],
                //     ];

                //     $column = '';
                //     $old = '';
                //     $new = '';
                //     $history->input($additionalData['id'], 'event_detail', 'update', $old, $new, $column, $parameter);
                // }
            } else {
                $job = new JobsDB();
            }
        } else {
            $job = new JobsDB();
        }
        $job->closer_user_id = Auth::user()->id;
        // $job->closer_user_id = 0;
        // $job->deleted_by = 0;
        $job->updated_by =
            Auth::user()->id;
        // $job->start_date = now();
        $job->finish_date = now();
        $job->save();
        if ($request->has('item_id')) {
            # code...
            foreach ($request->item_id as $key => $value) {
                # code...
                $checkJob = JobDetailsDB::where('id_product', $key)->where('event_id', $job->id)->first();
                if ($checkJob) {
                    if ($value == 'ada') {
                        # code...
                        $checkJob->updated_by = Auth::user()->id;
                        $checkJob->save();
                        $date1 = new DateTime($checkJob->created_at);
                        $date2 = new DateTime($checkJob->updated_at);
                        $interval = $date1->diff($date2);
                        $checkJob->day_finished =
                            $interval->days + 1;
                        $checkJob->save();
                        $product = ProductDB::where('id', $key)->first();
                        $product->event_id = 0;
                        $product->user_id =
                            Auth::user()->id;
                        $product->save();
                    } else {
                        if ($value == 'return') {
                            $checkJob->updated_by = Auth::user()->id;
                            $checkJob->save();
                            $date1 = new DateTime($checkJob->created_at);
                            $date2 = new DateTime($checkJob->updated_at);
                            $interval = $date1->diff($date2);
                            $checkJob->day_finished =
                                $interval->days + 1;
                            $checkJob->save();
                            $product = ProductDB::where('id', $key)->first();
                            $product->event_id = 0;
                            $product->save();
                        } else {
                            Log::info('Rport barang hilang');
                            $checkJob->updated_by = Auth::user()->id;
                            $checkJob->save();
                            $date1 = new DateTime($checkJob->created_at);
                            $date2 = new DateTime($checkJob->updated_at);
                            $interval = $date1->diff($date2);
                            $checkJob->day_finished =
                                $interval->days + 1;
                            $checkJob->save();

                            $product = ProductDB::where('id', $key)->first();
                            if ($product->is_consumable == 0) {
                                # code...
                                $report = new ReportDB();
                                $report->item_id = $key;
                                $report->price = $product->price;
                                $report->note = 'Hilang pada event ' . $job->event_name . ' pada ' . now() . '. di konfirmasi oleh ' . Auth::user()->name;
                                $report->reporter_id =
                                    Auth::user()->id;
                                $report->user_id = $checkJob->created_by;
                                $report->deleted_by = 0;
                                $report->updated_by = 0;
                                $report->created_by =
                                    Auth::user()->id;
                                $report->delete_reason = '';
                                $report->save();
                                $user = User::where('id', $checkJob->created_by)->first();
                                $user->total_kerugian = $user->total_kerugian + $product->price;
                                $product->status= 'Lost';
                                $product->save();
                                $user->save();
                            }
                        }
                    }
                }
            }
        }

        return redirect(URL::To('/list-event'))->with('success', 'Berhasil menutup event');
    }
    public function input()

    {
        $data = ProductDB::where('user_id', Auth::user()->id)->where('event_id', 0)->get();
        return view('page.event.input', ['data' => $data, 'title' => 'event', 'event' => null]);
    }
    public function close($id)

    {
        $event = JobsDB::where('id', $id)->first();
        $product = ProductDB::where('event_id', $id)
            ->get();
        return view('page.event.close', ['data' => $product, 'title' => 'event', 'event' => $event]);
    }
    public function edit($id)
    {
        $event = JobsDB::where('id', $id)->first();
        $product = ProductDB::where('user_id', Auth::user()->id)->where(function ($q) use ($id) {
            $q = $q->where('event_id', $id)->orWhere('event_id', 0);
        })
            ->get();
        return view('page.event.edit', ['data' => $product, 'title' => 'event', 'event' => $event]);
    }
    public function detail($id)
    {
        $event = JobsDB::where('id', $id)->first();
        $product = ProductDB::where('event_id', $id)->get();
        return view('page.event.detail', ['data' => $product, 'title' => 'event', 'event' => $event]);
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


        return redirect(URL::To('/list-product'))->with('success', 'Berhasil mengubah data event');
    }
}
