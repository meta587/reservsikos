@extends('layouts.auth')

@section('title', 'Tambah Reservasi | Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <div class="card border-0 shadow-sm">

        <div class="card-body p-5">

            <h3 class="fw-bold mb-4">
                Tambah Reservasi
            </h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('admin.reservasi.store') }}"
                method="POST"
            >

                @csrf

                {{-- NAMA --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama_penghuni"
                        class="form-control"
                        value="{{ old('nama_penghuni') }}"
                        placeholder="Masukkan nama"
                        required
                    >
                </div>


                {{-- NIK --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        NIK
                    </label>

                    <input
                        type="text"
                        name="nik"
                        class="form-control"
                        value="{{ old('nik') }}"
                        placeholder="Masukkan NIK"
                        required
                    >
                </div>


                {{-- NOMOR TELEPON --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nomor Telepon
                    </label>

                    <input
                        type="text"
                        name="nomor_telepon"
                        class="form-control"
                        value="{{ old('nomor_telepon') }}"
                        placeholder="Masukkan nomor telepon"
                        required
                    >
                </div>


                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                    >
                </div>


                {{-- ALAMAT --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"
                        placeholder="Masukkan alamat"
                        required
                    >{{ old('alamat') }}</textarea>
                </div>


                {{-- KAMAR --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Kamar
                    </label>

                    <select
                        name="kamar_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            -- Pilih Kamar --
                        </option>

                        @foreach($kamars as $kamar)

                            <option
                                value="{{ $kamar->id }}"
                                {{ old('kamar_id') == $kamar->id ? 'selected' : '' }}
                            >
                                {{ $kamar->nomor_kamar }}
                                -
                                {{ $kamar->tipe_kamar }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- TANGGAL MASUK --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tanggal Masuk
                    </label>

                    <input
                        type="date"
                        name="tanggal_masuk"
                        class="form-control"
                        value="{{ old('tanggal_masuk') }}"
                        required
                    >
                </div>


                {{-- TANGGAL KELUAR --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tanggal Keluar
                    </label>

                    <input
                        type="date"
                        name="tanggal_keluar"
                        class="form-control"
                        value="{{ old('tanggal_keluar') }}"
                    >
                </div>


                {{-- STATUS --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option value="Pending"
                            {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
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


                {{-- TOMBOL --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.reservasi.index') }}"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan 
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection