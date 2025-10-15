<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;

class ResendVerificationEmailController extends Controller
{
    /**
     * Resend the email verification notification.
     */
    public function index(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.dashboard')->with('status', 'Your email is already verified!');
        }
        
        // Generate new verification URL
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        ); 

        // Resend verification email
        try {
            Mail::to($user->email)->send(new VerificationEmail($user, $user->referral_link ?? ''));
            \Log::info("Verification email resent to {$user->email}");
            
            return back()->with('status', 'verification-link-sent')
                        ->with('info', 'A new verification link has been sent to your email address. The link will expire in 60 minutes.');
                        
        } catch (\Exception $e) {
            \Log::error("Failed to resend verification email: " . $e->getMessage());
            return back()->with('error', 'Failed to send verification email. Please try again.');
        }
    }
}