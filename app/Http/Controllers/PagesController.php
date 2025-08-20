<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\ReferralCode;
use App\Models\User;
use App\Models\Developer;
use App\Models\TeamLead;
use App\Models\Property;
use App\Models\Project;
use App\Models\Event;
use App\Models\AccademyEvent;
use App\Mail\DeveloperVerificationEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\DeveloperApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PagesController extends Controller
{

    /**
     * Display the specified page.
     */
    
    public function index(Request $request, $slug)
    {
        $pages = [
            'home' => 'home',
            'about-us' => 'frontend.about',
            'realtors' => 'frontend.realtors',
            'developers' => 'frontend.developers',
            'building-projects' => 'frontend.properties.property-list',
            'properties' => 'frontend.properties.property-list',
            'property-details' => 'frontend.property-details',
            'land-projects' => 'frontend.project.project-list',
            'project-details' => 'frontend.project-details',
            'urrg-academy' => 'frontend.academyEvent.academy-event',
            'event' => 'frontend.event.event-list',
            'contact' => 'frontend.contact',
            'team-leads' => 'frontend.team-leads',
        ];

        if (array_key_exists($slug, $pages)) {
            
            // Team Leads page
            if ($slug === 'team-leads') {
                $teamLeads = \App\Models\TeamLead::get();
                return view($pages[$slug], compact('teamLeads'));
            }

            if ($slug === 'land-projects') {
                $projects = Project::latest()->paginate(9);
                return view($pages[$slug], compact('projects'));
            }

            if ($slug === 'event') {
                $events = Event::with('images') ->latest() ->paginate(9);
                return view($pages[$slug], compact('events'));
            }

            if ($slug === 'urrg-academy') {
                $accademyEvents = AccademyEvent::latest() ->paginate(9);
                return view($pages[$slug], compact('accademyEvents'));
            }
            
            // Property listing page (both 'property' and 'properties')
            if (in_array($slug, ['building-projects', 'properties'])) {
                $query = Property::where('status', 'approved');

                // Sorting logic
                switch ($request->orderby) {
                    case 'date':
                        $query->latest();
                        break;
                    case 'price':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'price-desc':
                        $query->orderBy('price', 'desc');
                        break;
                    case 'popularity':
                        $query->where('category', 'house');
                        break;
                    case 'rating':
                        $query->where('category', 'land');
                        break;
                    default:
                        $query->latest();
                }

                $properties = $query->paginate(9)->appends(['orderby' => $request->orderby]);

                return view($pages[$slug], compact('properties'));
            }

            // Default pages without extra data
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

    public function propertyDetails($id){

        // Fetch property and related developer
        $property = Property::where('status', 'approved')
            ->with('developer')
            ->findOrFail($id);

        return view('frontend.properties.show', compact('property'));
    }

    public function projectDetails($id)
    {
        //dd('Project Details');
        $project = Project::findOrFail($id);
        return view('frontend.project.show', compact('project'));
    }
    public function eventDetails($id)
    {
        $event = Event::with('images')->findOrFail($id);
        return view('frontend.event.show', compact('event'));
    }
 
    public function academyEventDetails($id)
    {
        $event = AccademyEvent::findOrFail($id);
        return view('frontend.academyEvent.show', compact('event'));
    }


    public function developerStore(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'letter_of_intent' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'company_profile' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'property_details' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create directory if it doesn't exist
        $publicPath = public_path('assets/uploads/developer_documents/');
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0777, true);
        }

        // Process file uploads
        $filePaths = [];
        $fileFields = ['letter_of_intent', 'company_profile', 'property_details'];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::slug($originalName) . '_' . time() . '.' . $extension;
                
                // Move file to public/assets directory
                $file->move($publicPath, $fileName);
                $filePaths[$field] = 'assets/uploads/developer_documents/' . $fileName;
            }
        }

        // Generate developer_id in format: URRDEVddmmyyNN
        $datePart = now()->format('dmy'); // e.g., 040825
        $prefix = 'URRDEV' . $datePart;

        // Get the last developer created today to determine next serial
        $lastDeveloperToday = Developer::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $serial = 1;
        if ($lastDeveloperToday && preg_match('/\d{8}(\d{2})$/', $lastDeveloperToday->developer_id, $matches)) {
            $serial = (int)$matches[1] + 1;
        }

        $developer_id = $prefix . str_pad($serial, 2, '0', STR_PAD_LEFT);

        // Store data in database (adjust according to your model)
        $developer = new Developer();// Replace with your actual model
        $developer->company_name = $request->company_name;
        $developer->contact_person = $request->contact_person;
        $developer->phone = $request->phone;
        $developer->email = $request->email;
        $developer->subject = $request->subject;
        $developer->letter_of_intent_path = $filePaths['letter_of_intent'] ?? null;
        $developer->company_profile_path = $filePaths['company_profile'] ?? null;
        $developer->property_details_path = $filePaths['property_details'] ?? null;
        $developer->logo = $request->hasFile('logo') ? $request->file('logo')->store('uploads/developer_logo', 'public') : 'assets/uploads/developer_logo/default-logo.png';
        //$developer->logo = $request->hasFile('logo') ? $request->file('logo')->store('logos', 'public') : null;
        $developer->company_description = $request->input('company'); // Optional company description
        $developer->developer_id = $developer_id;
        $developer->save();


        // Send email verification notification
        event(new Registered($developer));

        // Return success response
        return redirect()->back()->with('success', 'Your application has been submitted successfully! Please check your email to verify your account.');
    }
     
    public function verifyEmail($id)
    {
        $developer = Developer::findOrFail($id);
        
        if ($developer->email_verified_at) {
            return redirect()->route('home')->with('info', 'Email already verified');
        }

        $developer->email_verified_at = now();
        $developer->save();

        return redirect()->route('home')->with('success', 'Email verified successfully!');
    }

    
}