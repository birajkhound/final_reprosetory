<?php

use Illuminate\Support\Facades\Route;

// guest
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () { return view('index');})->name('home');
    
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']); 
    
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});
// guest

//search
use App\Http\Controllers\guest\wordSearch;
use App\Http\Controllers\guest\emailcontroller;
Route::post('users_searcing_word', [wordSearch::class, 'search'])->name('Search'); 
Route::get('about_assamese_dictionary', function () { return view('guest.aboutus');})->name('about_us');
Route::get('contact_assamese_dictionary', function () { return view('guest.contactus');})->name('contact_us');
Route::post('users_sending_mail', [emailcontroller::class, 'usersMail']); 
Route::post('users_searcing_word_prediction', [wordSearch::class, 'predict']);
//search

//-----------auth
require __DIR__ . '/auth.php';
//-----------auth
