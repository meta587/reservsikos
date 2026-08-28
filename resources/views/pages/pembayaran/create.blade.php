@extends('layouts.auth')

@section('title', 'Tambah Pembayaran | Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <h3 class="fw-bold mb-4">
        Tambah Pembayaran
    </h3>

    <div class="card">

        <div class="card-body p-4">

            <form action="{{ route('admin.pembayaran.store') }}" method="POST">

                @csrf

                <div class="row">

                    {{-- KOLOM KIRI --}}
                    <div class="col-md-6">

                        {{-- RESERVASI --}}
                        <div class="mb-3">

                            <label for="reservasi_id" class="form-label">
                                Reservasi
                            </label>

                            <select
                                name="reservasi_id"
                                id="reservasi_id"
                                class="form-select">

                                <option value="">
                                    Pilih reservasi
                                </option>

                                @foreach($reservasis as $reservasi)

                                    <option
                                        value="{{ $reservasi->id }}"
                                        {{ old('reservasi_id') == $reservasi->id ? 'selected' : '' }}>

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

                            <label for="tanggal_pembayaran" class="form-label">
                                Tanggal Pembayaran
                            </label>

                            <input
                                type="date"
                                name="tanggal_pembayaran"
                                id="tanggal_pembayaran"
                                class="form-control"
                                value="{{ old('tanggal_pembayaran') }}">

                            @error('tanggal_pembayaran')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- JUMLAH PEMBAYARAN --}}
                        <div class="mb-3">

                            <label for="jumlah_pembayaran" class="form-label">
                                Jumlah Pembayaran
                            </label>

                            <input
                                type="number"
                                name="jumlah_pembayaran"
                                id="jumlah_pembayaran"
                                class="form-control"
                                value="{{ old('jumlah_pembayaran') }}"
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

                            <label for="metode_pembayaran" class="form-label">
                                Metode Pembayaran
                            </label>

                            <select
                                name="metode_pembayaran"
                                id="metode_pembayaran"
                                class="form-select">

                                <option value="">
                                    Pilih metode pembayaran
                                </option>

                                <option value="Transfer"
                                    {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>
                                    Transfer
                                </option>

                                <option value="Cash"
                                    {{ old('metode_pembayaran') == 'Cash' ? 'selected' : '' }}>
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

                            <label for="status_pembayaran" class="form-label">
                                Status Pembayaran
                            </label>

                            <select
                                name="status_pembayaran"
                                id="status_pembayaran"
                                class="form-select">

                                <option value="">
                                    Pilih status pembayaran
                                </option>

                                <option value="Lunas"
                                    {{ old('status_pembayaran') == 'Lunas' ? 'selected' : '' }}>
                                    Lunas
                                </option>

                                <option value="Pending"
                                    {{ old('status_pembayaran') == 'Pending' ? 'selected' : '' }}>
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
                <div class="text-center mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary px-5">

                        Simpan

                    </button>

                    <a
                        href="{{ route('admin.pembayaran.index') }}"
                        class="btn btn-secondary px-5">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection