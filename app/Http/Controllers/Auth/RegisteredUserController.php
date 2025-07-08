<?php

namespace App\Http\Controllers\Auth;
use Mail; 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerificationEmail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /** 
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'state_of_residence' => 'required|string|max:255',
            'referral_code' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'state_of_residence' => $request->state_of_residence,
            'referral_code' => $request->referral_code,
            'experience' => $request->experience,
            'password' => Hash::make($request->password),
        ]);

        // Send email verification notification
        // event(new Registered($user));

        // Auth::login($user);
        // Send verification email and referral link
        $referralLink = "https://uniqueradiancerealtorsgroup.com/register/referral/{$user->referral_code}";
        try {
            Mail::to($user->email)->send(new VerificationEmail($user, $referralLink));
            \Log::info('VerificationEmail sent successfully');
        } catch (\Exception $e) {
            \Log::error('VerificationEmail sending failed: ' . $e->getMessage());
        }
        
        return redirect()->route('signin')
        ->with('success', 'Registration successful! Please check your email to verify your account.');
        
    }
}
