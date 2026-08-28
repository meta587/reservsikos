<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with(
            'reservasi'
        )->get();

        return view(
            'pages.pembayaran.index',
            compact('pembayarans')
        );
    }

    public function create()
    {
        $reservasis = Reservasi::all();

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
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }
    public function show(string $id)
    {
        $pembayaran = Pembayaran::with(
            'reservasi'
        )->findOrFail($id);

        return view(
            'pages.pembayaran.show',
            compact('pembayaran')
        );
    }

    public function edit(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $reservasis = Reservasi::all();

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

        $pembayaran->update(
            $request->all()
        );

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
}