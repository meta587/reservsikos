@extends('layouts.auth')

@section('title', 'Dashboard Penghuni | Reservasi Kos')

@section('content')

<div class="container-fluid py-4">

    <div class="row">

        {{-- SIDEBAR --}}
        <div class="col-md-2">

            <div class="bg-primary text-white rounded-3 min-vh-100 p-3">

                <h5 class="fw-bold mb-4">
                    🏠 Reservasi Kos
                </h5>

                <div class="d-grid gap-2">

                    {{-- Dashboard --}}
                    <a href="{{ route('penghuni.dashboard') }}"
                       class="btn btn-light text-primary text-start">
                        🏠 Dashboard
                    </a>

                    {{-- Kamar --}}
                    <a href="#"
                       class="btn btn-primary text-white text-start">
                        🛏️ Kamar
                    </a>

                    {{-- Reservasi --}}
                    <a href="#"
                       class="btn btn-primary text-white text-start">
                        📋 Reservasi
                    </a>

                    {{-- Pembayaran --}}
                    <a href="#"
                       class="btn btn-primary text-white text-start">
                        💳 Pembayaran
                    </a>

                    {{-- Profil --}}
                    <a href="#"
                       class="btn btn-primary text-white text-start">
                        👤 Profil
                    </a>

                </div>

            </div>

        </div>


        {{-- CONTENT --}}
        <div class="col-md-10">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        Dashboard Penghuni
                    </h2>

                    <small class="text-secondary">
                        Halaman utama penghuni
                    </small>

                </div>

                <div>

                    <span class="fw-semibold">
                        👤 {{ Auth::user()->name }}
                    </span>

                    <span class="badge bg-primary">
                        Penghuni
                    </span>

                </div>

            </div>


            {{-- SELAMAT DATANG --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold">
                        Selamat datang, {{ Auth::user()->name }} 👋
                    </h4>

                    <p class="text-secondary mb-0">
                        Selamat datang di aplikasi Reservasi Kos.
                        Kamu dapat melihat kamar yang tersedia,
                        melakukan reservasi, dan melihat pembayaran.
                    </p>

                </div>

            </div>


            {{-- MENU UTAMA --}}
            <div class="row g-4">

                {{-- KAMAR --}}
                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div class="fs-1 mb-3">
                                🛏️
                            </div>

                            <h5 class="fw-bold">
                                Kamar
                            </h5>

                            <p class="text-secondary">
                                Lihat informasi kamar yang tersedia
                                untuk kamu reservasi.
                            </p>

                            <a href="#"
                               class="btn btn-primary">
                                Lihat Kamar
                            </a>

                        </div>

                    </div>

                </div>


                {{-- RESERVASI --}}
                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div class="fs-1 mb-3">
                                📋
                            </div>

                            <h5 class="fw-bold">
                                Reservasi
                            </h5>

                            <p class="text-secondary">
                                Lakukan reservasi kamar dan lihat
                                informasi reservasi kamu.
                            </p>

                            <a href="#"
                               class="btn btn-primary">
                                Reservasi Saya
                            </a>

                        </div>

                    </div>

                </div>


                {{-- PEMBAYARAN --}}
                <div class="col-md-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body p-4">

                            <div class="fs-1 mb-3">
                                💳
                            </div>

                            <h5 class="fw-bold">
                                Pembayaran
                            </h5>

                            <p class="text-secondary">
                                Lihat dan lakukan pembayaran
                                reservasi kamu.
                            </p>

                            <a href="#"
                               class="btn btn-primary">
                                Pembayaran
                            </a>

                        </div>

                    </div>

                </div>


        </div>

    </div>

</div>

@endsection