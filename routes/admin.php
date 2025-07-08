<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\RealtorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

 
// Admin login
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
 
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');

    Route::prefix('menu')->name('menu.')->controller(MenuController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    }); 

    // Route::prefix('properties')->name('menu.')->controller(ProperiesController::class)->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/store', 'store')->name('store');
    //     Route::get('/edit/{id}', 'edit')->name('edit');
    //     Route::put('/update/{id}', 'update')->name('update');
    //     Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    // });
    
    // Route::prefix('realtors')->name('menu.')->controller(RealtorController::class)->group(function () {
    //     Route::get('/', 'index')->name('index');
    // });

    Route::prefix('referral')->name('referrals.')->controller(ReferralController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/generate-referral-code', 'generateReferralCode')->name('code.generator');
        Route::post('/generate-referral-store', 'generateReferralStore')->name('code.store');
        Route::get('/generate-referral-index', 'generateReferralIndex')->name('code.index');
        Route::delete('/destroy/{id}', 'generateReferralDestroy')->name('code.delete');
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
}); 