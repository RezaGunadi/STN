<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
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
        // password_confirmation
        // dd($request);
        $data = $request->all();
        $registRepo = new RegisterController();
        $registRepo->validator($data);
        $registRepo->create($data);
        // mobile_token
    }
}
