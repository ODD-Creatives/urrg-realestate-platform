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
     * Create a new commission record (always creates new, never updates)
     *
     * @param mixed $user The user earning the commission (User or Admin model)
     * @param mixed $referral The referring user
     * @param float $amount Commission amount
     * @param int $level Upline level (1 = direct, 2 = grandchild, etc.)
     * @param string $status Payment status
     * @return Commission
     * @throws \Exception
     */
    public function createCommission(
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
                    'paid_at' => $status === 'paid' ? now() : null,
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                // Handle different entity types - MAKE IT CONSISTENT with updateOrCreateCommission
                if ($user instanceof \App\Models\Admin) { 
                    \Log::info('Creating new commission for admin: ' . $user->id);
                    // Use the same logic as updateOrCreateCommission - set user_id for admins too
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
                } elseif ($referral instanceof \App\Models\Admin) {
                    $commissionData['referral_code'] = $referral->referral_code;
                }

                // ALWAYS CREATE NEW RECORD - no updateOrCreate
                $commission = Commission::create($commissionData);

                \Log::info('Created new commission record', [
                    'commission_id' => $commission->id,
                    'user_id' => $commissionData['user_id'],
                    'referral_id' => $commissionData['referral_id'] ?? null,
                    'amount' => $amount,
                    'level' => $level
                ]);

                return $commission;
            });
        } catch (\Exception $e) {
            \Log::error('Failed to create commission record: ' . $e->getMessage());
            throw $e;
        }
    }

    


    public function processBulkPaymentsNewRecords(
        User $realtor, 
        float $realtorAmount,
        array $uplineCommissions = [],
        ?int $propertyId = null
    ): array {
        $results = [];
        
        try {
            DB::beginTransaction();

            // Process main realtor commission - ALWAYS CREATE NEW RECORD
            if ($realtorAmount > 0) {
                $results['realtor_commission'] = $this->createCommission(
                    $realtor,
                    $realtor, // Self-referral for main payment
                    $realtorAmount,
                    0, // Level 0 for main payment
                    'paid'
                );
            }

            // Process upline commissions - ALWAYS CREATE NEW RECORDS
            $results['upline_commissions'] = [];
            foreach ($uplineCommissions as $upline) {
                if ($upline['amount'] > 0) {
                    $uplineUser = $upline['is_admin'] ? 
                        \App\Models\Admin::find($upline['user_id']) : 
                        User::find($upline['user_id']);
                    
                    if ($uplineUser) {
                        $commission = $this->createCommission(
                            $uplineUser,
                            $realtor,
                            $upline['amount'],
                            $upline['level'],
                            'paid'
                        );
                        $results['upline_commissions'][] = $commission;
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

            \Log::info('Bulk commission payments processed successfully', [
                'realtor_id' => $realtor->id,
                'realtor_amount' => $realtorAmount,
                'upline_commissions_count' => count($results['upline_commissions']),
                'total_commissions_created' => count($results['upline_commissions']) + ($realtorAmount > 0 ? 1 : 0)
            ]);

            return $results;
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Bulk commission payments failed: ' . $e->getMessage());
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