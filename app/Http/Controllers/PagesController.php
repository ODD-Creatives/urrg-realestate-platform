<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ReferralCode;
use App\Models\User;
use App\Models\DeveloperApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PagesController extends Controller
{

    /**
     * Display the specified page.
     */
    public function index($slug)
    {
        $pages = [
            'home' => 'home',
            'about-us' => 'frontend.about',
            'realtors' => 'frontend.realtors',
            'developers' => 'frontend.developers',
            'property' => 'frontend.properties.property-list',
            'properties' => 'frontend.properties.property-list',
            'property-details' => 'frontend.property-details',
            'academy-event' => 'frontend.event.academy-event',
            'contact' => 'frontend.contact',
        ];

        if (array_key_exists($slug, $pages)) {
            return view($pages[$slug]);
        }

        abort(404);
    }

    public function referral($code)
    {
        $referralDetails = ReferralCode::where('code', $code)->first();
        if (!$referralDetails) {
             $referralDetails = User::where('referral_code', $code)->first();
            // return redirect()->route('home')->with('error', 'Invalid referral code.');
        } 
        // dd($referralDetails);
        return view('auth.register', ['referralDetails' => $referralDetails]);
    }

    public function propertyDetails(){
        return view('frontend.properties.show');
    }
 
    public function eventDetails(){
        return view('frontend.event.show');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'letter_of_intent' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'company_profile' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'property_details' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $application = DeveloperApplication::create([
            'company_name' => $validated['company_name'],
            'contact_person' => $validated['contact_person'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'letter_of_intent_path' => $request->file('letter_of_intent')->store('developer_applications'),
            'company_profile_path' => $request->file('company_profile')->store('developer_applications'),
            'property_details_path' => $request->file('property_details')->store('developer_applications'),
        ]);

        return response()->json(['success' => true, 'message' => 'Application submitted successfully!']);
    }
    
}