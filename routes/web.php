<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
 

Auth::routes();


Route::get('/', [FrontendController::class, 'index'])->name('home');



Route::get('/{page}', [PagesController::class, 'index'])->name('home.pages');

Route::get('/property/show', [PagesController::class, 'propertyDetails'])->name('property.details');
 
Route::get('/event/show', [PagesController::class, 'eventDetails'])->name('event.details');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');


    Route::get('/user/profile', function () {
        return view('user.profile');
    })->name('user.profile');
    Route::get('/user/bank', function () {
        return view('user.bank');
    })->name('user.bank');
    Route::get('/user/changepassword', function () {
        return view('user.changepassword');
    })->name('user.changepassword');
    Route::get('/user/commission', function () {
        return view('user.commission');
    })->name('user.commission');   
    Route::get('/user/referral', function () {
        return view('user.referral');
    })->name('user.referral');
    Route::get('/user/properties', function () {
        return view('user.properties');
    })->name('user.properties');
    Route::get('/user/propertyDetails', function () {
        return view('user.propertyDetails');
    })->name('user.propertyDetails');

});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
