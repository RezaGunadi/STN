<?php

namespace App\Http\Controllers;

use App\Models\HistoriesDB;
use App\Models\ReportDB;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        $result = ReportDB::
            // take($limit)->skip($startFrom)->
            orderBy("report.$orderBy", $orderPriority);

        if (array_key_exists('item', $data)) {
            if ($data['item']!='') {
                # code...
                $result = $result->join('product', 'product.id','=', 'report.item_id')->where(
                    function ($q) use ($data){
                        $q=$q->where('product_code','LIKE', '%' . $data['item'] . '%')->orWhere('product_name','LIKE', '%' . $data['item'] . '%');
                    }
                );
                
                // ->where('product', 'LIKE', '%' . $data['item'] . '%');
            }
        }
        if (array_key_exists('description', $data)) {
            if ($data['description']!='') {
                # code...
                $result = $result->where('note', 'LIKE', '%' . $data['description'] . '%');
            }
        }
        if (array_key_exists('user', $data)) {
            if ($data['user']!='') {
                # code...
                $pelaku = User::where('name','LIKE', '%' . $data['user'] . '%')->orWhere('email', 'LIKE', '%' . $data['user'] . '%')->orWhere('phone', 'LIKE', '%' . $data['user'] . '%')->get()->pluck('id')->toArray();
                $result = $result->whereIn('report.user_id',$pelaku);
                // $result = $result->where('ref_type', 'LIKE', '%' . $data['users'] . '%');
            }
        }
        if (array_key_exists('reporter', $data)) {
            if ($data['reporter']!='') {
                # code...
                $reporter = User::where('name', 'LIKE', '%' . $data['reporter'] . '%')->orWhere('email', 'LIKE', '%' . $data['reporter'] . '%')->orWhere('phone', 'LIKE', '%' . $data['reporter'] . '%')->get()->pluck('id')->toArray();
                $result = $result->whereIn('report.created_by', $reporter);
                
                // $result = $result->where('ref_type', 'LIKE', '%' . $data['reporter'] . '%');
            }
        }
        $result = $result->select('report.*')->paginate(10);
        // $result = $result->get();
        return view('page.report.list', ['data' => $result, 'number' => $startFrom, 'title' => 'report']);
    }
}
