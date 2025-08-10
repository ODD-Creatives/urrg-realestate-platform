<?php

namespace App\Services;

use App\Models\Commission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommissionService
{
    /**
     * Create or update a commission record
     *
     * @param User $user The user earning the commission
     * @param User $referral The referring user
     * @param float $amount Commission amount
     * @param int $level Upline level (1 = direct, 2 = grandchild, etc.)
     * @param string $status Payment status
     * @return Commission
     * @throws \Exception
     */
    public function updateOrCreateCommission(
        User $user,
        User $referral,
        float $amount,
        int $level,
        string $status = 'pending'
    ): Commission {
        try {
            return DB::transaction(function () use ($user, $referral, $amount, $level, $status) {
                $commission = Commission::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'referral_id' => $referral->id,
                        'level' => $level
                    ],
                    [
                        'user_email' => $user->email,
                        'referral_code' => $user->referral_code,
                        'amount' => $amount,
                        'status' => $status,
                        'paid_at' => $status === 'paid' ? now() : null
                    ]
                );

                Log::info("Commission processed", [
                    'action' => $commission->wasRecentlyCreated ? 'created' : 'updated',
                    'commission_id' => $commission->id,
                    'user_id' => $user->id,
                    'referral_id' => $referral->id,
                    'amount' => $amount,
                    'level' => $level
                ]);

                return $commission;
            });
        } catch (\Exception $e) {
            Log::error("Commission processing failed", [
                'error' => $e->getMessage(),
                'user_id' => $user->id,
                'referral_id' => $referral->id
            ]);
            throw $e;
        }
    }

    /**
     * Process bulk commission payments
     *
     * @param User $realtor
     * @param float $realtorAmount
     * @param array $uplineCommissions
     * @return array
     * @throws \Exception
     */
    public function processBulkPayments(
        User $realtor,
        float $realtorAmount,
        array $uplineCommissions = []
    ): array {
        $results = [];
        
        try {
            DB::beginTransaction();

            // Process main realtor commission
            $results['realtor_commission'] = $this->updateOrCreateCommission(
                $realtor,
                $realtor, // Self-referral for main payment
                $realtorAmount,
                0, // Level 0 for main payment
                'paid'
            );

            // Process upline commissions
            foreach ($uplineCommissions as $upline) {
                $results['upline_commissions'][] = $this->updateOrCreateCommission(
                    User::find($upline['user_id']),
                    $realtor,
                    $upline['amount'],
                    $upline['level'] ?? 1,
                    'paid'
                );
            }

            DB::commit();

            return $results;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Bulk commission payment failed", [
                'realtor_id' => $realtor->id,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Calculate commission level between two users
     *
     * @param User $user
     * @param User $referral
     * @return int
     */
    public function calculateLevel(User $user, User $referral): int
    {
        $level = 1;
        $currentReferrer = $user->referrer;

        while ($currentReferrer && $level < 3) {
            if ($currentReferrer->id === $referral->id) {
                return $level;
            }
            $currentReferrer = $currentReferrer->referrer;
            $level++;
        }

        return $level;
    }
}