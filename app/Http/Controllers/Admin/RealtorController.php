<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RealtorController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $users = User::when($request->search, function($query) use ($request) {
                $query->where(function($q) use ($request) {
                    $q->where('firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('realtor_id', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
                });
            })
            ->orderBy('firstname', 'asc') // Alphabetical order by first name
            ->orderBy('lastname', 'asc')  // Then by last name
            ->paginate(15);
        
        return view('admin.pages.realtors.index', compact('users'));
    }

    public function activate(User $user)
    {
        $user->activate();
        return back()->with('success', 'User activated successfully');
    }

    public function deactivate(User $user)
    {
        $user->deactivate();
        return back()->with('success', 'User deactivated successfully');
    }
    
    public function create()
    {
        return view('admin.pages.realtors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'        => 'required|string|max:255',
            'lastname'         => 'required|string|max:255',
            'phone'            => 'required|string|unique:realtors,phone',
            'email'            => 'required|email|unique:realtors,email',
            'address'          => 'required|string|max:500',
            'password'         => 'required|string|min:6|confirmed',
            'account_name'     => 'nullable|string|max:255',
            'account_number'   => 'nullable|string|max:20',
            'bank_name'        => 'nullable|string|max:255',
            'upline_referral'  => 'nullable|string|max:255',
            'commission'       => 'nullable|numeric|min:0',
        ]);

        $realtor = Realtor::create([
            'firstname'        => $request->firstname,
            'lastname'         => $request->lastname,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'address'          => $request->address,
            'password'         => Hash::make($request->password),
            'account_name'     => $request->account_name,
            'account_number'   => $request->account_number,
            'bank_name'        => $request->bank_name,
            'referral_link'    => Str::random(10), // generate random link
            'upline_referral'  => $request->upline_referral,
            'commission'       => $request->commission ?? 0,
        ]);

        return redirect()->route('admin.realtors.index')->with('success', 'Realtor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $realtor)
    {
        $user = User::where('id', decrypt($realtor))->firstOrFail();
        $referralTree = $user->downlineTree();
        
        // Calculate total earnings for each user in the referral tree
        $this->calculateEarningsForTree($referralTree);
        
        return view('admin.pages.realtors.show', [
            'user' => $user,
            'referralTree' => $referralTree,
        ]);
    } 

    protected function calculateEarningsForTree(&$tree)
{
    // Calculate earnings for the current user
    if (isset($tree['child'])) {
        $tree['child']->total_earnings = $tree['child']->commissions()->where('status', 'paid')->sum('amount');
    }
    
    // Calculate earnings for grandchildren
    if (isset($tree['grandchildren']) && is_array($tree['grandchildren'])) {
        foreach ($tree['grandchildren'] as &$grandchild) {
            if (isset($grandchild['grandchild'])) {
                $grandchild['grandchild']->total_earnings = $grandchild['grandchild']->commissions()->where('status', 'paid')->sum('amount');
            }
            
            // Calculate earnings for great-grandchildren
            if (isset($grandchild['great_grandchildren']) && is_array($grandchild['great_grandchildren'])) {
                foreach ($grandchild['great_grandchildren'] as &$greatGrandchild) {
                    $greatGrandchild->total_earnings = $greatGrandchild->commissions()->where('status', 'paid')->sum('amount');
                }
            }
        }
    }
}

    public function referral(Realtor $realtor)
    {
        return view('admin.realtors.referrals', [
            'realtor' => $realtor,
            'referrals' => $realtor->referrals()->latest()->paginate(10)
        ]);
    }

    public function commission(Realtor $realtor)
    {
        return view('admin.realtors.commissions', [
            'realtor' => $realtor,
            'commissions' => $realtor->commissions()
                                    ->with('property') // Eager load property relationship
                                    ->latest()
                                    ->paginate(10)
        ]);
    }

    
    public function edit(Realtor $realtor)
    {
        return view('admin.realtors.edit', compact('realtor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Realtor $realtor)
    {
        $request->validate([
            'firstname'        => 'required|string|max:255',
            'lastname'         => 'required|string|max:255',
            'phone'            => 'required|string|unique:realtors,phone,' . $realtor->id,
            'email'            => 'required|email|unique:realtors,email,' . $realtor->id,
            'address'          => 'required|string|max:500',
            'password'         => 'nullable|string|min:6|confirmed',
            'account_name'     => 'nullable|string|max:255',
            'account_number'   => 'nullable|string|max:20',
            'bank_name'        => 'nullable|string|max:255',
            'upline_referral'  => 'nullable|string|max:255',
            'commission'       => 'nullable|numeric|min:0',
        ]);

        $realtor->update([
            'firstname'        => $request->firstname,
            'lastname'         => $request->lastname,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'address'          => $request->address,
            'account_name'     => $request->account_name,
            'account_number'   => $request->account_number,
            'bank_name'        => $request->bank_name,
            'upline_referral'  => $request->upline_referral,
            'commission'       => $request->commission ?? 0,
            'password'         => $request->password ? Hash::make($request->password) : $realtor->password,
        ]);

        return redirect()->route('admin.realtors.index')->with('success', 'Realtor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Realtor $realtor)
    {
        $realtor->delete();
        return redirect()->route('admin.realtors.index')->with('success', 'Realtor deleted successfully.');
    }
}
