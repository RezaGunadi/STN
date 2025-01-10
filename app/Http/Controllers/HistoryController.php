<?php

namespace App\Http\Controllers;

use App\Models\HistoriesDB;
use Illuminate\Http\Request;

class HistoryController extends Controller
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
        $result = HistoriesDB::
            // take($limit)->skip($startFrom)->
            orderBy($orderBy, $orderPriority);

        if (array_key_exists('description', $data)) {
            $result = $result->where('desc', 'LIKE', '%' . $data['description'] . '%');
        }
        if (array_key_exists('type', $data)) {
            $result = $result->where('ref_type', 'LIKE', '%' . $data['type'] . '%');
        }
        $result = $result->paginate(5);
        // $result = $result->get();
        return view('page.histories.list', ['data' => $result, 'number' => $startFrom, 'title' => 'history']);
    }
}
