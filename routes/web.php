<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Auth::routes();


Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/{page}', [PagesController::class, 'index'])->name('home.pages');
Route::get('/property/show{id}', [PagesController::class, 'propertyDetails'])->name('property.details');
Route::get('/project/show{id}', [PagesController::class, 'projectDetails'])->name('project.details');
Route::get('/event/show{id}', [PagesController::class, 'eventDetails'])->name('event.details');
Route::get('/academyEvent/show{id}', [PagesController::class, 'academyEventDetails'])->name('academyEvent.details');
Route::get('/referral/{code}', [PagesController::class, 'referral']); 
Route::get('/referral/register/{code}', [PagesController::class, 'referral']); 
Route::post('/developer/applications/store', [PagesController::class, 'developerStore'])->name('developer.store'); 

Route::get('/developer/verify/{id}', [PagesController::class, 'verifyDeveloperEmail'])
    ->name('developer.verify');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
