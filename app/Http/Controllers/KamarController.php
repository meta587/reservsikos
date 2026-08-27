<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();

        return view('pages.kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('pages.kamar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|string|max:20|unique:kamars,nomor_kamar',
            'tipe_kamar' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'required|string',
            'status_kamar' => 'required|in:Tersedia,Terisi',
        ]);

        Kamar::create($validated);

        return redirect()
            ->route('admin.kamar.index')
            ->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $kamar = Kamar::findOrFail($id);

        return view('pages.kamar.show', compact('kamar'));
    }

    public function edit(string $id)
    {
        $kamar = Kamar::findOrFail($id);

        return view('pages.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, string $id)
    {
        $kamar = Kamar::findOrFail($id);

        $validated = $request->validate([
            'nomor_kamar' => 'required|string|max:20|unique:kamars,nomor_kamar,' . $kamar->id,
            'tipe_kamar' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'fasilitas' => 'required|string',
            'status_kamar' => 'required|in:Tersedia,Terisi',
        ]);

        $kamar->update($validated);

        return redirect()
            ->route('admin.kamar.index')
            ->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);

        $kamar->delete();

        return redirect()
            ->route('admin.kamar.index')
            ->with('success', 'Data kamar berhasil dihapus.');
    }
}