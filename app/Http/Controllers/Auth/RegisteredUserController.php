<?php

namespace App\Http\Controllers\Auth;
use DB; 
use Mail; 
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Commission;
use App\Models\Wallet; 
use App\Models\ReferralLog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
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

    
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'state_of_residence' => 'required|string|max:255',
            'referral_code' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Check in users table
                    $userExists = User::where('referral_code', $value)->exists();
                    
                    // Check in referral_codes table if it exists
                    $codeExists = ReferralCode::with('admin')->where('code', $value)->exists();
                    
                    if (!$userExists && !$codeExists) {
                        $fail('The referral code is invalid.');
                    }
                }
            ],
            'experience' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Find referrer with transaction for data consistency
        return DB::transaction(function () use ($request) {
            $referrer = ReferralCode::with('admin')->where('code', $request->referral_code)->first();
            
            if (!$referrer) {
                $referrer = User::where('referral_code', $request->referral_code)->firstOrFail();
            }

            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'state_of_residence' => $request->state_of_residence,
                'referral_code' => $this->generateUniqueReferralCode(),
                'realtor_id' => $this->generateRealtorId(), 
                'experience' => $request->experience,
                'password' => Hash::make($request->password),
                'upline_referral' => $request->referral_code,
                'status' => 'active',
            ]);

            // Process referral commissions
            if ($referrer instanceof ReferralCode && $referrer->admin) {
                $this->processReferralCommissionsAdmin($user, $referrer);
            } elseif ($referrer instanceof User) {
                $this->processReferralCommissionsUser($user, $referrer);
            }

            // Send verification email
            $this->sendVerificationEmail($user);

            return redirect()->route('signin')
                ->with('success', 'Registration successful! Please check your email to verify your account.');
        });
    }

    protected function generateRealtorId(): string
    {
        $date = now();
        $datePrefix = $date->format('Ymd'); 
        $displayDate = $date->format('mdy'); 
        
        $sequence = DB::table('realtor_sequences')
            ->where('date_prefix', $datePrefix)
            ->lockForUpdate()
            ->first();
        
        if ($sequence) {
            $newSequence = $sequence->last_sequence + 1;
            DB::table('realtor_sequences')
                ->where('date_prefix', $datePrefix)
                ->update(['last_sequence' => $newSequence]);
        } else {
            $newSequence = 1;
            DB::table('realtor_sequences')->insert([
                'date_prefix' => $datePrefix,
                'last_sequence' => $newSequence,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
        return 'URR' . $displayDate . str_pad($newSequence, 2, '0', STR_PAD_LEFT);
    }

    protected function processReferralCommissionsAdmin(User $newUser, ReferralCode $referrer)
    {
        $commissionAmount = 50;
        $levelsToPay = 3;
        $currentUpline = $referrer;
        $level = 1;
        
        while ($currentUpline && $level <= $levelsToPay) {
            try {
                $uplineAdmin = $currentUpline->admin;
                
                if (!$uplineAdmin) {
                    \Log::error("Admin not found for referral code: {$currentUpline->code}");
                    break;
                }

                $this->createCommissionRecord($newUser, $uplineAdmin, $level, $commissionAmount);
                $this->createReferralLog($newUser, $uplineAdmin, $level);
                $this->updateWallet($uplineAdmin, $commissionAmount);
                
                $currentUpline = $currentUpline->upline;
                $level++;
                
            } catch (\Exception $e) {
                \Log::error("Commission processing failed: " . $e->getMessage());
                break;
            }
        }
    }

    protected function processReferralCommissionsUser(User $newUser, User $referrer)
    {
        $commissionAmount = 0;
        $levelsToPay = 3;
        $currentUpline = $referrer;
        $level = 1;
        
        while ($currentUpline && $level <= $levelsToPay) {
            try {
                $this->createCommissionRecord($newUser, $currentUpline, $level, $commissionAmount);
                $this->createReferralLog($newUser, $currentUpline, $level);
                $this->updateWallet($currentUpline, $commissionAmount);
                
                $currentUpline = $currentUpline->upline;
                $level++;
                
            } catch (\Exception $e) {
                \Log::error("Commission processing failed: " . $e->getMessage());
                break;
            }
        }
    }

    protected function createCommissionRecord(User $newUser, $upline, int $level, int $amount)
    {
        return Commission::create([
            'user_id' => $upline->id,
            'user_email' => $upline->email,
            'referral_id' => $newUser->id,
            'amount' => $amount,
            'level' => $level,
            'status' => 'pending',
        ]);
    }

    protected function createReferralLog(User $newUser, $referrer, int $level)
    {
        return ReferralLog::create([
            'user_id' => $newUser->id,
            'referrer_id' => $referrer->id,
            'referrer_type' => get_class($referrer),
            'level' => $level,
        ]);
    }

    protected function updateWallet($user, int $amount)
    {
        $wallet = Wallet::firstOrCreate([
            'user_id' => $user->id,
            'user_email' => $user->email,
        ]);
        
        $wallet->balance += $amount;
        $wallet->save();
        
        return $wallet;
    }

    protected function sendVerificationEmail(User $user)
    {
        $referralLink = "https://uniqueradiancerealtorsgroup.com/register/referral/{$user->referral_code}";
        
        try {
            Mail::to($user->email)->send(new VerificationEmail($user, $referralLink));
            \Log::info("Verification email sent to {$user->email}");
        } catch (\Exception $e) {
            \Log::error("Failed to send verification email: " . $e->getMessage());
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
