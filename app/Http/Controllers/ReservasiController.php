<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
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

    public function store(Request $request)
    {
        $request->validate([
            'nama_penghuni' => 'required|string|max:128',
            'nik' => 'required|string|max:20',
            'nomor_telepon' => 'required|string|max:16',
            'email' => 'required|email|max:128',
            'alamat' => 'required|string',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
            'status' => 'required|in:Pending,Aktif,Selesai,Dibatalkan',
        ]);

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

        DB::transaction(function () use ($request, $kamar) {

            $penghuni = Penghuni::create([
                'nama' => $request->nama_penghuni,
                'nik' => $request->nik,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ]);

            Reservasi::create([
                'penghuni_id' => $penghuni->id,
                'kamar_id' => $kamar->id,
                'tanggal_masuk' => $request->tanggal_masuk,
                'tanggal_keluar' => $request->tanggal_keluar,
                'status' => $request->status,
            ]);

            $kamar->update([
                'status_kamar' => 'Terisi'
            ]);
        });

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Reservasi berhasil ditambahkan dan data penghuni berhasil disimpan.'
            );
    }

    public function storePenghuni(Request $request)
    {
        $request->validate([
            'nama_penghuni' => 'required|string|max:128',
            'nik' => 'required|string|max:20',
            'nomor_telepon' => 'required|string|max:16',
            'email' => 'required|email|max:128',
            'alamat' => 'required|string',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
        ]);

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

        DB::transaction(function () use ($request, $kamar) {

            $penghuni = Penghuni::create([
                'nama' => $request->nama_penghuni,
                'nik' => $request->nik,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ]);

            Reservasi::create([
                'penghuni_id' => $penghuni->id,
                'kamar_id' => $kamar->id,
                'tanggal_masuk' => $request->tanggal_masuk,
                'tanggal_keluar' => $request->tanggal_keluar,
                'status' => 'Aktif',
            ]);

            $kamar->update([
                'status_kamar' => 'Terisi'
            ]);
        });

        return redirect()
            ->route('penghuni.dashboard')
            ->with(
                'success',
                'Reservasi berhasil dibuat dan data penghuni berhasil disimpan.'
            );
    }

    public function show(Reservasi $reservasi)
    {
        $reservasi->load(['penghuni', 'kamar']);

        return view(
            'pages.reservasi.show',
            compact('reservasi')
        );
    }

    public function edit(Reservasi $reservasi)
    {
        $reservasi->load('penghuni');

        $kamars = Kamar::all();

        return view(
            'pages.reservasi.edit',
            compact(
                'reservasi',
                'kamars'
            )
        );
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'nama_penghuni' => 'required|string|max:128',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
            'status' => 'required|in:Pending,Aktif,Selesai,Dibatalkan',
        ]);

        $reservasi->load('penghuni');

        if ($reservasi->penghuni) {
            $reservasi->penghuni->nama = $request->nama_penghuni;
            $reservasi->penghuni->save();
        }

        $reservasi->kamar_id = $request->kamar_id;
        $reservasi->tanggal_masuk = $request->tanggal_masuk;
        $reservasi->tanggal_keluar = $request->tanggal_keluar;
        $reservasi->status = $request->status;

        $reservasi->save();

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Reservasi berhasil diperbarui.'
            );
    }

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