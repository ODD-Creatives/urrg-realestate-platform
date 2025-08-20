<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Realtor;
use App\Models\ReferralCode;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Services\ReferralService;

class ReferralController extends Controller
{
    protected $referralService;
 
    public function __construct(ReferralService $referralService)
    {
        $this->referralService = $referralService;
    }

    public function index()
    {  
        $users = User::with('referrer')
            ->withCount('referrals')
            ->latest()
            ->paginate(10);

        // The 'upline_referral' can be a User's code or an Admin's code.
        // We need to manually eager-load this polymorphic-like relationship to avoid N+1 queries in the view.
        $uplineCodes = $users->pluck('upline_referral')->filter()->unique();

        if ($uplineCodes->isNotEmpty()) {
            // Find upline users (realtors)
            $uplineUsers = User::whereIn('referral_code', $uplineCodes)->get()->keyBy('referral_code');
            
            // Find upline admins via their referral codes
            $uplineAdminCodes = \App\Models\ReferralCode::with('admin')->whereIn('code', $uplineCodes)->get()->keyBy('code');

            // Attach the resolved upline model (User or Admin's ReferralCode) to each user in the collection.
            $users->each(function ($user) use ($uplineUsers, $uplineAdminCodes) {
                if ($user->upline_referral) {
                    $upline = $uplineUsers->get($user->upline_referral) ?? $uplineAdminCodes->get($user->upline_referral);
                    $user->setRelation('upline', $upline);
                }
            });
        }

        $realtors = Realtor::latest()->paginate(10);
        return view('admin.pages.referral.index', compact('realtors','users'));
    }

    public function generateReferralIndex(){
        $referrals = ReferralCode::
            latest()
            ->paginate(10);

        return view('admin.pages.referral.indexCode', compact('referrals'));
    }

    public function generateReferralCode()
    { 
        $admins = Admin::select('id', 'username')->pluck('username', 'id');
        return view('admin.pages.referral.code', compact('admins'));
    }

    public function generateReferralStore(Request $request){
        
        $validated = $request->validate([ 
            'user_id' => 'required|exists:admins,id',
            'expires_at' => 'nullable|date|after:now',
        ]); 

        $user = Admin::find($validated['user_id']);
        $referral = $this->referralService->generateReferralCode($user, [
            'expires_at' => $validated['expires_at'] ?? null,
            'referral_code' => $request->referral_code ?? null,
        ]);

        return redirect()
            ->route('admin.referrals.code.index') 
            ->with('success', "Referral code {$referral->code} created successfully");
    } 

    public function generateReferralShow(ReferralCode $referral)
    {
        $referrals = $referral->referrals()->with('referredUser')->paginate(10);
        return view('admin.referrals.show', compact('referral', 'referrals'));
    }

    public function generateReferralDestroy($id)
    { 
        $referral = ReferralCode::findOrFail(decrypt($id));

        $referral->delete();

        return redirect()
            ->back()
            ->with('success', 'Referral code deleted successfully');
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

    public function show(Realtor $realtor)
    {
        return view('admin.pages.realtors.show', compact('realtor'));
    }

    public function edit(Realtor $realtor)
    {
        return view('admin.realtors.edit', compact('realtor'));
    }

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

    public function destroy(Realtor $realtor)
    {
        $realtor->delete();
        return redirect()->route('admin.realtors.index')->with('success', 'Realtor deleted successfully.');
    }
 
    public function referralChain( $realtor)
    {
        $user = User::where('id', decrypt($realtor) )->firstOrFail();
        $referralTree = $user->downlineTree(); 
     
        return view('admin.pages.referral.referral_chain', [
            'user' => $user, 
            'referralTree' => $referralTree,
        ]); 
    } 
}
