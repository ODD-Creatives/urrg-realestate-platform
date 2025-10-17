<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Check if the user account is active
            if (isset($user->active) && !$user->active) {
                Auth::logout();

                return back()->withErrors([
                    'login_error' => 'Your account has been deactivated. Please contact support.',
                ])->onlyInput('email');
            }

            // Check if the user's email is verified
            if ($user->hasVerifiedEmail()) {
                return redirect()->intended(route('user.dashboard'));
            }

            // Store user email in session for resend functionality
            session(['unverified_email' => $user->email]);
            
            Auth::logout();

            return back()->withErrors([
                'email' => 'Your account has not been verified. Please check your email for the verification link.',
            ])->with('unverified_user', true)
              ->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Resend verification email for unverified users
     */
    public function resendVerification(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'No account found with this email address.');
        }

        if ($user->hasVerifiedEmail()) {
            return back()->with('error', 'This email is already verified. You can log in.');
        }

        // Generate new verification URL (1 minute for testing)
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(1),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        ); 

        // Resend verification email
        try {
            $referralLink = config('app.url') . 'register/referral/' . $user->referral_code;
            Mail::to($user->email)->send(new VerificationEmail($user, $referralLink));
            
            return back()->with('success', 'A new verification link has been sent to your email address.')
                        ->with('email', $user->email);
                    
        } catch (\Exception $e) {
            \Log::error("Failed to resend verification email: " . $e->getMessage());
            return back()->with('error', 'Failed to send verification email. Please try again.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}