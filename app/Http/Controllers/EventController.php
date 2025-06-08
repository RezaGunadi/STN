<?php

namespace App\Http\Controllers;

use App\Models\HistoriesDB;
use App\Models\JobDetailsDB;
use App\Models\JobsDB;
use App\Models\ProductDB;
use App\Models\ReportDB;
use App\Models\TeamsDB;
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
use Teams;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastHelper;

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
        if (array_key_exists('starter_team', $data)) {
            if ($data['starter_team'] != '') {
                $teamIds = TeamsDB::where('name', 'LIKE', "%$request->starter_team%")->pluck('id')->toArray();
                $result = $result->whereIn('starter_team_id', $teamIds);
            }
        }
        if (array_key_exists('closer_team', $data)) {
            if ($data['closer_team'] != '') {
                $teamIds = TeamsDB::where('name', 'LIKE', "%$request->closer_team%")->pluck('id')->toArray();
                $result = $result->whereIn('closer_team_id', $teamIds);
            }
        }
        if (array_key_exists('client', $data)) {
            $result = $result->where('client', 'LIKE', '%' . $data['client'] . '%');
        }
        if (array_key_exists('status', $data)) {
            if ($data['status'] != null) {
                if ($data['status'] != '' && $data['status'] != 'all') {
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
                $paramStart = Carbon::parse($data['start_date'] . ' 00:00:00')->format('Y-m-d H:i:s');
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

        // Create new event
        $event = new JobsDB();
        $event->event_name = $data['event_name'];
        $event->event_location = $data['event_location'];
        $event->client = $data['client'];
        $event->start_date = Carbon::createFromFormat('m/d/Y', $data['date'])->format('Y-m-d');
        $event->starter_team_id = $data['starter_team'];
        $event->starter_user_id = 0;
        $event->closer_user_id = 0;
        $event->closer_team_id = $data['closer_team'];
        $event->created_by = Auth::user()->id;
        $event->save();

        $totalPrice = 0;
        $totalDiscount = 0;
        $totalPriceBeforeDiscount = 0;
        // Create job details for products
        if (isset($data['product_id'])) {
            foreach ($data['product_id'] as $key => $productId) {
                $discount = isset($data['discount'][$productId]) ? $data['discount'][$productId] : 0;
                $product = ProductDB::where('id', $productId)->first();
                $jobDetail = new JobDetailsDB();
                $jobDetail->event_id = $event->id;
                $jobDetail->created_by = Auth::user()->id;
                $jobDetail->id_product = $productId;
                $jobDetail->total_price = $product->rental_price - $discount;
                $jobDetail->price_before_discount = $product->rental_price;
                $jobDetail->discount = $discount;
                $jobDetail->save();

                $totalPrice += $jobDetail->total_price;
                $totalDiscount += $jobDetail->discount;
                $totalPriceBeforeDiscount += $jobDetail->price_before_discount;
            }
        }
        $event->total_price = $totalPrice;
        $event->discount = $totalDiscount;
        $event->price_before_discount = $totalPriceBeforeDiscount;
        $event->save();
        // Create history entry for event creation
        $history = new HistoriesDB();
        $history->input(
            $event->id,
            'event',
            'create',
            '',
            json_encode($event->toArray()),
            'all',
            $event->toArray()
        );

        ToastHelper::success('Berhasil menambahkan event baru');
        return redirect(URL::To('/list-event'));
    }

    public function submitClose(Request $request)
    {
        try {
            $event = JobsDB::findOrFail($request->event_id);

            // Verify user is in closer team
            $isCloserTeamMember = TeamsDB::where('group_id', $event->closer_team_id)
                ->where('user_id', Auth::id())
                ->exists();
            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $isCloserTeamMember = true;
            }
            if (!$isCloserTeamMember) {
                return redirect()->back()->with('error', 'You are not authorized to close this event.');
            }

            // Get all products for this event
            $products = ProductDB::where('event_id', $event->id)->get();

            // Get starter team members
            $starterTeamMembers = TeamsDB::where('group_id', $event->starter_team_id)
                ->with('user')
                ->get();

            $starterTeamCount = $starterTeamMembers->count();

            // Process each product
            foreach ($products as $product) {
                $status = $request->input("item_id.{$product->id}");

                if ($status === 'ada' || $status === 'return' || $product->is_consumable == 1) {
                    // Product is present or returned - move to closer team
                    $product->event_id = 0;
                    if ($status === 'ada' || $status === 'return') {
                        # code...
                        $product->user_id = Auth::id(); // Assign to the closer who submitted
                    } else {
                        $product->status = 'Consumed';
                    }
                    $product->save();
                } else {
                    // Product is lost/consumed - create report entries
                    $pricePerPerson = $product->price / $starterTeamCount;

                    foreach ($starterTeamMembers as $member) {
                        // Create report entry
                        $report = new ReportDB();
                        $report->item_id = $product->id;
                        $report->price = $pricePerPerson;
                        $report->note = "Product {$status} during event {$event->event_name}";
                        $report->reporter_id = Auth::id();
                        $report->created_by = Auth::id();
                        $report->user_id = $member->user_id;
                        $report->save();

                        // Update user's total loss
                        $user = User::find($member->user_id);
                        $user->total_kerugian += $pricePerPerson;
                        $user->save();
                    }

                    // Mark product as lost/consumed
                    $product->status = $status === 'hilang' ? 'Lost' : 'Consumed';
                    $product->save();
                }
            }

            // Update event status
            $event->finish_date = now();
            $event->closer_user_id = Auth::id();
            $event->save();

            return redirect()->route('list_event')->with('success', 'Event closed successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error closing event: ' . $e->getMessage());
        }
    }

    public function finalizeSubmitEvent(Request $request)
    {
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'event_id' => 'required',
                'event_name' => 'required',
                'event_location' => 'required',
                'client' => 'required',
                'product_images.*' => 'image|mimes:jpeg,png,jpg|max:5120'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $jobDetails = JobDetailsDB::where('event_id', $request->event_id)->get();
            $history = new HistoriesDB();

            // Process each product image
            foreach ($request->product_images as $productId => $image) {
                $detail = $jobDetails->where('id_product', $productId)->first();

                if ($detail) {
                    // Generate unique filename
                    $filename = time() . '_' . $productId . '.' . $image->getClientOriginalExtension();

                    // Create directory if it doesn't exist
                    $directory = public_path('upload/event/product_picture');
                    if (!file_exists($directory)) {
                        mkdir($directory, 0777, true);
                    }

                    // Save image
                    $image->move($directory, $filename);
                    $imagePath = 'upload/event/product_picture/' . $filename;

                    // Track old values for history
                    $oldPicture = $detail->picture;
                    $oldIsInstalled = $detail->is_installed;

                    // Update job detail
                    $detail->picture = $imagePath;
                    $detail->is_installed = 1;
                    $detail->save();

                    // Create history entries
                    $additionalData = $detail->toArray();

                    // Track picture change
                    if ($oldPicture !== $imagePath) {
                        $history->input(
                            $detail->id,
                            'event_detail',
                            'update',
                            $oldPicture,
                            $imagePath,
                            'picture',
                            $additionalData
                        );
                    }

                    // Track installation status change
                    if ($oldIsInstalled !== 1) {
                        $history->input(
                            $detail->id,
                            'event_detail',
                            'update',
                            $oldIsInstalled,
                            1,
                            'is_installed',
                            $additionalData
                        );
                    }
                }
            }
            ToastHelper::success('Images uploaded successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error uploading images: ' . $e->getMessage()
            ], 500);
        }
    }

    public function input()
    {
        \Illuminate\Support\Facades\DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        // Only load available products (not deleted and not assigned to an event)
        $data = ProductDB::where('deleted_at', NULL)
            ->where(function ($query) {
                $query->where('event_id', 0)
                    ->orWhereNull('event_id');
            })
            ->get();

        // Load teams with their members in a single query using eager loading
        $teams = TeamsDB::where('deleted_at', NULL)
            // ->with(['user' => function ($query) {
            //     $query->select('id', 'name', 'email', 'phone');
            // }])
            ->groupBy('group_id')
            ->get();

        // Transform the teams data to include members
        // $teamsData = [];
        foreach ($teams as $team) {
            $team->member = TeamsDB::where('group_id', $team->group_id)->join('users', 'users.id', '=', 'teams.user_id')->select('users.id', 'users.name', 'users.email', 'users.phone')->get();
            //     $teamsData[] = [
            //         'group_id' => $group_id,
            //         'member' => $teamMembers
            //     ];
        }
        $user = User::where('deleted_at', NULL)->get();
        return view('page.event.input', [
            'data' => $data,
            'teams' => $teams,
            'user' => $user,
            'title' => 'event',
            'event' => null
        ]);
    }

    public function close($id)
    {
        $event = JobsDB::findOrFail($id);

        // Check if user is in the closer team
        $isCloserTeamMember = TeamsDB::where('group_id', $event->closer_team_id)
            ->where('user_id', Auth::id())
            ->exists();

            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $isCloserTeamMember = true;
            }
        if (!$isCloserTeamMember) {
            return redirect()->back()->with('error', 'You are not authorized to close this event.');
        }

        $products = ProductDB::where('job_details.event_id', $id)->join('job_details', 'job_details.id_product', '=', 'product.id')
            ->select('product.*', 'job_details.picture as job_detail_picture')
            ->get();

        // Check if current user is in the closer team
        $isCloserTeamMember = TeamsDB::where('group_id', $event->closer_team_id)
            ->where('user_id', Auth::id())
            ->exists();

            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $isCloserTeamMember = true;
            }
            $isStarterTeamMember = TeamsDB::where('group_id', $event->starter_team_id)
            ->where('user_id', Auth::id())
            ->exists();
            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $isStarterTeamMember = true;
            }

        return view('page.event.close', [
            'data' => $products,
            'title' => 'event',
            'event' => $event,
            'isCloserTeamMember' => $isCloserTeamMember,
            'isStarterTeamMember' => $isStarterTeamMember
        ]);
    }

    public function edit($id)
    {

        \Illuminate\Support\Facades\DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        // Load teams with their members in a single query using eager loading
        $teams = TeamsDB::where('deleted_at', NULL)
            // ->with(['user' => function ($query) {
            //     $query->select('id', 'name', 'email', 'phone');
            // }])
            ->groupBy('group_id')
            ->get();
        $event = JobsDB::where('id', $id)->first();
        // $jobDetail = JobDetailsDB::where('event_id', $id)->pluck('id_product');
        $jobDetail = ProductDB::
        join('job_details', 'job_details.id_product', '=', 'product.id')
        ->where('job_details.event_id', $id)
        ->select('product.*', 'job_details.picture as job_detail_picture')
        ->get();
        return view('page.event.edit', ['eventDetail' => $jobDetail, 'title' => 'event', 'event' => $event, 'teams' => $teams]);
    }

    public function detail($id)
    {
        \Illuminate\Support\Facades\DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        $event = JobsDB::where('id', $id)->first();
        // $products = ProductDB::where('event_id', $id)->get();
        $products = ProductDB::where('job_details.event_id', $id)
            ->join('job_details', 'job_details.id_product', '=', 'product.id')
            ->groupBy('product.id')
            ->select('product.*', 'job_details.is_installed', 'job_details.picture as picture')->get();

        // Check if current user is in the closer team
        $isCloserTeamMember = TeamsDB::where('group_id', $event->closer_team_id)
            ->where('user_id', Auth::id())
            ->exists();
            
            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $isCloserTeamMember = true;
            }
            $isStarterTeamMember = TeamsDB::where('group_id', $event->starter_team_id)
            ->where('user_id', Auth::id())
            ->exists();
            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $isStarterTeamMember = true;
            }

        return view('page.event.detail', [
            'data' => $products,
            'title' => 'event',
            'event' => $event,
            'isCloserTeamMember' => $isCloserTeamMember,
            'isStarterTeamMember' => $isStarterTeamMember   
        ]);
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

    public function startEvent(Request $request, $id)
    {
        \Illuminate\Support\Facades\DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        $event = JobsDB::findOrFail($id);

        // Check if user is in the starter team
        $starterTeam = TeamsDB::where('group_id', $event->starter_team_id)
            ->where('user_id', Auth::id())
            ->first();

            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $starterTeam = true;
            }
        if (!$starterTeam) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to start this event. Only starter team members can start the event.'
            ], 403);
        }

        // Check if event is already started
        // if ($event->start_date) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'This event has already been started.'
        //     ], 400);
        // }

        // Start the event
        if ($event->start_date == NULL) {
            $event->start_date = now();
            $event->starter_user_id = Auth::id();
            $event->save();
        }
        // $jobDetail = JobDetailsDB::where('event_id', $event->id)->get();
        // $event->job_detail = $jobDetail;
        // $arrayProduct = [];
        // foreach ($jobDetail as $item) {
        //     $arrayProduct[] = $item->id_product;
        // }
        $data = ProductDB::where('job_details.event_id', $event->id)
            ->join('job_details', 'job_details.id_product', '=', 'product.id')
            ->groupBy('product.id')
            ->select('product.*', 'job_details.is_installed', 'job_details.picture as job_detail_picture')->get();
        $event->products = $data;
        return view('page.event.start', ['event' => $event, 'data' => $data, 'number' => 0, 'title' => 'event']);
        // return redirect()->back()->with('success', 'Event started successfully');
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Event started successfully'
        // ]);
    }

    public function closeEvent(Request $request)
    {
        \Illuminate\Support\Facades\DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        try {
            $event = JobsDB::findOrFail($request->event_id);

            // Verify user is in closer team
            $isCloserTeamMember = TeamsDB::where('group_id', $event->closer_team_id)
                ->where('user_id', Auth::id())
                ->exists();

            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $isCloserTeamMember = true;
            }
            if (!$isCloserTeamMember) {
                return redirect()->back()->with('error', 'You are not authorized to close this event.');
            }

            // Get all products for this event
            // $products = ProductDB::where('event_id', $event->id)->get();

            $products = ProductDB::where('job_details.event_id', $event->id)
                ->join('job_details', 'job_details.id_product', '=', 'product.id')
                ->groupBy('product.id')
                ->select('product.*', 'job_details.is_installed', 'job_details.picture as job_detail_picture')->get();

            // Get starter team members
            $starterTeamMembers = TeamsDB::where('group_id', $event->starter_team_id)
                ->with('user')
                ->get();

            $starterTeamCount = $starterTeamMembers->count();

            // Process each product
            foreach ($products as $product) {
                if (in_array($product->id, $request->products ?? [])) {
                    // Product is checked - move to closer team
                    $product->event_id = 0;
                    $product->user_id = Auth::id(); // Assign to the closer who submitted
                    $product->save();
                } else {
                    // Product is not checked - create report entries
                    $pricePerPerson = $product->price / $starterTeamCount;

                    foreach ($starterTeamMembers as $member) {
                        // Create report entry
                        $report = new ReportDB();
                        $report->item_id = $product->id;
                        $report->price = $pricePerPerson;
                        $report->note = "Product lost during event {$event->event_name}";
                        $report->reporter_id = Auth::id();
                        $report->created_by = Auth::id();
                        $report->user_id = $member->user_id;
                        $report->save();

                        // Update user's total loss
                        $user = User::find($member->user_id);
                        $user->total_kerugian += $pricePerPerson;
                        $user->save();
                    }

                    // Mark product as lost
                    $product->status = 'Lost';
                    $product->save();
                }
            }

            // Update event status
            $event->finish_date = now();
            $event->closer_user_id = Auth::id();
            $event->save();

            // $history = new HistoriesDB();
            // $history->input(
            //     $event->id,
            //     'event',
            //     'update',
            //     $event->finish_date,
            //     $event->finish_date,
            //     'finish_date',
            //     $event->toArray()
            // );
            ToastHelper::success('Event closed successfully');
            return redirect()->route('list_event');
        } catch (\Exception $e) {
            Log::error('Error closing event: ' . $e->getMessage());
            ToastHelper::error('Error closing event: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function markProductInstalled(Request $request, $id)
    {
        $product = ProductDB::findOrFail($id);

        // Track old values for history
        $oldIsInstalled = $product->is_installed;
        $additionalData = $product->toArray();

        $product->is_installed = 1;
        $product->save();

        // Create history entry
        $history = new HistoriesDB();
        $history->input(
            $product->id,
            'product',
            'update',
            $oldIsInstalled,
            1,
            'is_installed',
            $additionalData
        );

        return response()->json(['success' => true]);
    }

    public function saveSignature(Request $request)
    {
        try {
            $event = JobsDB::where('id', $request->event_id)->first();

            if (!$event) {
                return response()->json([
                    'success' => false,
                    'message' => 'Event not found'
                ], 404);
            }

            // Track old values for history
            $oldSignature = $event->signature;
            $additionalData = $event->toArray();

            // Create directory if it doesn't exist
            $directory = public_path('upload/event/signature');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Generate unique filename
            $filename = 'signature_' . time() . '_' . $event->id . '.png';
            $filepath = $directory . '/' . $filename;

            // Decode base64 image
            $image_parts = explode(";base64,", $request->signature);
            $image_base64 = base64_decode($image_parts[1]);

            // Save the image
            file_put_contents($filepath, $image_base64);

            // Update event with new signature path
            $event->signature = 'upload/event/signature/' . $filename;
            $event->save();

            // Create history entry
            $history = new HistoriesDB();
            $history->input(
                $event->id,
                'event',
                'update',
                $oldSignature,
                $event->signature_picture,
                'signature_picture',
                $additionalData
            );

            return response()->json([
                'success' => true,
                'message' => 'Tanda tangan berhasil disimpan!',
                'signature_path' => $event->signature_picture
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function savePhoto(Request $request)
    {
        try {
            $event = JobsDB::where('id', $request->event_id)->first();

            if (!$event) {
                return response()->json([
                    'success' => false,
                    'message' => 'Event not found'
                ], 404);
            }

            // Track old values for history
            $oldPhoto = $event->signature_picture;
            $additionalData = $event->toArray();

            // Create directory if it doesn't exist
            $directory = public_path('upload/event/signature');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Generate unique filename
            $filename = 'event_photo_' . time() . '_' . $event->id . '.png';
            $filepath = $directory . '/' . $filename;

            // Decode base64 image
            $image_parts = explode(";base64,", $request->photo);
            $image_base64 = base64_decode($image_parts[1]);

            // Save the image
            file_put_contents($filepath, $image_base64);

            // Update event with new photo path
            $event->signature_picture = 'upload/event/signature/' . $filename;
            $event->save();

            // Create history entry
            $history = new HistoriesDB();
            $history->input(
                $event->id,
                'event',
                'update',
                $oldPhoto,
                $event->signature_picture,
                'signature_picture',
                $additionalData
            );

            return response()->json([
                'success' => true,
                'message' => 'Photo event berhasil disimpan!',
                'photo_path' => $event->signature_picture
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function markProductAsInstalled(Request $request)
    {
        try {
            $product = ProductDB::findOrFail($request->product_id);

            // Check if user is in the same team as the product
            $userTeam = TeamsDB::where('user_id', Auth::id())
                ->where('group_id', $product->team_id)
                ->first();

            if (Auth::user()->role == 'super_user' || Auth::user()->role == 'owner') {
                $userTeam = true;
            }
            if (!$userTeam) {
                return response()->json([
                    'success' => false,
                    'message' => 'You are not authorized to mark this product as installed'
                ], 403);
            }

            // Handle image upload
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/product_images', $filename);

                // Update product status and image path
                $product->status = 'Installed';
                $product->image_path = $path;
                $product->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Product marked as installed successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No image provided'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function closeSubmit(Request $request, $id)
    {
        $event = JobsDB::findOrFail($id);

        // Track old values for history
        $oldData = $event->toArray();

        $event->status = 'closed';
        $event->updated_by = Auth::user()->id;
        $event->save();

        // Create history entry for event closure
        $history = new HistoriesDB();
        $history->input(
            $event->id,
            'event',
            'update',
            json_encode($oldData),
            json_encode($event->toArray()),
            'status',
            $oldData
        );

        ToastHelper::success('Event closed successfully');
        return redirect(URL::To('/list-event'));
    }
}
