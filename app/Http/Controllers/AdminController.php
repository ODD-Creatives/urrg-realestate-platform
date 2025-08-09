<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Developer;
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

        return view('admin.dashboard', compact('adminUser', 'userCount', 'developerCount'));
    }
}
