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

            {{-- PESAN ERROR DARI CONTROLLER --}}
            @if (session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif


            <form
                action="{{ route('reservasi-penghuni.store') }}"
                method="POST">

                @csrf

                <div class="row">

                    {{-- NAMA --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="nama_penghuni"
                            class="form-control"
                            value="{{ old('nama_penghuni') }}"
                            placeholder="Masukkan nama"
                            required>

                    </div>


                    {{-- NIK --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            NIK
                        </label>

                        <input
                            type="text"
                            name="nik"
                            class="form-control"
                            value="{{ old('nik') }}"
                            placeholder="Masukkan NIK"
                            required>

                    </div>


                    {{-- NOMOR TELEPON --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Nomor Telepon
                        </label>

                        <input
                            type="text"
                            name="nomor_telepon"
                            class="form-control"
                            value="{{ old('nomor_telepon') }}"
                            placeholder="Masukkan nomor telepon"
                            required>

                    </div>


                    {{-- EMAIL --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required>

                    </div>


                    {{-- ALAMAT --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan alamat"
                            required>{{ old('alamat') }}</textarea>

                    </div>


                    {{-- KAMAR --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Kamar
                        </label>

                        <select
                            name="kamar_id"
                            class="form-select"
                            required>

                            <option value="">
                                Pilih Kamar
                            </option>

                            @foreach ($kamars as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('kamar_id', $kamar?->id) == $item->id ? 'selected' : '' }}>

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

                        <input
                            type="date"
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

                        <input
                            type="date"
                            name="tanggal_keluar"
                            class="form-control"
                            value="{{ old('tanggal_keluar') }}">

                    </div>

                </div>


                {{-- TOMBOL --}}
                <div class="d-flex justify-content-center gap-3 mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary px-5">

                        Simpan

                    </button>

                    <a
                        href="{{ route('penghuni.dashboard') }}"
                        class="btn btn-outline-secondary px-5">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection