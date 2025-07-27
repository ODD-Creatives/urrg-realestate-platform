<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission; // Assuming you have a Commission model
use App\Models\Realtor;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $commissions = \App\Models\Commission::with(['user', 'referral'])
        ->when($request->search, fn($q) => $q->whereHas('user', fn($q2) => $q2->where('name', 'like', '%'.$request->search.'%')))
        ->when($request->date, fn($q) => $q->whereDate('created_at', $request->date))
        ->get();

        $unreadAlerts = 3; 

        return view('admin.pages.commission.index', compact('commissions', 'unreadAlerts'));
    }

    public function commission_pay()
    {
        return view('admin.pages.commission.commission_pay');
    }
   
}
