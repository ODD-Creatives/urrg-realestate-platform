<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ResendVerificationByEmailController extends Controller
{
    public function showResendForm()
    {
        return view('auth.resend-verification');
    }

    public function resend(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'No account found with this email address.')
                        ->withInput();
        }

        if ($user->hasVerifiedEmail()) {
            return back()->with('error', 'This email is already verified. You can log in.')
                        ->withInput();
        }

        // Check if user has too many recent verification attempts (prevent spam)
        $recentAttempts = \Illuminate\Support\Facades\Cache::get('verification_attempts:' . $user->id, 0);
        if ($recentAttempts >= 5) {
            return back()->with('error', 'Too many verification attempts. Please try again in 10 minutes.')
                        ->withInput();
        }

        // Generate new verification URL (1 minute for testing)
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        ); 

        // Resend verification email
        try {
            $referralLink = config('app.url') . '/register/referral/' . $user->referral_code;
            Mail::to($user->email)->send(new VerificationEmail($user, $referralLink));
            
            // Track verification attempts
            \Illuminate\Support\Facades\Cache::put(
                'verification_attempts:' . $user->id, 
                $recentAttempts + 1, 
                now()->addMinutes(10) // Reset after 10 minutes
            );
            
            return back()->with('success', 'A new verification link has been sent to your email address.')
                        ->with('email', $user->email);
                        
        } catch (\Exception $e) {
            \Log::error("Failed to resend verification email: " . $e->getMessage());
            return back()->with('error', 'Failed to send verification email. Please try again.')
                        ->withInput();
        }
    }
}