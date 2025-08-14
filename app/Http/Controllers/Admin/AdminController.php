<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Developer;
use App\Models\Property;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    { 
        $adminUser = Auth::guard('admin')->user();
        $userCount = User::count();
        $developerCount = Developer::count();
        $commissionCount = Commission::count();
        
        // Calculate total commission amount
        $totalCommission = Commission::sum('amount');
        
        // For formatted currency display (optional)
        $formattedTotal = number_format($totalCommission, 2);

        $projectsCount = Project::where('status', 'approved')->count();
        $propertiesCount = Property::where('status', 'approved')->count();

        $totalApproved = $projectsCount + $propertiesCount;


        return view('admin.dashboard', compact(
            'adminUser', 
            'userCount', 
            'developerCount',
            'commissionCount',
            'totalCommission',
            'formattedTotal',
            'totalApproved'
        ));
    }
}