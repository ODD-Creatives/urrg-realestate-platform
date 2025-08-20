<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function menuIndex()
    {
        return view('admin.pages.menu.index'); 
    }

    public function menuCreate()
    {
        return view('admin.pages.menu.create'); 
    }

    public function profile(){
        return view('admin.pages.settings');
    }
}
