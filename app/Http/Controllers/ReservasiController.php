<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Menampilkan semua data reservasi.
     */
    public function index()
    {
        $reservasis = Reservasi::with(['penghuni', 'kamar'])
            ->latest()
            ->get();

        return view(
            'pages.reservasi.index',
            compact('reservasis')
        );
    }

    /**
     * Menampilkan form tambah reservasi.
     */
    public function create()
    {
        $penghunis = Penghuni::all();
        $kamars = Kamar::all();

        return view(
            'pages.reservasi.create',
            compact('penghunis', 'kamars')
        );
    }

    /**
     * Menyimpan data reservasi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
            'status' => 'required|in:pending,aktif,selesai,dibatalkan',
        ]);

        Reservasi::create([
            'penghuni_id' => $request->penghuni_id,
            'kamar_id' => $request->kamar_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with('success', 'Data reservasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail reservasi.
     */
    public function show(Reservasi $reservasi)
    {
        $reservasi->load(['penghuni', 'kamar']);

        return view(
            'pages.reservasi.show',
            compact('reservasi')
        );
    }

    /**
     * Menampilkan form edit reservasi.
     */
    public function edit(Reservasi $reservasi)
    {
        $penghunis = Penghuni::all();
        $kamars = Kamar::all();

        return view(
            'pages.reservasi.edit',
            compact('reservasi', 'penghunis', 'kamars')
        );
    }

    /**
     * Mengupdate data reservasi.
     */
    public function update(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
            'status' => 'required|in:pending,aktif,selesai,dibatalkan',
        ]);

        $reservasi->update([
            'penghuni_id' => $request->penghuni_id,
            'kamar_id' => $request->kamar_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with('success', 'Data reservasi berhasil diperbarui.');
    }

    /**
     * Menghapus data reservasi.
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();

        return redirect()
            ->route('admin.reservasi.index')
            ->with('success', 'Data reservasi berhasil dihapus.');
    }
}