<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ResendVerificationEmailController extends Controller
{
    /**
     * Resend the email verification notification.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        \Log::info('=== RESEND VERIFICATION DEBUG ===');
        \Log::info('User ID: ' . ($request->user()?->id ?? 'null'));
        \Log::info('Session ID: ' . session()->getId());
        \Log::info('CSRF Token from request: ' . $request->input('_token'));
        \Log::info('CSRF Token from session: ' . session()->token());
        \Log::info('Request method: ' . $request->method());
        \Log::info('Request URL: ' . $request->url());
        \Log::info('=== END DEBUG ===');

        $user = $request->user();

        if (!$user) {
            \Log::error('No authenticated user found');
            return redirect()->route('login');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.dashboard')->with('status', 'Email already verified!');
        }
        
        // Generate new verification URL
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        ); 

        // Resend verification email
        Mail::to($user->email)->send(new VerificationEmail($user, $user->referral_link ?? ''));

        return back()->with('status', 'verification-link-sent');
    }
}