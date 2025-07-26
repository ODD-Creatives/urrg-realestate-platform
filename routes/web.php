<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;
 

Auth::routes();


Route::get('/', [FrontendController::class, 'index'])->name('home');



Route::get('/{page}', [PagesController::class, 'index'])->name('home.pages');
Route::get('/property/show', [PagesController::class, 'propertyDetails'])->name('property.details');
Route::get('/event/show', [PagesController::class, 'eventDetails'])->name('event.details');
Route::get('/referral/{code}', [PagesController::class, 'referral']); 
Route::get('/referral/register/{code}', [PagesController::class, 'referral']); 




require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
