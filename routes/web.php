<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::get('/signin', function () {
    return view('signin');
})->name('signin');
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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/about', function () {
    return view('page.about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
