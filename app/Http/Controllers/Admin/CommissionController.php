<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission; // Assuming you have a Commission model
use App\Models\Realtor;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\CommissionService;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    protected $commissionService;

    public function __construct(CommissionService $commissionService)
    {
        $this->commissionService = $commissionService;
    }

    public function index(Request $request)
    {
        $commissions = \App\Models\Commission::with(['user', 'referral'])
            ->when($request->search, function($q) use ($request) {
                $q->where(function($query) use ($request) {
                    $query->whereHas('user', function($q2) use ($request) {
                        $q2->where('referral_code', 'like', '%'.$request->search.'%')
                        ->orWhere('realtor_id', 'like', '%'.$request->search.'%')
                        ->orWhere('email', 'like', '%'.$request->search.'%')
                        ->orWhere('firstname', 'like', '%'.$request->search.'%')
                        ->orWhere('lastname', 'like', '%'.$request->search.'%');
                    });
                });
            })
            ->when($request->date, fn($q) => $q->whereDate('created_at', $request->date))
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->orderBy('created_at', 'desc')
            ->paginate(15); 

        $unreadAlerts = 3; 

        return view('admin.pages.commission.index', compact('commissions', 'unreadAlerts'));
    } 

    public function commissionPay(Request $request)
    { 
        $realtor = null; 
        $uplineTree = null;
        
        if ($request->has('search')) {
            $realtor = User::where('realtor_id', $request->search)
                ->orWhere('email', $request->search)
                ->first();
                
            if ($realtor) {
                // Strictly get only 3 uplines maximum
                $uplineTree = $this->getUplineTree($realtor, 3);
            }
        }

        return view('admin.pages.commission.pay', compact('realtor', 'uplineTree'));
    }

    protected function getUplineTree(User $user, int $maxLevels = 3): array
    {
        $tree = [
            'self' => $user,
            'uplines' => [],
            'has_uplines' => false,
            'total_levels' => 0
        ];

        if (empty($user->upline_referral)) {
            return $tree;
        }

        $currentCode = $user->upline_referral;
        $level = 1;
        $processedCodes = [];

        while ($currentCode && $level <= $maxLevels && !in_array($currentCode, $processedCodes)) {
            $processedCodes[] = $currentCode;

            // Check generate_codes table first
            $generatedCode = \App\Models\ReferralCode::with('admin')->where('code', $currentCode)->first();
            
            if ($generatedCode && $generatedCode->admin) {
                // Found in generate_codes - this is an admin
                $tree['uplines'][] = [
                    'entity' => $generatedCode->admin,
                    'level' => $level,
                    'type' => 'admin',
                    'code' => $currentCode,
                    'is_admin' => true
                ];
                
                // Move to admin's personal referral code
                $currentCode = $generatedCode->admin->referral_code;
                
            } else {
                // Check users table
                $userUpline = User::where('referral_code', $currentCode)->first();
                
                if ($userUpline) {
                    // Found in users table
                    $tree['uplines'][] = [
                        'entity' => $userUpline,
                        'level' => $level,
                        'type' => 'user',
                        'code' => $currentCode,
                        'is_admin' => false
                    ];
                    
                    // Move to user's upline referral
                    $currentCode = $userUpline->upline_referral;
                } else {
                    // Code not found anywhere
                    break;
                }
            }

            $level++;
            
            // Strictly stop at 3 levels
            if ($level > $maxLevels) {
                break;
            }
        }

        $tree['has_uplines'] = count($tree['uplines']) > 0;
        $tree['total_levels'] = count($tree['uplines']);

        return $tree;
    }


    // In your controller method
    public function processPayment(Request $request, CommissionService $commissionService)
    {
        try {
            $validated = $request->validate([
                'realtor_id' => 'required|exists:users,id',
                'realtor_amount' => 'required|numeric|min:0',
                'upline_commissions' => 'sometimes|array',
                'upline_commissions.*.user_id' => 'required',
                'upline_commissions.*.amount' => 'required|numeric|min:0',
                'upline_commissions.*.level' => 'required|numeric|min:1',
                'upline_commissions.*.is_admin' => 'sometimes|boolean',
                'property_id' => 'nullable|exists:properties,id'
            ], [
                'realtor_id.required' => 'Realtor ID is required',
                'realtor_id.exists' => 'Selected realtor does not exist',
                'realtor_amount.required' => 'Commission amount for realtor is required',
                'realtor_amount.numeric' => 'Commission amount must be a number',
                'realtor_amount.min' => 'Commission amount must be at least 0',
                'upline_commissions.*.user_id.required' => 'Upline user ID is required',
                'upline_commissions.*.amount.required' => 'Upline commission amount is required',
                'upline_commissions.*.amount.numeric' => 'Upline commission amount must be a number',
                'upline_commissions.*.amount.min' => 'Upline commission amount must be at least 0',
                'upline_commissions.*.level.required' => 'Upline level is required',
                'upline_commissions.*.level.numeric' => 'Upline level must be a number',
                'upline_commissions.*.level.min' => 'Upline level must be at least 1',
                'property_id.exists' => 'Selected property does not exist'
            ]);

            $realtor = User::findOrFail($validated['realtor_id']);
            
            // Prepare upline commissions
            $uplineCommissions = [];
            foreach ($validated['upline_commissions'] ?? [] as $upline) {
                // Only include uplines with positive amounts
                if ($upline['amount'] > 0) {
                    $uplineCommissions[] = [
                        'user_id' => $upline['user_id'],
                        'amount' => $upline['amount'],
                        'level' => $upline['level'],
                        'is_admin' => $upline['is_admin'] ?? false
                    ];
                }
            }

            // Validate that at least one commission is being paid
            if ($validated['realtor_amount'] <= 0 && empty($uplineCommissions)) {
                return back()->withInput()
                    ->with('error', 'At least one commission amount must be greater than 0');
            }

            // Process all payments
            $results = $commissionService->processBulkPayments(
                $realtor,
                $validated['realtor_amount'],
                $uplineCommissions,
                $validated['property_id'] ?? null,
                true
            );

            // Calculate total paid
            $totalPaid = $validated['realtor_amount'];
            foreach ($uplineCommissions as $upline) {
                $totalPaid += $upline['amount'];
            }

            return redirect()->route('admin.commissions.index')
                ->with('success', 'Commissions paid successfully! Total paid: ₦' . number_format($totalPaid, 2));
                
        } catch (ValidationException $e) {
            // This will automatically redirect back with errors and input
            throw $e;
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->withInput()
                ->with('error', 'Realtor or property not found: ' . $e->getMessage());
                
        } catch (\Exception $e) {
            \Log::error('Commission payment failed: ' . $e->getMessage(), [
                'realtor_id' => $request->realtor_id ?? null,
                'error_trace' => $e->getTraceAsString()
            ]);
            
            return back()->withInput()
                ->with('error', 'Payment processing failed: ' . $e->getMessage());
        }
    }

    protected function calculateLevel($realtorId, $uplineId)
    {
        // Implement your level calculation logic here
        // This is a simplified example - adjust based on your business rules
        $realtor = User::find($realtorId);
        $upline = User::find($uplineId);
        
        // Check if direct upline (level 1)
        if ($realtor->referrer_id == $upline->id) {
            return 1;
        }
        
        // Check if grand-upline (level 2)
        $grandUpline = $realtor->referrer->referrer ?? null;
        if ($grandUpline && $grandUpline->id == $upline->id) {
            return 2;
        }
        
        // Default to level 3 (great-grand-upline)
        return 3;
    }
    
}
