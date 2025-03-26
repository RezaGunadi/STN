<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $registRepo = new RegisterController();
        $registRepo->validator($data);
        $registRepo->create($data);
        if ($request->email == 'rezagunadi97@gmail.com'|| $request->email == 'rezagunadi220697@gmail.com') {
            $user = User::where('email',)->first();
            $user->role = 'owner';
            $user->status = 'active';
            $user->save();

        }
    }
}
