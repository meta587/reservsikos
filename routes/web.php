<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;


// =====================================================
// HALAMAN AWAL
// =====================================================

Route::get('/', function () {
    return redirect()->route('admin.login');
});


// =====================================================
// LOGIN
// =====================================================

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


// =====================================================
// ROUTE LOGIN UMUM
// =====================================================

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');


// =====================================================
// ADMIN SETELAH LOGIN
// =====================================================

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth:admin')
    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');


        // PROFIL
        Route::get('/profil', [ProfilController::class, 'index'])
            ->name('profil');

        Route::post('/profil', [ProfilController::class, 'save'])
            ->name('profil.save');


        // KAMAR
        Route::resource('kamar', KamarController::class)
            ->names('kamar');


        // PENGHUNI
        Route::resource('penghuni', PenghuniController::class)
            ->names('penghuni');


        // RESERVASI
        Route::resource('reservasi', ReservasiController::class)
            ->names('reservasi');


        // PEMBAYARAN
        Route::resource('pembayaran', PembayaranController::class)
            ->names('pembayaran');


        // LOGOUT ADMIN
        Route::post('/logout', [AdminController::class, 'logout'])
            ->name('logout');
    });


// =====================================================
// REGISTER
// =====================================================

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');


// =====================================================
// DASHBOARD PENGHUNI
// =====================================================

Route::get('/penghuni/dashboard', function () {

    // Hanya menampilkan kamar yang tersedia
    $kamars = \App\Models\Kamar::where(
        'status_kamar',
        'Tersedia'
    )->get();

    return view(
        'penghuni.dashboard',
        compact('kamars')
    );

})->middleware('auth:penghuni')
  ->name('penghuni.dashboard');


// =====================================================
// RESERVASI PENGHUNI
// =====================================================

// Halaman form reservasi
Route::get('/penghuni/reservasi', function () {

    // Hanya kamar yang tersedia
    $kamars = \App\Models\Kamar::where(
        'status_kamar',
        'Tersedia'
    )->get();

    $kamar = null;

    // Jika ada kamar yang dipilih dari dashboard
    if (request('kamar_id')) {

        $kamar = \App\Models\Kamar::where(
            'id',
            request('kamar_id')
        )
        ->where(
            'status_kamar',
            'Tersedia'
        )
        ->firstOrFail();
    }

    return view(
        'pages.reservasi-penghuni.index',
        compact('kamars', 'kamar')
    );

})->middleware('auth:penghuni')
  ->name('reservasi-penghuni.index');


// Proses simpan reservasi penghuni
Route::post(
    '/penghuni/reservasi',
    [ReservasiController::class, 'storePenghuni']
)
->middleware('auth:penghuni')
->name('reservasi-penghuni.store');


// =====================================================
// LOGOUT PENGHUNI
// =====================================================

Route::post(
    '/penghuni/logout',
    [AdminController::class, 'logoutPenghuni']
)
->middleware('auth:penghuni')
->name('penghuni.logout');