<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('login');
    }

    // Proses login
    public function proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Data login
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Coba login
        if (Auth::attempt($credentials)) {
            // Login berhasil
            $request->session()->regenerate();
            
            // Cek role
            $user = Auth::user();
            
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('penghuni.dashboard');
            }
        }

        // Login gagal
        return back()->with('error', 'Login Gagal! Email atau Password salah.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Berhasil logout!');
    }

        // Dashboard Admin
    public function adminDashboard()
    {
        return view('admin.admin-dashboard');
    }

    // Dashboard Penghuni
    public function penghuniDashboard()
    {
        return view('penghuni-dashboard');
    }
}