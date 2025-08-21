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
        $user, // Can be User or Admin model
        $referral, 
        float $amount,
        int $level,
        string $status = 'pending'
    ): Commission {
        try {
            return DB::transaction(function () use ($user, $referral, $amount, $level, $status) {
                $commissionData = [
                    'amount' => $amount,
                    'level' => $level,
                    'status' => $status,
                    'paid_at' => $status === 'paid' ? now() : null
                ];

                // Handle different entity types
                if ($user instanceof \App\Models\Admin) { 
                    \Log::info('Processing commission for admin: ' . $user);
                    $commissionData['user_id'] = $user->id; 
                    $commissionData['user_email'] = $user->email;
                    $commissionData['referral_code'] = $user->referral_code;
                } else {
                    $commissionData['user_id'] = $user->id;
                    $commissionData['user_email'] = $user->email;
                    $commissionData['referral_code'] = $user->referral_code;
                }

                // Set referral information
                if ($referral instanceof User) {
                    $commissionData['referral_id'] = $referral->id;
                    $commissionData['referral_code'] = $referral->referral_code;
                }

                $commission = Commission::updateOrCreate(
                    [
                        'user_id' => $user instanceof User ? $user->id : null,
                        'admin_id' => $user instanceof \App\Models\Admin ? $user->id : null,
                        'referral_id' => $referral->id,
                        'level' => $level
                    ],
                    $commissionData
                );

                return $commission;
            });
        } catch (\Exception $e) {
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
    array $uplineCommissions = [],
    ?int $propertyId = null
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
                if ($upline['amount'] > 0) {
                    $uplineUser = $upline['is_admin'] ? 
                        \App\Models\Admin::find($upline['user_id']) : 
                        User::find($upline['user_id']);
                    
                    if ($uplineUser) {
                        $results['upline_commissions'][] = $this->updateOrCreateCommission(
                            $uplineUser,
                            $realtor,
                            $upline['amount'],
                            $upline['level'],
                            'paid'
                        );
                    }
                }
            }

            // Mark property as sold if provided
            if ($propertyId) {
                $property = \App\Models\Property::find($propertyId);
                if ($property) {
                    $property->update([
                        'status' => 'sold',
                        'sold_by' => $realtor->id,
                        'sold_at' => now()
                    ]);
                }
            }

            // ✅ INCREMENT SOLD PROPERTIES COUNT FOR THE REALTOR
            $realtor->increment('sold_properties');

            DB::commit();

            return $results;
        } catch (\Exception $e) {
            DB::rollBack();
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