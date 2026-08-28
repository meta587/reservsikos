@extends('layouts.auth')

@section('title', 'Edit Pembayaran Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <h3 class="fw-bold mb-4">
                Edit Pembayaran
            </h3>

            <form action="{{ route('admin.pembayaran.update', $pembayaran->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- KOLOM KIRI --}}
                    <div class="col-md-6">

                        {{-- RESERVASI --}}
                        <div class="mb-3">

                            <label for="reservasi_id"
                                   class="form-label fw-semibold">
                                Reservasi
                            </label>

                            <select
                                id="reservasi_id"
                                name="reservasi_id"
                                class="form-select form-select-lg">

                                <option value="">
                                    Pilih reservasi
                                </option>

                                @foreach($reservasis as $reservasi)

                                    <option
                                        value="{{ $reservasi->id }}"
                                        {{ old('reservasi_id', $pembayaran->reservasi_id) == $reservasi->id ? 'selected' : '' }}>

                                        RSV-{{ str_pad($reservasi->id, 3, '0', STR_PAD_LEFT) }}

                                    </option>

                                @endforeach

                            </select>

                            @error('reservasi_id')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- TANGGAL PEMBAYARAN --}}
                        <div class="mb-3">

                            <label for="tanggal_pembayaran"
                                   class="form-label fw-semibold">
                                Tanggal Pembayaran
                            </label>

                            <input
                                type="date"
                                id="tanggal_pembayaran"
                                name="tanggal_pembayaran"
                                class="form-control form-control-lg"
                                value="{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran) }}">

                            @error('tanggal_pembayaran')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- JUMLAH PEMBAYARAN --}}
                        <div class="mb-3">

                            <label for="jumlah_pembayaran"
                                   class="form-label fw-semibold">
                                Jumlah Pembayaran
                            </label>

                            <input
                                type="number"
                                id="jumlah_pembayaran"
                                name="jumlah_pembayaran"
                                class="form-control form-control-lg"
                                value="{{ old('jumlah_pembayaran', $pembayaran->jumlah_pembayaran) }}"
                                min="0"
                                placeholder="Masukkan jumlah pembayaran">

                            @error('jumlah_pembayaran')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>


                    {{-- KOLOM KANAN --}}
                    <div class="col-md-6">

                        {{-- METODE PEMBAYARAN --}}
                        <div class="mb-3">

                            <label for="metode_pembayaran"
                                   class="form-label fw-semibold">
                                Metode Pembayaran
                            </label>

                            <select
                                id="metode_pembayaran"
                                name="metode_pembayaran"
                                class="form-select form-select-lg">

                                <option value="">
                                    Pilih metode pembayaran
                                </option>

                                <option value="Transfer"
                                    {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Transfer' ? 'selected' : '' }}>
                                    Transfer
                                </option>

                                <option value="Cash"
                                    {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Cash' ? 'selected' : '' }}>
                                    Cash
                                </option>

                            </select>

                            @error('metode_pembayaran')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- STATUS PEMBAYARAN --}}
                        <div class="mb-3">

                            <label for="status_pembayaran"
                                   class="form-label fw-semibold">
                                Status Pembayaran
                            </label>

                            <select
                                id="status_pembayaran"
                                name="status_pembayaran"
                                class="form-select form-select-lg">

                                <option value="">
                                    Pilih status pembayaran
                                </option>

                                <option value="Lunas"
                                    {{ old('status_pembayaran', $pembayaran->status_pembayaran) == 'Lunas' ? 'selected' : '' }}>
                                    Lunas
                                </option>

                                <option value="Pending"
                                    {{ old('status_pembayaran', $pembayaran->status_pembayaran) == 'Pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                            </select>

                            @error('status_pembayaran')
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
                        href="{{ route('admin.pembayaran.index') }}"
                        class="btn btn-outline-secondary px-5 py-2">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection