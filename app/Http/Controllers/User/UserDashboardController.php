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

        return view('user.dashboard', [
            'user' => $user,
            'commissionBreakdown' => $commissionBreakdown,
            'referralTree' => $user->downlineTree()
        ]);
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