<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\HistoriesDB;
use App\Models\ProductDB;
use App\Models\ProductTypeDB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
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
        $orderBy = 'name';
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
        $result = User::
        // take($limit)->skip($startFrom)->
        orderBy($orderBy, $orderPriority);

        if (array_key_exists('name', $data)) {
            $result = $result->where('name', 'LIKE', '%' . $data['name'] . '%');
        }
        if (array_key_exists('phone', $data)) {
            $result = $result->where('phone', 'LIKE', '%' . $data['phone'] . '%');
        }
        if (array_key_exists('email', $data)) {
            $result = $result->where('email', 'LIKE', '%' . $data['email'] . '%');
        }
        if (array_key_exists('role', $data)) {
            $result = $result->where('role', 'LIKE', '%' . $data['role'] . '%');
        }
        if (array_key_exists('status', $data)) {
            $result = $result->where('status', 'LIKE', '%' . $data['status'] . '%');
        }
        $result = $result->paginate(20);
        // $result = $result->get();
        return view('page.user.list', ['data' => $result, 'number' => $startFrom, 'title' => 'user']);
    }
    public function input(Request $request)
    {
        $data = $request->all();
        $data['password'] = $data['phone'];
        $registerController = new RegisterController();
        $result=$registerController->create($data);
        $result->status = $data['status'];
        $result->role = $data['role'];
        $result->Save();
        return redirect(URL::To('/list-user'));
    }
    public function submit(Request $request)
    {
        $data = $request->all();
        $result= User::where('id',$request->id)->first();
        $additionalData = clone $result;
        $additionalData = $additionalData->toArray();

        $result->name = $data['name'];
        $result->email = $data['email'];
        $result->phone = $data['phone'];
        $result->status = $data['status'];
        $result->role = $data['role'];


        $history = new HistoriesDB();
        $old = '';
        $new = '';
        $column = '';
        if ($data['name'] != $additionalData['name']) {
            $column = 'name';
            $old = $additionalData['name'];
            $new = $data['name'];
            $history->input($result->id, 'user', 'update', $old,$new, $column ,$additionalData);
        }
        if ($data['email'] != $additionalData['email']) {
            $column = 'email';
            $old = $additionalData['email'];
            $new = $data['email'];
            $history->input($result->id, 'user', 'update', $old,$new, $column ,$additionalData);
        }
        if ($data['phone'] != $additionalData['phone']) {
            $column = 'phone';
            $old = $additionalData['phone'];
            $new = $data['phone'];
            $history->input($result->id, 'user', 'update', $old,$new, $column ,$additionalData);
        }
        if ($data['status'] != $additionalData['status']) {
            $column = 'status';
            $old = $additionalData['status'];
            $new = $data['status'];
            $history->input($result->id, 'user', 'update', $old,$new, $column ,$additionalData);
        }
        if ($data['role'] != $additionalData['role']) {
            $column = 'role';
            $old = $additionalData['role'];
            $new = $data['role'];
            $history->input($result->id, 'user', 'update', $old,$new, $column ,$additionalData);
        }
        $result->save();
        return redirect(URL::To('/list-user'));
    }
    public function edit( $id)
    {
        $result= User::where('id',$id)->first();
        return view('page.user.edit', ['data' => $result, 'title' => 'user']);
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
                    $result = $result . $key1Array[$i][0];
                }
            }
        }
        for ($i = 0; $i < count($key2Array); $i++) {
            if (count($key2Array) > 0) {
                if (strlen($key2Array[$i]) > 0) {
                    $result = $result . $key2Array[$i][0];
                }
            }
        }
        for ($i = 0; $i < count($key3Array); $i++) {
            if (count($key3Array) > 0) {
                if (strlen($key3Array[$i]) > 0) {
                    $result = $result . $key3Array[$i][0];
                }
            }
        }
        return $result;
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
}
