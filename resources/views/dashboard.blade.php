@extends('layouts.auth')

@section('title', 'Dashboard | Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <div class="row">

        <div class="col-md-2">

            <div class="bg-primary text-white rounded-3 min-vh-100 p-3">

                <h5 class="mb-4">
                    Reservasi Kos
                </h5>

                <div class="d-grid gap-2">

                    <a href="{{ route('admin.dashboard') }}"
                       class="btn btn-light text-primary text-start">
                        🏠 Dashboard
                    </a>

                    <a href="{{ route('admin.kamar.index') }}"
                       class="btn btn-primary text-white text-start">
                        ▣ Kamar
                    </a>

                    <a href="{{ route('admin.penghuni.index') }}"
                       class="btn btn-primary text-white text-start">
                        ♙ Penghuni
                    </a>

                    <a href="{{ route('admin.reservasi.index') }}"
                       class="btn btn-primary text-white text-start">
                        ▣ Reservasi
                    </a>

                    <a href="{{ route('admin.pembayaran.index') }}"
                       class="btn btn-primary text-white text-start">
                        ▣ Pembayaran
                    </a>

                </div>

            </div>

        </div>


        <div class="col-md-10">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h2 class="fw-bold mb-1">
                        Dashboard
                    </h2>

                    <small class="text-secondary">
                        🏠 Dashboard
                    </small>
                </div>


                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown">

                        👤 Admin

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('admin.profil') }}">
                                Profil
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form method="POST"
                                  action="{{ route('admin.logout') }}">

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            </div>


            <div class="row g-3 mb-4">

                <div class="col-md-3">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body">

                            <h2 class="text-primary fw-bold">
                                {{ $totalKamar }}
                            </h2>

                            <p class="text-secondary mb-0">
                                Total Kamar
                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body">

                            <h2 class="text-primary fw-bold">
                                {{ $totalPenghuni }}
                            </h2>

                            <p class="text-secondary mb-0">
                                Penghuni
                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body">

                            <h2 class="text-success fw-bold">
                                {{ $reservasiAktif }}
                            </h2>

                            <p class="text-secondary mb-0">
                                Reservasi Aktif
                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body">

                            <h2 class="text-dark fw-bold">
                                {{ $pembayaranBulanIni }}
                            </h2>

                            <p class="text-secondary mb-0">
                                Pembayaran Bulan Ini
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h5 class="fw-bold mb-3">
                        Reservasi Terbaru
                    </h5>

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th>
                                        Penghuni
                                    </th>

                                    <th>
                                        Kamar
                                    </th>

                                    <th>
                                        Check In
                                    </th>

                                    <th>
                                        Check Out
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($reservasiTerbaru as $reservasi)

                                    @php

                                        $hariIni = \Carbon\Carbon::today();

                                        $checkIn = \Carbon\Carbon::parse(
                                            $reservasi->tanggal_masuk
                                        );

                                        $checkOut = \Carbon\Carbon::parse(
                                            $reservasi->tanggal_keluar
                                        );

                                        $aktif =
                                            $hariIni->between(
                                                $checkIn,
                                                $checkOut
                                            );

                                    @endphp

                                    <tr>

                                        <td>
                                            {{ $reservasi->nama_penghuni }}
                                        </td>

                                        <td>
                                            {{ $reservasi->nomor_kamar }}
                                        </td>

                                        <td>
                                            {{ $checkIn->format('d/m/Y') }}
                                        </td>

                                        <td>
                                            {{ $checkOut->format('d/m/Y') }}
                                        </td>

                                        <td>

                                            @if($aktif)

                                                <span class="badge bg-success-subtle text-success">
                                                    Aktif
                                                </span>

                                            @else

                                                <span class="badge bg-secondary-subtle text-secondary">
                                                    Selesai
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center text-secondary">

                                            Belum ada data reservasi.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection