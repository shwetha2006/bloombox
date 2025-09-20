<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Show the HTML login form (for web-based login)
     */
    public function showLoginForm()
    {
        return view('auth.admin-login'); 
    }

    /**
     * Handle web-based login (redirect to dashboard if success)
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        // Attempt login with role check
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records or you are not an admin.',
        ]);
    }

    /**
     * API login for admins (returns token instead of redirect)
     */
    public function apiLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Try to login
    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = Auth::user();

    if ($user->role !== 'admin') {
        Auth::logout();
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    // Create Sanctum token for admin
    $token = $user->createToken('admin-token')->plainTextToken;

    return response()->json([
        'message' => 'Admin login successful',
        'token'   => $token,
        'user'    => $user,
    ]);
}

public function apiLogout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'Logged out successfully']);
}

}
