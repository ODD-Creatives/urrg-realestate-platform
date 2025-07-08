<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function propertyDetails(){
        return view('frontend.properties.show');
    }

    public function eventDetails(){
        return view('frontend.event.show');
    }



    
}