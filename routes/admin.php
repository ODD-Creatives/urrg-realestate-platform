<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DevelopersController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\ProperiesController;
use App\Http\Controllers\Admin\PropertiesController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RealtorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\AccademyEventController;
use App\Http\Controllers\Admin\TeamLeadController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

 
// Admin login
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
 
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.index');
    Route::get('/create/admin', [AdminController::class, 'createAdmin'])->name('create.admin');
    Route::post('/admin/post', [AdminController::class, 'storeAdmin'])->name('post.admin');
    Route::get('/activitylog', [AdminController::class, 'activityLog'])->name('activityLog.index');
    
    Route::get('/profile', [SettingController::class, 'profile'])->name('profile');
    Route::post('/profile', [SettingController::class, 'updateProfile'])->name('profile.update');


    Route::prefix('menu')->name('menu.')->controller(MenuController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });   
 
     Route::prefix('properties')->name('properties.')->controller(PropertiesController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{property}', 'show')->name('show');
        Route::get('/{property}/edit', 'edit')->name('edit');
        Route::put('/{property}', 'update')->name('update');
        Route::delete('/{property}', 'destroy')->name('destroy');
    });

    Route::prefix('projects')->name('projects.')->controller(ProjectController::class)->group(function () {
        Route::get('/', 'index')->name('index');                    // List all projects
        Route::get('/create', 'create')->name('create');            // Show create form
        Route::post('/store', 'store')->name('store');              // Store new project
        Route::get('/{project}', 'show')->name('show');             // Show single project
        Route::get('/{project}/edit', 'edit')->name('edit');        // Show edit form
        Route::put('/{project}', 'update')->name('update');         // Update project
        Route::delete('/{project}', 'destroy')->name('destroy');    // Delete project
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
        Route::get('/view{id}','show')->name('view');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::put('/{developer}/status','updateStatus')->name('update-status');
        Route::get('/{developer}/properties', 'developerProperties')->name('properties');
        Route::get('/{developer}/projects', 'developerProjects')->name('projects');
         

    });

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/create', [EventController::class, 'create'])->name('create');
        Route::post('/store', [EventController::class, 'store'])->name('store');
        Route::get('/{event}', [EventController::class, 'show'])->name('show');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');

        // Special route for deleting images
        Route::delete('/image/{id}', [EventController::class, 'deleteImage'])->name('deleteImage');
    });


    Route::prefix('commissions')->name('commissions.')->controller(CommissionController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/commission-pay','commissionPay')->name('pay'); 
        Route::post('/process-payment','processPayment')->name('process-payment');
    }); 

    Route::prefix('accademyEvents')->name('accademyEvents.')->controller(AccademyEventController::class)->group(function () {
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

    Route::prefix('teamLeads')->name('teamLeads.')->controller(TeamLeadController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{teamLead}/edit', 'edit')->name('edit');
        Route::put('/{teamLead}', 'update')->name('update');
        Route::delete('/{teamLead}', 'destroy')->name('destroy');
    });


    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
}); 