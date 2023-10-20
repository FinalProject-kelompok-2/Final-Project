<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [UserController::class, 'landing'])->name('landing');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login_action'])->name('login_action');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_action'])->name('register_action');
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('dashboard','dashboard')->name('admin.dashboard');
        });
    });
});

Route::prefix('user')->group(function () {
    Route::middleware(['auth', 'isUser'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('home','home')->name('user.home');
            Route::get('profile','profile')->name('user.profile');
            Route::post('profile','edit_profile')->name('user.edit_profile');
        });
    });
});