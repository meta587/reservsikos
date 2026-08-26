<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penghuni;
use App\Models\Reservasi;
use App\Models\Pembayaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalKamar = Kamar::count();

        $penghuniAktif = Penghuni::count();

        $reservasiAktif = Reservasi::where('status', 'Aktif')->count();

        $pembayaranBulanIni = Pembayaran::whereMonth(
            'tanggal_pembayaran',
            now()->month
        )->whereYear(
            'tanggal_pembayaran',
            now()->year
        )->count();

        $reservasiTerbaru = Reservasi::with(['penghuni', 'kamar'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalKamar',
            'penghuniAktif',
            'reservasiAktif',
            'pembayaranBulanIni',
            'reservasiTerbaru'
        ));
    }
}