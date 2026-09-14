<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    // =========================
    // DATA RESERVASI
    // =========================
    public function index()
    {
        $reservasis = Reservasi::with('kamar')
            ->latest()
            ->get();

        return view(
            'pages.reservasi.index',
            compact('reservasis')
        );
    }


    // =========================
    // FORM TAMBAH RESERVASI
    // =========================
    public function create()
    {
        $kamars = Kamar::where(
            'status_kamar',
            'Tersedia'
        )->get();

        return view(
            'pages.reservasi.create',
            compact('kamars')
        );
    }


    // =========================
    // SIMPAN RESERVASI
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nama_penghuni' => 'required|string|max:128',
            'nik' => 'required|string|max:20',
            'nomor_telepon' => 'required|string|max:16',
            'email' => 'required|email|max:128',
            'alamat' => 'required',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
            'status' => 'required|in:Pending,Aktif,Selesai,Dibatalkan',
        ]);

        // CEK KAMAR
        $kamar = Kamar::where('id', $request->kamar_id)
            ->where('status_kamar', 'Tersedia')
            ->first();

        if (!$kamar) {
            return back()
                ->withInput()
                ->withErrors([
                    'kamar_id' => 'Kamar tersebut sudah terisi.'
                ]);
        }

        // SIMPAN RESERVASI
        Reservasi::create([
            'nama_penghuni' => $request->nama_penghuni,
            'nik' => $request->nik,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kamar_id' => $request->kamar_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status' => $request->status,
        ]);

        // KAMAR JADI TERISI
        $kamar->update([
            'status_kamar' => 'Terisi'
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Reservasi berhasil ditambahkan.'
            );
    }


    // =========================
    // DETAIL
    // =========================
    public function show(Reservasi $reservasi)
    {
        $reservasi->load('kamar');

        return view(
            'pages.reservasi.show',
            compact('reservasi')
        );
    }


    // =========================
    // FORM EDIT
    // =========================
    public function edit(Reservasi $reservasi)
    {
        $kamars = Kamar::all();

        return view(
            'pages.reservasi.edit',
            compact(
                'reservasi',
                'kamars'
            )
        );
    }


    // =========================
    // UPDATE
    // =========================
    public function update(
        Request $request,
        Reservasi $reservasi
    ) {
        $request->validate([
            'nama_penghuni' => 'required|string|max:128',
            'nik' => 'required|string|max:20',
            'nomor_telepon' => 'required|string|max:16',
            'email' => 'required|email|max:128',
            'alamat' => 'required',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
            'status' => 'required|in:Pending,Aktif,Selesai,Dibatalkan',
        ]);

        $reservasi->update([
            'nama_penghuni' => $request->nama_penghuni,
            'nik' => $request->nik,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kamar_id' => $request->kamar_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Data reservasi berhasil diperbarui.'
            );
    }


    // =========================
    // FIX RESERVASI → PENGHUNI
    // =========================
    public function fix(Reservasi $reservasi)
    {
        // Cek apakah email sudah menjadi penghuni
        $penghuni = Penghuni::where(
            'email',
            $reservasi->email
        )->first();

        // Kalau belum ada, buat penghuni baru
        if (!$penghuni) {
            Penghuni::create([
                'nama' => $reservasi->nama_penghuni,
                'nik' => $reservasi->nik,
                'nomor_telepon' => $reservasi->nomor_telepon,
                'email' => $reservasi->email,
                'alamat' => $reservasi->alamat,
            ]);
        }

        // Ubah status reservasi menjadi Aktif
        $reservasi->update([
            'status' => 'Aktif'
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Reservasi sudah FIX dan data penghuni berhasil ditambahkan.'
            );
    }


    // =========================
    // HAPUS
    // =========================
    public function destroy(Reservasi $reservasi)
    {
        $kamar = $reservasi->kamar;

        $reservasi->delete();

        if ($kamar) {
            $kamar->update([
                'status_kamar' => 'Tersedia'
            ]);
        }

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Data reservasi berhasil dihapus.'
            );
    }
}