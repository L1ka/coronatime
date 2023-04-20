<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\StatController;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'signUp'])->name('register.sign-up');
Route::get('/user/{token}', [AuthController::class, 'verifyEmail'])->name('user.verify-email');

Route::view('/verify/email', 'email-sent-message')->name('email-sent');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'signIn'])->name('login.sign-in');

Route::post('/logout/user', [LogoutController::class, 'perform'])->name('logout.perform');

Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set-locale');




