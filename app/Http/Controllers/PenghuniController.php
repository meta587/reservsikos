<?php

namespace App\Http\Controllers;

use App\Models\Penghuni;
use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghunis = Penghuni::all();

        return view('pages.penghuni.index', compact('penghunis'));
    }

    public function create()
    {
        return view('pages.penghuni.create');
        }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        Penghuni::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'nomor_telepon' => $request->nomor_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('admin.penghuni.index')
            ->with('success', 'Data penghuni berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        $penghuni = Penghuni::findOrFail($id);

        return view('pages.penghuni.show', compact('penghuni'));
    }

    public function edit(string $id)
    {
        $penghuni = Penghuni::findOrFail($id);

        return view('pages.penghuni.edit', compact('penghuni'));
    }

    public function update(Request $request, string $id)
    {
        $penghuni = Penghuni::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        $penghuni->update($request->all());

        return redirect()
            ->route('admin.penghuni.index')
            ->with('success', 'Data penghuni berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $penghuni = Penghuni::findOrFail($id);

        $penghuni->delete();

        return redirect()
            ->route('admin.penghuni.index')
            ->with('success', 'Data penghuni berhasil dihapus.');
    }
}