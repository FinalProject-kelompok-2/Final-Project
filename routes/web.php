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
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('dashboard','dashboard')->name('admin.dashboard');
            Route::get('profile','profile')->name('admin.profile');
            Route::post('profile','edit_profile')->name('admin.edit_profile');
            Route::get('kelola-pinjaman','kelola_pinjaman')->name('admin.kelola-pinjaman');
            Route::get('detail-pinjaman/{id}','detail_pinjaman')->name('admin.detail-pinjaman');
            Route::post('konfirmasi-pinjaman/{id}','konfirmasi_pinjaman')->name('admin.konfirmasi-pinjaman');
            Route::post('tolak-pinjaman/{id}','tolak_pinjaman')->name('admin.tolak-pinjaman');
            Route::post('edit-pinjaman/{id}','edit_pinjaman')->name('admin.edit-pinjaman');
            Route::post('pencairan-dana/{id}','pencairan_dana')->name('admin.pencairan-dana');
            Route::get('kelola-pembayaran','kelola_pembayaran')->name('admin.kelola-pembayaran');
            Route::post('konfirmasi-pembayaran/{id}','konfirmasi_pembayaran')->name('admin.konfirmasi-pembayaran');
            Route::post('invalid-pembayaran/{id}','invalid_pembayaran')->name('admin.invalid-pembayaran');
        });
    });
});

Route::prefix('user')->group(function () {
    Route::middleware(['auth', 'isUser'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('home','home')->name('user.home');
            Route::get('profile','profile')->name('user.profile');
            Route::post('profile','edit_profile')->name('user.edit_profile');
            Route::get('pengajuan-pinjaman','pengajuan_pinjaman')->name('user.pengajuan-pinjaman');
            Route::post('pengajuan-pinjaman','pengajuan_pinjaman_store')->name('user.pengajuan-pinjaman_store');
            Route::get('riwayat-pembayaran','riwayat_pembayaran')->name('user.riwayat-pembayaran');
            Route::post('konfirmasi-pinjaman/{id}','konfirmasi_pinjaman')->name('user.konfirmasi-pinjaman');
            Route::post('tolak-pinjaman/{id}','tolak_pinjaman')->name('user.tolak-pinjaman');
            Route::get('konfirmasi-pembayaran/{id}','konfirmasi_pembayaran')->name('user.konfirmasi-pembayaran');
            Route::post('konfirmasi-pembayaran/{id}','konfirmasi_pembayaran_store')->name('user.konfirmasi-pembayaran-store');
        });
    });
});