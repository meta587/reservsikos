@extends('layouts.app')

@section('title', 'Dashboard | Reservasi Kos')

@section('page-title', 'Dashboard')

@section('content')


<div class="row">

    {{-- TOTAL KAMAR --}}
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div>

                    <div class="text-primary text-uppercase fw-bold mb-2">
                        Total Kamar
                    </div>

                    <div class="h4 mb-0 fw-bold">
                        {{ $totalKamar }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- TOTAL PENGHUNI --}}
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div>

                    <div class="text-info text-uppercase fw-bold mb-2">
                        Penghuni
                    </div>

                    <div class="h4 mb-0 fw-bold">
                        {{ $totalPenghuni }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- RESERVASI AKTIF --}}
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div>

                    <div class="text-success text-uppercase fw-bold mb-2">
                        Reservasi Aktif
                    </div>

                    <div class="h4 mb-0 fw-bold">
                        {{ $reservasiAktif }}
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- PEMBAYARAN --}}
    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div>

                    <div class="text-warning text-uppercase fw-bold mb-2">
                        Pembayaran Bulan Ini
                    </div>

                    <div class="h4 mb-0 fw-bold">
                        {{ $pembayaranBulanIni }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- RESERVASI TERBARU --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-header bg-white py-3">

        <h6 class="mb-0 fw-bold text-primary">
            Reservasi Terbaru
        </h6>

    </div>


    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered align-middle mb-0">

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

                            $checkIn = \Carbon\Carbon::parse($reservasi->tanggal_masuk);

                            $checkOut = \Carbon\Carbon::parse($reservasi->tanggal_keluar);

                            $aktif = $hariIni->between($checkIn, $checkOut);

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

                                    <span class="badge bg-success">
                                        Aktif
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Selesai
                                    </span>

                                @endif

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center text-secondary py-4">

                                Belum ada data reservasi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection