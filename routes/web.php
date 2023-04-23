<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ResetPasswordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['controller' => AuthController::class], function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register',  'signUp')->name('register.sign-up');
    Route::get('/user/{token}',  'verifyEmail')->name('user.verify-email');
    Route::get('/login',  'login')->name('login');
    Route::post('/login',  'signIn')->name('login.sign-in');
});

Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');


Route::middleware([ 'auth', 'verified'])->group(function() {

    Route::post('/logout/user', [LogoutController::class, 'perform'])->name('logout.perform');

    Route::group(['controller' => StatController::class], function () {

        Route::get('/dashboard-country', 'countries')->name('dashboard-country.countries');

        Route::post('/dashboard-country', 'sort')->name('dashboard-country.sort');

        Route::get('/dashboard/worldwide', 'worldwide')->name('home');
    });

});

Route::middleware([ 'guest'])->group(function() {

    Route::view('/forgot-password', 'reset-password-email')->name('password.request');

    Route::group(['controller' => ResetPasswordController::class], function () {

        Route::post('/forgot-password',  'email')->name('password.email');

        Route::get('/reset-password/{token}',  'reset')->name('password.reset');

        Route::post('/reset-password',  'update')->name('password.update');

    });

    Route::view('/password-success', 'success-password')->name('password-success');
    Route::view('/success/email', 'success-verify-email')->name('success');
    Route::view('/verify/email', 'email-sent-message')->name('email-sent');
});



