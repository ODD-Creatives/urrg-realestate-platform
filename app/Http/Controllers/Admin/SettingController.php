<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        $adminUser = Auth::guard('admin')->user();
        return view('admin.pages.admin.profile', compact('adminUser'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bank_name' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $photo = $request->file('profile_photo');
            $photoPath = $photo->store('uploads/admins/profile_photos', 'public');

            // Optionally delete old one here
            if ($admin->profile_photo && Storage::disk('public')->exists($admin->profile_photo)) {
                Storage::disk('public')->delete($admin->profile_photo);
            }

            $admin->profile_photo = $photoPath;
        }

        // Update other fields
        $admin->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
