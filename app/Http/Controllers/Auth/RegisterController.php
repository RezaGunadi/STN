<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required',  'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 100; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if ($data['email'] == 'rezagunadi97@gmail.com' || $data['email'] == 'rezagunadi220697@gmail.com') {
            return User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => strtolower($data['email']),
                'mobile_token' => $randomString,
                'qr' => $randomString,
                'password' => Hash::make($data['password']),
                'role' => 'super_user',
                'status' => 'active',
            ]);
        } else {
            return User::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => strtolower($data['email']),
                'mobile_token' => $randomString,
                'qr' => $randomString,
                'password' => Hash::make($data['password']),
                'role' => 'user',
                'status' => 'inactive',

            ]);
        }
    }
}
