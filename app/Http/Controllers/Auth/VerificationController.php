<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\OtpVerification;

class VerificationController extends Controller
{ 
    
    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
        // $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }   
   
    public function verify($id, $hash)
    { 
        $user = User::findOrFail($id);
        
        // Check if user is already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('success', '🎉 Your email is already verified! You can now log in.');
        }
        
        // Check if hash matches
        if (sha1($user->email) !== $hash) {
            return redirect()->route('verification.notice')->with('error', 'Invalid verification link. Please request a new one.');
        }
        
        // Mark email as verified
        $user->markEmailAsVerified();
        
        return redirect()->route('login')->with('success', '🎉 Congratulations! You have successfully verified your email. You can now log in.');
    }

    public function notice(Request $request, $user_id)
    {

        return view('auth.verify-otp', [
            'email' => session('email'),
            'phone' => session('phone'),
            'user_id' => $user_id ? decrypt($user_id) : null,
        ]);
    }

    public function verifyOtp(Request $request)
    {
      
        $validated = $request->validate([
            'otp' => 'required|digits:6',
            'user_id' => 'required|exists:users,id'
        ]);

        // Find user and stored OTP
        $user = User::findOrFail($validated['user_id']);
        $storedOtp = OtpVerification::where('user_id', $user->id)->first();

        // Check if OTP exists
        if (!$storedOtp) {
            return back()->withErrors(['otp' => 'OTP expired or not found.']);
        }

        // Check if OTP matches
        if ($validated['otp'] !== $storedOtp->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP code.']);
        }

        // Check if OTP is expired (optional)
        if ($storedOtp->expires_at && now()->gt($storedOtp->expires_at)) {
            return back()->withErrors(['otp' => 'OTP has expired.']);
        }

        // Mark user as verified
        $user->update([
            'otp_verified_at' => now(),
        ]);

        return redirect()->route('login')->with('success', 'OTP verified successfully!');
    }
}
