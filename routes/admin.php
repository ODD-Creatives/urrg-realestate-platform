<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DevelopersController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\ProperiesController;
use App\Http\Controllers\Admin\RealtorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\EventController;
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
 
    Route::prefix('properties')->name('property.')->controller(ProperiesController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });
    
    Route::prefix('realtors')->name('realtors.')->controller(RealtorController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('show/{id}', 'show')->name('show');
        Route::get('referral/show/{id}', 'referral')->name('referral');
    });

    Route::prefix('realtor')->name('realtors.')->controller(RealtorController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}','show')->name('view');
        Route::get('/{user}/referral','referral')->name('referral');
        Route::get('/{user}/commission','commission')->name('commission');
        Route::patch('/{user}/activate', 'activate')->name('activate'); 
        Route::patch('/{user}/deactivate', 'deactivate')->name('deactivate');

    });

    Route::prefix('developer')->name('developers.')->controller(DevelopersController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/view','developer_view')->name('show');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::put('/{developer}/status','updateStatus')->name('update-status');

        Route::get('/developer-listings','developer_listing')->name('listings');
        Route::get('/developer-listings-add','developer_listing_add')->name('listings_add');
        Route::get('/developer-listings-view','developer_listing_view')->name('listings_view');
        Route::get('/developer-projects','developer_project')->name('projects');
        Route::get('/developer-projects-add','developer_project_add')->name('projects_add');
        Route::get('/developer-projects-view','developer_project_view')->name('projects_view');
    });

    Route::prefix('commissions')->name('commissions.')->controller(CommissionController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/commission-pay','commissionPay')->name('pay');
        Route::post('/process-payment','processPayment')->name('process-payment');
    });

    Route::prefix('events')->name('events.')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show','show')->name('show');

    }); 

    Route::prefix('events')->name('events.')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('index');                     
        Route::get('/create', 'create')->name('create');            
        Route::post('/store', 'store')->name('store');              
        Route::get('/show/{id}', 'show')->name('show');             
        Route::get('/edit/{id}', 'edit')->name('edit');             
        Route::put('/update/{id}', 'update')->name('update');      
        Route::delete('/delete/{id}', 'destroy')->name('destroy');

    });


    Route::prefix('referral')->name('referrals.')->controller(ReferralController::class)->group(function () {
        Route::get('/', 'index')->name('index'); 
        Route::get('/generate-referral-code', 'generateReferralCode')->name('code.generator');
        Route::post('/generate-referral-store', 'generateReferralStore')->name('code.store');
        Route::get('/generate-referral-index', 'generateReferralIndex')->name('code.index');
        Route::delete('/destroy/{id}', 'generateReferralDestroy')->name('code.delete');
        Route::get('/referral-chain/{id}', 'referralChain')->name('referral.chain'); 
       
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
}); 