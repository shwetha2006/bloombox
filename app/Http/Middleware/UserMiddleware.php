<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class UserMiddleware
// {
//     public function handle(Request $request, Closure $next)
//     {
        // Ensure the user is authenticated and has the 'user' user_type
//         if (Auth::check() && Auth::user()->role == 'customer') {
//             return $next($request);
//         }

//         // Redirect to the user login page if not a user
//         return redirect()->route('user.login')->with('error', 'Unauthorized access.');
//     }
// }