<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        Log::info('CheckRole middleware', [
            'user' => Auth::user() ? [
                'id' => Auth::user()->id,
                'email' => Auth::user()->email,
                'role' => Auth::user()->role,
                'name' => Auth::user()->name
            ] : null,
            'url' => $request->url(),
            'method' => $request->method(),
            'session' => session()->all()
        ]);

        // if (!session()->has('user_id')) {
        //     Log::warning('Session expired in CheckRole middleware');
        //     if ($request->expectsJson()) {
        //         return response()->json(['error' => 'Session expired'], 401);
        //     }
        //     return redirect()->route('login');
        // }

        if (Auth::user()->role == 'user' || Auth::user()->role == '' || Auth::user()->role == null) {
            Log::info(Auth::user()->email . ' || ' . Auth::user()->role . ' || ' . Auth::user()->name . ' has trying to access ' . $request->url());
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
            return redirect()->route('home');
        }

        // $user = Auth::user();
        // $allowedRoles = explode(',', $roles);

        // if (!in_array($user->role, $allowedRoles)) {
        //     if ($user->role == 'user' || $user->role == '' || $user->role == null) {
        //         return redirect()->route('user_dashboard');
        //     }
        //     return redirect()->route('home')->with('error', 'Unauthorized access.');
        // }

        return $next($request);
    }
}
