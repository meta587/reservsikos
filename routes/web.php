<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Halaman utama redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses');

// Route Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Dashboard (harus login dulu)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [LoginController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/penghuni/dashboard', [LoginController::class, 'penghuniDashboard'])->name('penghuni.dashboard');
});