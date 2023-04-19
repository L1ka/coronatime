<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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



