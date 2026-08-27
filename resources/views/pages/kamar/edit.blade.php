@extends('layouts.auth')

@section('title', 'Edit Kamar  Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <h3 class="fw-bold mb-4">
                Edit Kamar
            </h3>

            <form action="{{ route('admin.kamar.update', $kamar->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- KOLOM KIRI --}}
                    <div class="col-md-6">

                        {{-- NOMOR KAMAR --}}
                        <div class="mb-3">

                            <label for="nomor_kamar"
                                   class="form-label fw-semibold">
                                Nomor Kamar
                            </label>

                            <input
                                type="text"
                                id="nomor_kamar"
                                name="nomor_kamar"
                                class="form-control form-control-lg"
                                value="{{ old('nomor_kamar', $kamar->nomor_kamar) }}"
                                placeholder="Masukkan nomor kamar">

                            @error('nomor_kamar')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- TIPE KAMAR --}}
                        <div class="mb-3">

                            <label for="tipe_kamar"
                                   class="form-label fw-semibold">
                                Tipe Kamar
                            </label>

                            <select
                                id="tipe_kamar"
                                name="tipe_kamar"
                                class="form-select form-select-lg">

                                <option value="">
                                    Pilih tipe kamar
                                </option>

                                <option value="Standard"
                                    {{ old('tipe_kamar', $kamar->tipe_kamar) == 'Standard' ? 'selected' : '' }}>
                                    Standard
                                </option>

                                <option value="Deluxe"
                                    {{ old('tipe_kamar', $kamar->tipe_kamar) == 'Deluxe' ? 'selected' : '' }}>
                                    Deluxe
                                </option>

                                <option value="VIP"
                                    {{ old('tipe_kamar', $kamar->tipe_kamar) == 'VIP' ? 'selected' : '' }}>
                                    VIP
                                </option>

                            </select>

                            @error('tipe_kamar')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- HARGA --}}
                        <div class="mb-3">

                            <label for="harga"
                                   class="form-label fw-semibold">
                                Harga
                            </label>

                            <input
                                type="number"
                                id="harga"
                                name="harga"
                                class="form-control form-control-lg"
                                value="{{ old('harga', $kamar->harga) }}"
                                min="0"
                                placeholder="0">

                            @error('harga')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>


                    {{-- KOLOM KANAN --}}
                    <div class="col-md-6">

                        {{-- FASILITAS --}}
                        <div class="mb-3">

                            <label for="fasilitas"
                                   class="form-label fw-semibold">
                                Fasilitas
                            </label>

                            <textarea
                                id="fasilitas"
                                name="fasilitas"
                                rows="4"
                                class="form-control"
                                placeholder="Masukkan fasilitas">{{ old('fasilitas', $kamar->fasilitas) }}</textarea>

                            @error('fasilitas')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- STATUS --}}
                        <div class="mb-3">

                            <label for="status_kamar"
                                   class="form-label fw-semibold">
                                Status
                            </label>

                            <select
                                id="status_kamar"
                                name="status_kamar"
                                class="form-select form-select-lg">

                                <option value="">
                                    Pilih status
                                </option>

                                <option value="Tersedia"
                                    {{ old('status_kamar', $kamar->status_kamar) == 'Tersedia' ? 'selected' : '' }}>
                                    Tersedia
                                </option>

                                <option value="Terisi"
                                    {{ old('status_kamar', $kamar->status_kamar) == 'Terisi' ? 'selected' : '' }}>
                                    Terisi
                                </option>

                            </select>

                            @error('status_kamar')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- TOMBOL --}}
                <div class="d-flex justify-content-center gap-3 mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary px-5 py-2">

                        Simpan

                    </button>

                    <a
                        href="{{ route('admin.kamar.index') }}"
                        class="btn btn-outline-secondary px-5 py-2">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection