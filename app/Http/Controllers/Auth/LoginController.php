<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');  // Make sure the login view exists in resources/views/auth/login.blade.php
    }

    // Handle login attempt
    public function login(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to log the user in
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            // Login successful, redirect to the intended page
            return redirect()->intended(route('dashboard')); // Redirect to the intended route or dashboard
        }

        // Login failed
        throw ValidationException::withMessages([
            'email' => ['These credentials do not match our records.'],
        ]);
    }

    // Logout the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Redirect to the login page after logout
    }
}
