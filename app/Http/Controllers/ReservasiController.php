<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Penghuni;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
     * Menampilkan form tambah reservasi admin.
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
     * Menyimpan data reservasi dari admin.
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

        $lamaTinggal = null;

        if ($request->tanggal_keluar) {
            $tanggalMasuk = Carbon::parse($request->tanggal_masuk);
            $tanggalKeluar = Carbon::parse($request->tanggal_keluar);

            $lamaTinggal = $tanggalMasuk->diffInDays($tanggalKeluar);
        }

        Reservasi::create([
            'penghuni_id' => $request->penghuni_id,
            'kamar_id' => $request->kamar_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'lama_tinggal' => $lamaTinggal,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with('success', 'Data reservasi berhasil ditambahkan.');
    }

    /**
     * Menyimpan reservasi dari penghuni.
     */
    public function storePenghuni(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after:tanggal_masuk',
        ]);

        $penghuni = Penghuni::where(
            'email',
            Auth::user()->email
        )->first();

        if (!$penghuni) {
            return back()->with(
                'error',
                'Data penghuni tidak ditemukan.'
            );
        }

        $tanggalMasuk = Carbon::parse(
            $request->tanggal_masuk
        );

        $tanggalKeluar = Carbon::parse(
            $request->tanggal_keluar
        );

        $lamaTinggal = $tanggalMasuk->diffInDays(
            $tanggalKeluar
        );

        Reservasi::create([
            'penghuni_id' => $penghuni->id,
            'kamar_id' => $request->kamar_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'lama_tinggal' => $lamaTinggal,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('penghuni.dashboard')
            ->with(
                'success',
                'Reservasi berhasil dibuat.'
            );
    }

    /**
     * Menampilkan detail reservasi.
     */
    public function show(Reservasi $reservasi)
    {
        $reservasi->load([
            'penghuni',
            'kamar'
        ]);

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
            compact(
                'reservasi',
                'penghunis',
                'kamars'
            )
        );
    }

    /**
     * Mengupdate data reservasi.
     */
    public function update(
        Request $request,
        Reservasi $reservasi
    ) {
        $request->validate([
            'penghuni_id' => 'required|exists:penghunis,id',
            'kamar_id' => 'required|exists:kamars,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after:tanggal_masuk',
            'status' => 'required|in:pending,aktif,selesai,dibatalkan',
        ]);

        $lamaTinggal = null;

        if ($request->tanggal_keluar) {
            $tanggalMasuk = Carbon::parse(
                $request->tanggal_masuk
            );

            $tanggalKeluar = Carbon::parse(
                $request->tanggal_keluar
            );

            $lamaTinggal = $tanggalMasuk->diffInDays(
                $tanggalKeluar
            );
        }

        $reservasi->update([
            'penghuni_id' => $request->penghuni_id,
            'kamar_id' => $request->kamar_id,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'lama_tinggal' => $lamaTinggal,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Data reservasi berhasil diperbarui.'
            );
    }

    /**
     * Menghapus data reservasi.
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();

        return redirect()
            ->route('admin.reservasi.index')
            ->with(
                'success',
                'Data reservasi berhasil dihapus.'
            );
    }
}