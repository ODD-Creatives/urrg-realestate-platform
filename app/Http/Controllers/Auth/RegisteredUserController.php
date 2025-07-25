<?php

namespace App\Http\Controllers\Auth;
use Mail; 
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Commission;
use App\Models\Wallet;
use App\Models\Admin;
use App\Models\ReferralCode;
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
        // Find the referrer
        $referrer = ReferralCode::where('code', $request->referral_code)->first();
        if (!$referrer) {
            $referrer = User::where('referral_code', $request->referral_code)->first();
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone, 
            'state_of_residence' => $request->state_of_residence,
            'referral_code' => $this->generateUniqueReferralCode(),
            'experience' => $request->experience,
            'password' => Hash::make($request->password),
            'upline_referral' => $request->referral_code,
            'status' => 'active',
        ]);

        // Process referral commissions if referrer exists
        if ($referrer) {
            // Check if the referrer is an admin or a user
            if ($referrer instanceof ReferralCode && $referrer->admin) {
            // ReferralCode with admin relationship means admin referrer
            $this->processReferralCommissionsAdmin($user, $referrer);
            } elseif ($referrer instanceof User) {
            // User model means user referrer
            $this->processReferralCommissionsUser($user, $referrer);
            }
        }

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


    protected function processReferralCommissionsAdmin(User $newUser, ReferralCode $referrer)
    {
        $commissionAmount = 50; // Commission amount
        $levelsToPay = 3; // Pay up to 3 levels
        
        $currentUpline = $referrer;
        $level = 1;
        
        while ($currentUpline && $level <= $levelsToPay) {
            try {
                // Get the admin user - ensure this returns a valid user
                $uplineUser = Admin::find($currentUpline->admin->id);
                
                if (!$uplineUser) {
                    \Log::error("Admin user not found for upline ID: {$currentUpline->id}");
                    break;
                }

                // Verify the user exists in the users table (if user_id references users table)
                $userExists = Admin::where('id', $uplineUser->id)->exists();
                
                if (!$userExists) {
                    \Log::error("User ID {$uplineUser->id} not found in users table");
                    break;
                }

                // Create commission record
                Commission::create([
                    'user_id' => $uplineUser->id,
                    'user_email' => $uplineUser->email,
                    'referral_id' => $newUser->id,
                    'amount' => $commissionAmount,
                    'level' => $level,
                    'status' => 'pending',
                ]);
                
                // Update upline's wallet - ensure this uses the same ID as commission
                $wallet = Wallet::firstOrCreate([
                    'user_id' => $uplineUser->id,
                    'user_email' => $uplineUser->email,
                ]);
                $wallet->balance += $commissionAmount;
                $wallet->save();
                
                \Log::info("Commission paid to {$uplineUser->email} at level {$level}");

                // Move to next upline level
                $currentUpline = $currentUpline->upline;
                $level++;
                
            } catch (\Exception $e) {
                \Log::error("Commission processing failed at level {$level}: " . $e->getMessage());
                break;
            }
        }
    }

    protected function processReferralCommissionsUser(User $newUser, User $referrer)
    {
        $commissionAmount = 50; // Commission amount
        $levelsToPay = 3; // Pay up to 3 levels
        
        $currentUpline = $referrer;
        $level = 1;
        
        while ($currentUpline && $level <= $levelsToPay) {
            try {
                // Get the admin user - ensure this returns a valid user
                $uplineUser = User::find($currentUpline->id);
                
                if (!$uplineUser) {
                    \Log::error("Admin user not found for upline ID: {$currentUpline->id}");
                    break;
                }

                // Verify the user exists in the users table (if user_id references users table)
                $userExists = User::where('id', $uplineUser->id)->exists();
                
                if (!$userExists) {
                    \Log::error("User ID {$uplineUser->id} not found in users table");
                    break;
                }

                // Create commission record
                Commission::create([
                    'user_id' => $uplineUser->id,
                    'user_email' => $uplineUser->email,
                    'referral_id' => $newUser->id,
                    'amount' => $commissionAmount,
                    'level' => $level,
                    'status' => 'pending',
                ]);
                
                // Update upline's wallet - ensure this uses the same ID as commission
                $wallet = Wallet::firstOrCreate([
                    'user_id' => $uplineUser->id,
                    'user_email' => $uplineUser->email,
                ]);
                $wallet->balance += $commissionAmount;
                $wallet->save();
                
                \Log::info("Commission paid to {$uplineUser->email} at level {$level}");

                // Move to next upline level
                $currentUpline = $currentUpline->upline;
                $level++;
                
            } catch (\Exception $e) {
                \Log::error("Commission processing failed at level {$level}: " . $e->getMessage());
                break;
            }
        }
    }

    protected function generateUniqueReferralCode()
    {
        $code = strtoupper(substr(md5(uniqid()), 0, 8));
        
        // Ensure the code is unique
        while (User::where('referral_code', $code)->exists()) {
            $code = strtoupper(substr(md5(uniqid()), 0, 8));
        }
        
        return $code;
    }

}
