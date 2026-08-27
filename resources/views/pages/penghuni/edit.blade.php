@extends('layouts.auth')

@section('title', 'Edit Penghuni | Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <h3 class="fw-bold mb-4">
                Edit Penghuni
            </h3>

            <form action="{{ route('admin.penghuni.update', $penghuni->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- NAMA --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" class="form-control form-control-lg" 
                               value="{{ old('nama', $penghuni->nama) }}" placeholder="Masukkan nama penghuni">
                        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- NIK --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">NIK</label>
                        <input type="text" name="nik" class="form-control form-control-lg" 
                               value="{{ old('nik', $penghuni->nik) }}" placeholder="Masukkan NIK">
                        @error('nik') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- NO TELP --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No. Telp</label>
                        <input type="text" name="nomor_telepon" class="form-control form-control-lg" 
                               value="{{ old('nomor_telepon', $penghuni->nomor_telepon) }}" placeholder="Masukkan nomor telepon">
                        @error('nomor_telepon') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" 
                               value="{{ old('email', $penghuni->email) }}" placeholder="Masukkan email">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- ALAMAT --}}
                    <div class="col-md-12">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" class="form-control form-control-lg" rows="3" 
                                  placeholder="Masukkan alamat lengkap">{{ old('alamat', $penghuni->alamat) }}</textarea>
                        @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                </div>

                {{-- TOMBOL --}}
                <div class="d-flex justify-content-center gap-3 mt-5">
                    <button type="submit" class="btn btn-primary px-5 py-2">Simpan</button>
                    <a href="{{ route('admin.penghuni.index') }}" class="btn btn-outline-secondary px-5 py-2">Batal</a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection