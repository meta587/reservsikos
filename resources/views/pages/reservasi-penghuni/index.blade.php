@extends('layouts.auth')

@section('title', 'Reservasi Kamar | Reservasi Kos')

@section('content')

<div class="container-fluid py-4">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">
                Tambah Reservasi
            </h2>

            {{-- PESAN ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reservasi-penghuni.store') }}" method="POST">
                @csrf

                <div class="row">

                   {{-- NAMA --}}
                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    Nama
                                </label>

                                <input type="text"
                                    name="nama"
                                    class="form-control"
                                    placeholder="Masukkan Nama"
                                    value="{{ old('nama') }}"
                                    required>

                            </div>
                    {{-- KAMAR --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Kamar
                        </label>

                        <select name="kamar_id"
                                class="form-select"
                                required>

                            <option value="">
                                Pilih Kamar
                            </option>

                            @foreach ($kamars as $item)

                                <option value="{{ $item->id }}"
                                    {{ $kamar && $kamar->id == $item->id ? 'selected' : '' }}>

                                    {{ $item->nomor_kamar }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- TANGGAL MASUK --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Tanggal Masuk
                        </label>

                        <input type="date"
                               name="tanggal_masuk"
                               class="form-control"
                               value="{{ old('tanggal_masuk') }}"
                               required>

                    </div>


                    {{-- TANGGAL KELUAR --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Tanggal Keluar
                        </label>

                        <input type="date"
                               name="tanggal_keluar"
                               class="form-control"
                               value="{{ old('tanggal_keluar') }}"
                               required>

                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select"
                                required>

                            <option value="">
                                Pilih Status
                            </option>

                            <option value="Pending"
                                {{ old('status') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Aktif"
                                {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Selesai"
                                {{ old('status') == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="Dibatalkan"
                                {{ old('status') == 'Dibatalkan' ? 'selected' : '' }}>
                                Dibatalkan
                            </option>

                        </select>

                    </div>

                </div>


                {{-- TOMBOL --}}
                <div class="d-flex justify-content-center gap-3 mt-4">

                    <button type="submit"
                            class="btn btn-primary px-5">

                        Simpan

                    </button>

                    <a href="{{ route('penghuni.dashboard') }}"
                       class="btn btn-outline-secondary px-5">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection