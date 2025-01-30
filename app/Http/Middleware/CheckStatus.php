<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
    // public function handle($request, Closure $next)
    // {
    //     $response = $next($request);
    //     //If the status is not approved redirect to login 
    //     if (Auth::check() && Auth::user()->status_field != 'approved') {
    //         Auth::logout();
    //         return redirect('/login')->with('erro_login', 'Your error text');
    //     }
    //     return $response;
    // }
//     lalu tambahkan middleware  ke Kernel.php 

// 'checkstatus' => \App\Http\Middleware\CheckStatus::class,
// dan akhirnya tambahkan middleware ke rute Anda

// Route::post('/login', [
//     'uses'          => 'Auth\AuthController@login',
//     'middleware'    => 'checkstatus',
// ]);
}
