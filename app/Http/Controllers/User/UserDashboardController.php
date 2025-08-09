<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load([
            'wallet',
            'referrals' => fn($q) => $q->with(['wallet', 'paidCommissions']),
            'activeReferrals',
            'inactiveReferrals',
            'earnedCommissions',
            'referrer'
        ]);
        $referralTree = $user->downlineTree();
    
      
        // Flatten the referral tree for table display 
        $allReferrals = $this->flattenReferralTree($referralTree, $user);

        
        return view('user.dashboard', [
            'user' => $user,
            'allReferrals' => $allReferrals,
            'referralTree' => $referralTree,
        ]);
    }

    protected function getReferralTree(User $user)
    {
        $children = $user->referrals()->with(['paidCommissions', 'wallet'])->get();
        
        $tree = [
            'self' => $user,
            'children' => []
        ];

        foreach ($children as $child) {
            $grandchildren = $child->referrals()->with(['paidCommissions', 'wallet'])->get();
            
            $grandchildrenData = [];
            foreach ($grandchildren as $grandchild) {
                $greatGrandchildren = $grandchild->referrals()->with(['paidCommissions', 'wallet'])->get();
                
                $grandchildrenData[] = [
                    'grandchild' => $grandchild,
                    'great_grandchildren' => $greatGrandchildren
                ];
            }

            $tree['children'][] = [
                'child' => $child,
                'grandchildren' => $grandchildrenData
            ];
        }

        return $tree;
    }

    /**
     * Flatten the referral tree for table display
     */
    protected function flattenReferralTree(array $referralTree, User $currentUser)
    {
        $allReferrals = [];

        foreach ($referralTree['children'] as $childData) {
            // Add Level 1 (Children)
            $allReferrals[] = [
                'user' => $childData['child'],
                'level' => 1,
                'referrer' => $currentUser->full_name
            ];

            // Add Level 2 (Grandchildren)
            foreach ($childData['grandchildren'] as $grandchildData) {
                $allReferrals[] = [
                    'user' => $grandchildData['grandchild'],
                    'level' => 2,
                    'referrer' => $childData['child']->full_name
                ];

                // Add Level 3 (Great Grandchildren)
                foreach ($grandchildData['great_grandchildren'] as $greatGrandchild) {
                    $allReferrals[] = [
                        'user' => $greatGrandchild,
                        'level' => 3,
                        'referrer' => $grandchildData['grandchild']->full_name
                    ];
                }
            }
        }

        return $allReferrals;
    }

    /**
     * Count grandchildren (Level 2 referrals)
     */
    protected function countGrandchildren(User $user)
    {
        $count = 0;
        foreach ($user->referrals as $child) {
            $count += $child->referrals()->count();
        }
        return $count;
    }

    public function referral()
    {
        $user = Auth::user()->load([
            'referrals' => fn($q) => $q->with('paidCommissions'),
            'activeReferrals',
            'inactiveReferrals',
            'earnedCommissions',
            'referrer'
        ]);

         $commissionBreakdown = [
            'level1' => [
                'amount' => $user->getCommissionByLevel(1),
                'count' => $user->getReferralsByLevel(1)->count()
            ],
            'level2' => [
                'amount' => $user->getCommissionByLevel(2),
                'count' => $user->getReferralsByLevel(2)->count()
            ],
            'level3' => [
                'amount' => $user->getCommissionByLevel(3),
                'count' => $user->getReferralsByLevel(3)->count()
            ]
        ];

        return view('user.referral', [
            'user' => $user, 
            'commissionBreakdown' => $commissionBreakdown,
            'referralTree' => $user->downlineTree()
        ]);
    }

    public function commission()
    {
        $user = Auth::user()->load([
            'referrals' => fn($q) => $q->with('paidCommissions'),
            'activeReferrals',
            'inactiveReferrals',
            'earnedCommissions',
            'referrer'
        ]);

        $commissionBreakdown = [
            'level1' => [
                'amount' => $user->getCommissionByLevel(1),
                'count' => $user->getReferralsByLevel(1)->count()
            ],
            'level2' => [
                'amount' => $user->getCommissionByLevel(2),
                'count' => $user->getReferralsByLevel(2)->count()
            ],
            'level3' => [
                'amount' => $user->getCommissionByLevel(3),
                'count' => $user->getReferralsByLevel(3)->count()
            ]
        ];

        return view('user.commission', [
            'user' => $user,
            'commissionBreakdown' => $commissionBreakdown,
            'referralTree' => $user->downlineTree()
        ]);
    }
    public function properties()
    {
         $user = Auth::user()->load([
            'referrals' => fn($q) => $q->with('paidCommissions'),
            'activeReferrals',
            'inactiveReferrals',
            'earnedCommissions',
            'referrer'
        ]);

        $commissionBreakdown = [
            'level1' => [
                'amount' => $user->getCommissionByLevel(1),
                'count' => $user->getReferralsByLevel(1)->count()
            ],
            'level2' => [
                'amount' => $user->getCommissionByLevel(2),
                'count' => $user->getReferralsByLevel(2)->count()
            ],
            'level3' => [
                'amount' => $user->getCommissionByLevel(3),
                'count' => $user->getReferralsByLevel(3)->count()
            ]
        ];

        return view('user.properties', [
            'user' => $user,
            'commissionBreakdown' => $commissionBreakdown,
            'referralTree' => $user->downlineTree()
        ]);
    }

    
}