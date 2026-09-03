<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;


// =====================================
// HALAMAN AWAL
// =====================================

Route::get('/', function () {
    return redirect()->route('admin.login');
});


// =====================================
// LOGIN ADMIN
// =====================================

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Halaman Login
        Route::get('/login', function () {
            return view('auth.login');
        })->name('login');

        // Proses Login
        Route::post('/login', [AdminController::class, 'login'])
            ->name('login.process');
    });


// =====================================
// ADMIN SETELAH LOGIN
// =====================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');


        // =================================
        // PROFIL
        // =================================

        Route::get('/profil', [ProfilController::class, 'index'])
            ->name('profil');

        Route::post('/profil', [ProfilController::class, 'save'])
            ->name('profil.save');


        // =================================
        // KAMAR
        // =================================

        Route::resource('kamar', KamarController::class)
            ->names('kamar');


        // =================================
        // PENGHUNI
        // =================================

        Route::resource('penghuni', PenghuniController::class)
            ->names('penghuni');


        // =================================
        // RESERVASI
        // =================================

        Route::resource('reservasi', ReservasiController::class)
            ->names('reservasi');


        // =================================
        // PEMBAYARAN
        // =================================

        Route::resource('pembayaran', PembayaranController::class)
            ->names('pembayaran');


        // =================================
        // LOGOUT
        // =================================

        Route::post('/logout', [AdminController::class, 'logout'])
            ->name('logout');
    });


// =====================================
// REGISTER
// =====================================

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');


// =====================================
// DASHBOARD PENGHUNI
// =====================================

Route::get('/penghuni/dashboard', function () {
    return view('penghuni.dashboard');
})->name('penghuni.dashboard');