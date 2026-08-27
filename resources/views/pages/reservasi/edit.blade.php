```blade
@extends('layouts.auth')

@section('title', 'Edit Reservasi | Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <h3 class="fw-bold mb-4">
                Edit Reservasi
            </h3>

            <form action="{{ route('admin.reservasi.update', $reservasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- PENGHUNI --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Penghuni</label>

                        <select name="penghuni_id" class="form-select form-select-lg">
                            <option value="">Pilih Penghuni</option>

                            @foreach($penghunis as $penghuni)
                                <option value="{{ $penghuni->id }}"
                                    {{ old('penghuni_id', $reservasi->penghuni_id) == $penghuni->id ? 'selected' : '' }}>
                                    {{ $penghuni->nama }}
                                </option>
                            @endforeach

                        </select>

                        @error('penghuni_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- KAMAR --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kamar</label>

                        <select name="kamar_id" class="form-select form-select-lg">
                            <option value="">Pilih Kamar</option>

                            @foreach($kamars as $kamar)
                                <option value="{{ $kamar->id }}"
                                    {{ old('kamar_id', $reservasi->kamar_id) == $kamar->id ? 'selected' : '' }}>
                                    {{ $kamar->nomor_kamar }}
                                </option>
                            @endforeach

                        </select>

                        @error('kamar_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- TANGGAL MASUK --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tanggal Masuk</label>

                        <input
                            type="date"
                            name="tanggal_masuk"
                            class="form-control form-control-lg"
                            value="{{ old('tanggal_masuk', $reservasi->tanggal_masuk) }}">

                        @error('tanggal_masuk')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- TANGGAL KELUAR --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tanggal Keluar</label>

                        <input
                            type="date"
                            name="tanggal_keluar"
                            class="form-control form-control-lg"
                            value="{{ old('tanggal_keluar', $reservasi->tanggal_keluar) }}">

                        @error('tanggal_keluar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>

                        <select name="status" class="form-select form-select-lg">

                            <option value="pending"
                                {{ old('status', $reservasi->status) == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="aktif"
                                {{ old('status', $reservasi->status) == 'aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="selesai"
                                {{ old('status', $reservasi->status) == 'selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="dibatalkan"
                                {{ old('status', $reservasi->status) == 'dibatalkan' ? 'selected' : '' }}>
                                Dibatalkan
                            </option>

                        </select>

                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>


                {{-- TOMBOL --}}
                <div class="d-flex justify-content-center gap-3 mt-5">

                    <button type="submit" class="btn btn-primary px-5 py-2">
                        Simpan
                    </button>

                    <a href="{{ route('admin.reservasi.index') }}"
                       class="btn btn-outline-secondary px-5 py-2">
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
```
