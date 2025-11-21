<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class,'index'])->name('index');

Route::get('login', [AuthController::class,'login'])->name('login');

Route::get('register', [AuthController::class,'register'])->name('register');

Route::post('register', [AuthController::class, 'createUser'])->name('create.user');

Route::post('auth', [AuthController::class, 'auth'])->name('auth');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('dashboard', [UserController::class,'dashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::put('user-update', [UserController::class, 'userUpdate'])->name('user.update');
    Route::post('profile-create', [UserController::class, 'profileCreate'])->name('profile.create');
    Route::put('profile-update', [UserController::class, 'profileUpdate'])->name('profile.update');

});