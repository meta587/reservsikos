@extends('layouts.auth')

@section('title', 'Pembayaran | Reservasi Kos')

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

                    {{-- DASHBOARD --}}
                    <a href="{{ route('penghuni.dashboard') }}"
                       class="btn btn-primary text-white text-start">

                        🏠 Dashboard

                    </a>

                    {{-- RESERVASI --}}
                    <a href="{{ route('reservasi-penghuni.index') }}"
                       class="btn btn-primary text-white text-start">

                        📋 Reservasi

                    </a>

                    {{-- PEMBAYARAN --}}
                    <a href="{{ route('penghuni.pembayaran') }}"
                       class="btn btn-light text-primary text-start">

                        💳 Pembayaran

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
                        Riwayat Pembayaran
                    </h2>

                    <small class="text-secondary">
                        Daftar pembayaran Anda
                    </small>

                </div>


                {{-- NAMA PENGHUNI --}}
                <div>

                    <button class="btn btn-light">

                        👤 {{ Auth::guard('penghuni')->user()->name }}

                    </button>

                </div>

            </div>


            {{-- TABEL PEMBAYARAN --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        💳 Riwayat Pembayaran
                    </h4>


                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead class="table-light">

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th>
                                        Nama Penghuni
                                    </th>

                                    <th>
                                        Kamar
                                    </th>

                                    <th>
                                        Tanggal Pembayaran
                                    </th>

                                    <th>
                                        Jumlah
                                    </th>

                                    <th>
                                        Metode
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th class="text-center">
                                        Bukti
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($pembayarans as $pembayaran)

                                    <tr>

                                        {{-- NO --}}
                                        <td class="text-center">

                                            {{ $loop->iteration }}

                                        </td>


                                        {{-- NAMA --}}
                                        <td>

                                            {{ $pembayaran->reservasi->penghuni->nama ?? '-' }}

                                        </td>


                                        {{-- KAMAR --}}
                                        <td>

                                            {{ $pembayaran->reservasi->kamar->nomor_kamar ?? '-' }}

                                        </td>


                                        {{-- TANGGAL --}}
                                        <td>

                                            {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d/m/Y') }}

                                        </td>


                                        {{-- JUMLAH --}}
                                        <td>

                                            Rp{{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}

                                        </td>


                                        {{-- METODE --}}
                                        <td>

                                            {{ $pembayaran->metode_pembayaran }}

                                        </td>


                                        {{-- STATUS --}}
                                        <td>

                                            @if($pembayaran->status_pembayaran == 'Lunas')

                                                <span class="badge bg-success">

                                                    Lunas

                                                </span>

                                            @elseif($pembayaran->status_pembayaran == 'Pending')

                                                <span class="badge bg-warning text-dark">

                                                    Pending

                                                </span>

                                            @else

                                                <span class="badge bg-secondary">

                                                    {{ $pembayaran->status_pembayaran }}

                                                </span>

                                            @endif

                                        </td>


                                        {{-- BUKTI --}}
                                        <td class="text-center">

                                            <a href="{{ route('penghuni.pembayaran.bukti', $pembayaran->id) }}"
                                               class="btn btn-sm btn-primary">

                                                🧾 Lihat Bukti

                                            </a>

                                        </td>

                                    </tr>


                                @empty

                                    <tr>

                                        <td colspan="8"
                                            class="text-center text-secondary py-4">

                                            Belum ada pembayaran.

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