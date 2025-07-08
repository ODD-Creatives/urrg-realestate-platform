<?php

namespace App\Services;

use App\Models\ReferralCode;
use App\Models\ReferralTracking;
use App\Models\Admin;
use Illuminate\Support\Str;

class ReferralService
{
    public function generateReferralCode(Admin $admin, array $options = [])
    {
        $code = $this->generateUniqueCode();
     
        return ReferralCode::create([
            'user_id' => $admin->id,
            'code' => $code,
            'expires_at' => $options['expires_at'] ?? null,
        ]);
    }

    protected function generateUniqueCode(): string
    {
        do {
            $code = Str::upper(Str::random(8));
        } while (ReferralCode::where('code', $code)->exists());

        return $code;
    }

    public function trackReferralUsage(string $code, User $referredUser, float $commission = 0.00): bool
    {
        $referralCode = ReferralCode::where('code', $code)
            ->whereHas('user')
            ->first();

        if (!$referralCode || !$referralCode->isValid()) {
            return false;
        }

        // Create tracking record
        $tracking = ReferralTracking::create([
            'referral_code_id' => $referralCode->id,
            'referred_user_id' => $referredUser->id,
            'commission_earned' => $commission,
            'completed_at' => now(),
        ]);

        // Update referral code usage
        $referralCode->increment('uses');
        
        // Update user's referral balance
        $referralCode->user->increment('referral_balance', $commission);
        
        // Set referred_by on the new user
        $referredUser->update(['referred_by' => $referralCode->user_id]);

        return true;
    }

    public function getUserReferralStats(User $user)
    {
        return [
            'total_referrals' => ReferralTracking::whereHas('referralCode', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->count(),
            'pending_referrals' => ReferralTracking::whereHas('referralCode', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->whereNull('completed_at')->count(),
            'total_earnings' => $user->referral_balance,
            'active_codes' => $user->referralCodes()->valid()->count(),
        ];
    }
}