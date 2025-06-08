<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\HistoriesDB;
use App\Models\ProductDB;
use App\Models\ProductTypeDB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        if(Auth::user()->role != 'super_user'){
                $result = $result->whereNotIn('role', ['user','super_user']);
        }
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
    public function addUser()
    {
        return view('page.user.input', ['title' => 'user']);
    }
    public function input(Request $request)
    {
        $data = $request->all();
        $checkData = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        if ($checkData) {
            return redirect()->back()->with('error', 'Nomor Ponsel atau E-Mail sudah terpakai');
        }
        $data['password'] = $data['phone'];
        Log::info('1');
        $registerController = new RegisterController();
        $registerController->validator($data);
        Log::info('2');
        $registerController->create($data);
        Log::info('3');
        $user = User::where('email', $request->email)->first();
        Log::info('4');
        $user->status = $data['status'];
        Log::info('5');
        $user->role = $data['role'];
        Log::info('6');
        $user->created_by = Auth::user()->id;
        $user->Save();

        $history = new HistoriesDB();
        $old = '';
        $new = '';
        $column = '';

        $history->input($user->id, 'user', 'create', $old, $new, $column, $user->toArray());
        return redirect(URL::To('/list-user'))->with('success', 'Berhasil menambahkan pengguna');
    }
    public function submit(Request $request)
    {
        $data = $request->all();
        $result = User::where('id', $request->id)->first();
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
            $history->input($result->id, 'user', 'update', $old, $new, $column, $additionalData);
        }
        if ($data['email'] != $additionalData['email']) {
            $column = 'email';
            $old = $additionalData['email'];
            $new = $data['email'];
            $history->input($result->id, 'user', 'update', $old, $new, $column, $additionalData);
        }
        if ($data['phone'] != $additionalData['phone']) {
            $column = 'phone';
            $old = $additionalData['phone'];
            $new = $data['phone'];
            $history->input($result->id, 'user', 'update', $old, $new, $column, $additionalData);
        }
        if ($data['status'] != $additionalData['status']) {
            $column = 'status';
            $old = $additionalData['status'];
            $new = $data['status'];
            $history->input($result->id, 'user', 'update', $old, $new, $column, $additionalData);
        }
        if ($data['role'] != $additionalData['role']) {
            $column = 'role';
            $old = $additionalData['role'];
            $new = $data['role'];
            $history->input($result->id, 'user', 'update', $old, $new, $column, $additionalData);
        }
        $result->save();
        return redirect(URL::To('/list-user'))->with('success', 'Berhasil mengubah data pengguna');
    }
    public function edit($id)
    {
        $result = User::where('id', $id)->first();
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
    function forgotPassword($currectDigit, $key)
    {
        try {
            // if($user->is_email_verified == 1){


            $user = User::where('id', Auth::user()->id)->first();
            Mail::send('email.pass_forgot', ['user' => $user], function ($message) use ($user) {
                $message->subject("Permintaan reset password");
                $message->from('no-reply@stn.co.id', 'STN Company');
                $message->to($user->email);
            });
            //  }
        } catch (\Exception $e) {
            Log::error("ERROR SEND EMAIL EMAILMODEL" . $e->getMessage() . $e->getLine() . $user->email);
        }
        return redirect(URL::To('/'));
    }
    public function myProfile()
    {

        $result = User::where('id', Auth::user()->id)->first();
        return view('page.profile.show', ['data' => $result, 'title' => 'profile']);
    }
    public function changePasswordView()
    {

        $result = User::where('id', Auth::user()->id)->first();
        return view('page.profile.change_password', ['data' => $result, 'title' => 'profile']);
    }
    public function updateProfile(Request $request)
    {

        User::where('id', Auth::user()->id)->update($request->all());
        return redirect(URL::To('/my-profile'));
    }
    public function changePassword(Request $request)
    {
        if ($request->old_password) {

            $user = User::where('id', Auth::user()->id)->first();
            if (!$user) {
                Auth::logout();
                return redirect(route('login'))->with('error', 'pengguna tidak di temukan');
            }
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error', 'Kata sandi lama salah');
            }
        }
        if ($request->password != $request->confrm_password) {
            return redirect()->back()->with('error', 'Kata sandi tidak sama');
        }

        $result = User::where('id', Auth::user()->id)->first();
        $result->password = Hash::make($request->password);
        return redirect(URL::To('/my-profile'))->with('success', 'Berhasil mengubah kata sandi');
    }
    public function emailTest()
    {

        $result = User::where('id', Auth::user()->id)->first();
        return view('email.pass_forgot', ['data' => $result, 'title' => 'profile']);
    }

    public function dashboard()
    {
        $user = Auth::user();
        $recentActivities = HistoriesDB::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('page.user.dashboard', [
            'user' => $user,
            'recentActivities' => $recentActivities,
            'title' => 'User Dashboard'
        ]);
    }

    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     // Track old values for history
    //     $oldData = $user->toArray();

    //     $user->update($request->all());

    //     // Create history entry
    //     $history = new HistoriesDB();
    //     $history->input(
    //         $user->id,
    //         'user',
    //         'update',
    //         json_encode($oldData),
    //         json_encode($user->toArray()),
    //         'all',
    //         $oldData
    //     );

    //     return redirect()->back()->with('success', 'User updated successfully');
    // }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Track old values for history
        $oldData = $user->toArray();

        $user->delete();

        // Create history entry
        $history = new HistoriesDB();
        $history->input(
            $user->id,
            'user',
            'delete',
            json_encode($oldData),
            '',
            'all',
            $oldData
        );

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function index()
    {
        $users = User::whereNotIn('role', ['user','super_user'])->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user,manager'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        // Record history
        HistoriesDB::create([
            'created_by' => Auth::id(),
            'ref_id' => $user->id,
            'ref_type' => 'create_user',
            'desc' => "Created new user '{$user->name}' with role '{$user->role}'",
            'data' => [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ]
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // public function edit(User $user)
    // {
    //     return view('users.edit', compact('user'));
    // }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,user,manager'
        ]);

        $oldRole = $user->role;
        $user->update($request->all());

        // Record history
        HistoriesDB::create([
            'created_by' => Auth::id(),
            'ref_id' => $user->id,
            'ref_type' => 'update_user',
            'desc' => "Updated user '{$user->name}' role from '{$oldRole}' to '{$user->role}'",
            'data' => [
                'user_id' => $user->id,
                'name' => $user->name,
                'old_role' => $oldRole,
                'new_role' => $user->role
            ]
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Record history before deletion
        HistoriesDB::create([
            'created_by' => Auth::id(),
            'ref_id' => $user->id,
            'ref_type' => 'delete_user',
            'desc' => "Deleted user '{$user->name}' with role '{$user->role}'",
            'data' => [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ]
        ]);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }

    // public function changePassword(Request $request, User $user)
    // {
    //     $request->validate([
    //         'password' => 'required|string|min:8|confirmed'
    //     ]);

    //     $user->update([
    //         'password' => Hash::make($request->password)
    //     ]);

    //     // Record history
    //     History::create([
    //         'user_id' => Auth::id(),
    //         'action' => 'change_password',
    //         'description' => "Changed password for user '{$user->name}'",
    //         'data' => [
    //             'user_id' => $user->id,
    //             'name' => $user->name
    //         ]
    //     ]);

    //     return redirect()->route('users.index')
    //         ->with('success', 'Password changed successfully.');
    // }

    public function home()
    {
        \Illuminate\Support\Facades\DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        // return view('users.home');
        $products = ProductDB::groupBy('type')
            ->groupBy('product_name')
            ->groupBy('brand')
            ->groupBy('category')
            ->get();
        return view('layouts.user', compact('products'));
    }
}
