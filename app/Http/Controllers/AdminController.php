<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // =====================================
    // LOGIN
    // =====================================

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // EMAIL BELUM ADA
        // BUAT AKUN PENGHUNI OTOMATIS
        if (!$user) {

            $user = User::create([
                'name' => explode('@', $request->email)[0],
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'penghuni',
            ]);

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('penghuni.dashboard');
        }

        // CEK PASSWORD
        if (!Hash::check($request->password, $user->password)) {

            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->withInput($request->only('email'));
        }

        // LOGIN
        Auth::login($user);

        $request->session()->regenerate();

        // ADMIN
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // PENGHUNI
        if ($user->role === 'penghuni') {
            return redirect()->route('penghuni.dashboard');
        }

        // ROLE TIDAK ADA
        Auth::logout();

        return back()->withErrors([
            'email' => 'Role tidak ditemukan.',
        ]);
    }


    // =====================================
    // LOGOUT
    // =====================================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }


    // =====================================
    // DATA ADMIN
    // =====================================

    public function index()
    {
        $users = User::where('role', 'admin')->get();

        return view('pages.admin.index', compact('users'));
    }


    // =====================================
    // FORM TAMBAH ADMIN
    // =====================================

    public function create()
    {
        return view('pages.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()
            ->route('admin.administrator.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $user = User::where('role', 'admin')
            ->findOrFail($id);

        return view('pages.admin.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::where('role', 'admin')
            ->findOrFail($id);

        return view('pages.admin.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::where('role', 'admin')
            ->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()
            ->route('admin.administrator.index')
            ->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $user = User::where('role', 'admin')
            ->findOrFail($id);

        $user->delete();

        return redirect()
            ->route('admin.administrator.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}