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
 
 
 
// HALAMAN AWAL 
Route::get('/', function () { 
    return redirect()->route('admin.login'); 
}); 
 
// LOGIN ADMIN 
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
 
// ADMIN SETELAH LOGIN 
Route::prefix('admin') 
    ->name('admin.') 
    ->middleware('auth') 
    ->group(function () { 
 
    // Dashboard 
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard'); 
 
    // PROFIL 
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil'); 
    Route::post('/profil', [ProfilController::class, 'save'])->name('profil.save'); 
 
    // KAMAR 
    Route::resource('kamar', KamarController::class)->names('kamar'); 
 
    // PENGHUNI 
    Route::resource('penghuni', PenghuniController::class)->names('penghuni'); 
 
    // RESERVASI 
    Route::resource('reservasi', ReservasiController::class)->names('reservasi'); 
 
    // PEMBAYARAN 
    Route::resource('pembayaran', PembayaranController::class)->names('pembayaran'); 
        
    // LOGOUT 
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout'); 
}); 
 
// REGISTER 
Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'register']) 
    ->name('register.process'); 
     
// DASHBOARD PENGHUNI 
Route::get('/penghuni/dashboard', function () { 
    $kamars = \App\Models\Kamar::all(); 
    return view('penghuni.dashboard', compact('kamars')); 
})->name('penghuni.dashboard'); 
 
// RESERVASI PENGHUNI
Route::get('/penghuni/reservasi', function () {

    $penghunis = \App\Models\Penghuni::all();

    // Hanya menampilkan kamar yang tersedia
    $kamars = \App\Models\Kamar::where('status_kamar', 'Tersedia')->get();

    $kamar = null;

    if (request('kamar_id')) {
        $kamar = \App\Models\Kamar::findOrFail(request('kamar_id'));
    }

    return view(
        'pages.reservasi-penghuni.index',
        compact('penghunis', 'kamars', 'kamar')
    );
    })->name('reservasi-penghuni.index');
Route::post('/penghuni/reservasi', [ReservasiController::class, 'storePenghuni'])
    ->name('reservasi-penghuni.store');

// LOGOUT PENGHUNI 
Route::post('/penghuni/logout', [AdminController::class, 'logout']) 
    ->name('penghuni.logout'); 