<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Commission;
use App\Models\Developer;
use App\Models\Property;
use App\Models\Project;
use App\Models\Admin;
use App\Models\User;
use App\Models\ReferralCode;
use App\Services\ReferralService;

class AdminController extends Controller
{
    protected $referralService;
 
    public function __construct(ReferralService $referralService)
    {
        $this->referralService = $referralService;
    }

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

    public function createAdmin(){
        $adminUser = Auth::guard('admin')->user();
        // dd($adminUser);
        $referralCode = $adminUser->referralCode->code;
        return view('admin.pages.admin.create', compact('referralCode'));
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
            'referral_code' => 'nullable|string|max:255',
        ], [
            'name.required' => 'Please enter the full name.',
            'email.required' => 'Please enter an email address.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'Password should be at least 6 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        DB::transaction(function () use ($validated) {
            // Create admin
            $admin = Admin::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'username' => strtolower(str_replace(' ', '', $validated['name'])), 
                'referral_code' => $validated['referral_code'],
                'status' => 1,
            ]);

            // If a referral code was provided, create it for the new admin
            if (!empty($validated['referral_code'])) {
                $user = Admin::find($admin->id);
                $referral = $this->referralService->generateReferralCode($user, [
                    'referral_code' => $validated['referral_code'] ?? null,
                ]); 
            }
        });

        return redirect()->back()->with('success', 'Admin created successfully!');
    }
}