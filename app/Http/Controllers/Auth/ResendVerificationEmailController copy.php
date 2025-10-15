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
    public function __invoke(Request $request): RedirectResponse
    {
        Log::info('Resend verification attempt', [
            'user_id' => $request->user()?->id,
            'has_csrf_token' => $request->has('_token'),
            ' session_id' => session()->getId(),
        ]);

        $user = $request->user();

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