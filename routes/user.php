<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;
  
 

Route::middleware(['auth'])->group(function () {
    Route::get('user/profile', [ProfileController::class, 'index'])->name('user.profile');

    Route::get('user/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/personal', [ProfileController::class, 'updatePersonal'])->name('profile.update.personal');
   
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/user/referral', [UserDashboardController::class, 'referral'])->name('user.referral');
    Route::get('/user/commission', [UserDashboardController::class, 'commission'])->name('user.commission');
    Route::get('/user/properties', [UserDashboardController::class, 'properties'])->name('user.properties');

   

    
    
    Route::get('/user/bank', function () {
        return view('user.bank');
    })->name('user.bank');
    
    Route::get('/user/changepassword', function () {
        return view('user.changepassword');
    })->name('user.changepassword');
     
   
    Route::get('/user/propertyDetails', function () {
        return view('user.propertyDetails');
    })->name('user.propertyDetails');

});

