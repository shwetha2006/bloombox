<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login API
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        // Only customers can login here
        if ($user->role !== 'customer') {
            Auth::logout();
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Create Sanctum token
        $token = $user->createToken('customer-token')->plainTextToken;

        // Optional: flash token to session for web login
        session()->flash('api_token', $token);

        return response()->json([
            'message' => 'Login successful',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

    // Logout API
public function logout(Request $request)
{
    if ($request->user() && $request->user()->currentAccessToken()) {
        $request->user()->currentAccessToken()->delete();
    }

    return response()->json(['message' => 'Logged out successfully']);
}

}
