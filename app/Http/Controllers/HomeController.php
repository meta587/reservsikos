<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $totalKamar = DB::table('kamars')->count();

        $totalPenghuni = DB::table('penghunis')->count();

        $reservasiAktif = DB::table('reservasis')
            ->whereDate('tanggal_masuk', '<=', Carbon::today())
            ->whereDate('tanggal_keluar', '>=', Carbon::today())
            ->count();

        $pembayaranBulanIni = DB::table('pembayarans')
            ->whereMonth('tanggal_pembayaran', Carbon::now()->month)
            ->whereYear('tanggal_pembayaran', Carbon::now()->year)
            ->count();

        $reservasiTerbaru = DB::table('reservasis')
            ->join('penghunis', 'reservasis.penghuni_id', '=', 'penghunis.id')
            ->join('kamars', 'reservasis.kamar_id', '=', 'kamars.id')
            ->select(
                'reservasis.id',
                'penghunis.nama as nama_penghuni',
                'kamars.nomor_kamar',
                'reservasis.tanggal_masuk',
                'reservasis.tanggal_keluar'
            )
            ->orderBy('reservasis.id', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalKamar',
            'totalPenghuni',
            'reservasiAktif',
            'pembayaranBulanIni',
            'reservasiTerbaru'
        ));
    }
}