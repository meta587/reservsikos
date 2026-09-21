<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Reservasi;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    // =====================================================
    // PEMBAYARAN ADMIN
    // =====================================================

    public function index()
    {
        $pembayarans = Pembayaran::with([
            'reservasi.penghuni'
        ])->get();

        return view(
            'pages.pembayaran.index',
            compact('pembayarans')
        );
    }


    public function create()
    {
        $reservasis = Reservasi::with([
            'penghuni'
        ])->get();

        return view(
            'pages.pembayaran.create',
            compact('reservasis')
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'reservasi_id' => 'required|exists:reservasis,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
        ]);

        Pembayaran::create([
            'reservasi_id' => $request->reservasi_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()
            ->route('admin.pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil ditambahkan.'
            );
    }


    public function show(string $id)
    {
        $pembayaran = Pembayaran::with([
            'reservasi.penghuni',
            'reservasi.kamar'
        ])->findOrFail($id);

        return view(
            'pages.pembayaran.show',
            compact('pembayaran')
        );
    }


    public function edit(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $reservasis = Reservasi::with([
            'penghuni'
        ])->get();

        return view(
            'pages.pembayaran.edit',
            compact(
                'pembayaran',
                'reservasis'
            )
        );
    }


    public function update(
        Request $request,
        string $id
    ) {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'reservasi_id' => 'required|exists:reservasis,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
        ]);

        $pembayaran->update([
            'reservasi_id' => $request->reservasi_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()
            ->route('admin.pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil diperbarui.'
            );
    }


    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect()
            ->route('admin.pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil dihapus.'
            );
    }


    // =====================================================
    // PEMBAYARAN PENGHUNI
    // =====================================================

    public function penghuni()
    {
        $user = Auth::user();

        // Cari data penghuni berdasarkan email akun yang login
        $penghuni = Penghuni::where(
            'email',
            $user->email
        )->first();

        if (!$penghuni) {

            $pembayarans = collect();

        } else {

            $pembayarans = Pembayaran::with([
                'reservasi.penghuni',
                'reservasi.kamar'
            ])
            ->whereHas('reservasi', function ($query) use ($penghuni) {

                $query->where(
                    'penghuni_id',
                    $penghuni->id
                );

            })
            ->latest('tanggal_pembayaran')
            ->get();
        }

      return view(
    'pages.penghuni.pembayaran-penghuni.index',
    compact('pembayarans')
        );
    }


    // =====================================================
    // BUKTI PEMBAYARAN PENGHUNI
    // =====================================================

    public function bukti(string $id)
    {
        $user = Auth::user();

        // Cari penghuni yang sedang login
        $penghuni = Penghuni::where(
            'email',
            $user->email
        )->first();

        if (!$penghuni) {
            abort(404);
        }

        // Ambil pembayaran yang benar-benar
        // milik penghuni yang sedang login
        $pembayaran = Pembayaran::with([
            'reservasi.penghuni',
            'reservasi.kamar'
        ])
        ->whereHas('reservasi', function ($query) use ($penghuni) {

            $query->where(
                'penghuni_id',
                $penghuni->id
            );

        })
        ->findOrFail($id);

        return view(
            'pages.penghuni.pembayaran.show',
            compact('pembayaran')
        );
    }
}