<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Log;


class PasswordResetLinkController extends Controller
{ 
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }
 

    public function store(Request $request): RedirectResponse
    {
        // Validate email input
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        try {
            // Attempt to send password reset link
            $status = Password::sendResetLink($request->only('email'));

            // Check status and return appropriate message
            if ($status === Password::RESET_LINK_SENT) {
                return back()->with('status', 'A password reset link has been sent to your email.');
            } else {
                return back()->with('status', 'If your email exists, a reset link has been sent.');
            }

        } catch (\Exception $e) {
            // Log the detailed error for debugging
            Log::error('Password reset email failed: ' . $e->getMessage(), [
                'email' => $request->input('email'),
            ]);

            // Always show a friendly generic message to the user
            return back()->with('status', 'If your email exists, a reset link has been sent.');
        }
    }
    
}
