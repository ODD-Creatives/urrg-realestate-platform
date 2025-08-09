<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{ 
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Debugging: Display the input credentials
    \Log::debug('Login attempt with credentials:', $credentials);
    
    // Find the admin record
    $admin = \App\Models\Admin::where('email', $credentials['email'])->first();

    if (!$admin) {
        \Log::debug('No admin found with this email');
        return back()->withErrors(['email' => 'No admin account found with this email']);
    }

    // Debugging: Display the admin record found
    \Log::debug('Admin record found:', $admin->toArray());
    
    // Check if password matches
    if (!\Hash::check($credentials['password'], $admin->password)) {
        \Log::debug('Password mismatch');
        \Log::debug('Input password: '.$credentials['password']);
        \Log::debug('Stored hash: '.$admin->password);
        return back()->withErrors(['password' => 'Incorrect password']);
    }

    // Attempt login
    if (Auth::guard('admin')->attempt($credentials)) {
        \Log::debug('Login successful');
        return redirect()->intended(route('admin.dashboard.index'));
    }

    \Log::debug('Login failed for unknown reason');
    return back()->withErrors(['email' => 'Invalid login credentials']);
}

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
