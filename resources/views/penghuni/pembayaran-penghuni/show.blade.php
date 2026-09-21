@extends('layouts.auth')

@section('title', 'Bukti Pembayaran | Reservasi Kos')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Bukti Pembayaran
            </h2>

            <small class="text-secondary">
                🏠 Dashboard
                <span class="mx-2">›</span>
                Pembayaran
                <span class="mx-2">›</span>
                Bukti Pembayaran
            </small>
        </div>

    </div>


    {{-- CARD BUKTI PEMBAYARAN --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                🧾 Detail Pembayaran
            </h5>
        </div>

        <div class="card-body">

            {{-- NAMA PENGHUNI --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    Nama Penghuni
                </div>

                <div class="col-md-8">
                    {{ $pembayaran->reservasi->penghuni->nama ?? '-' }}
                </div>
            </div>


            {{-- NOMOR KAMAR --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    Nomor Kamar
                </div>

                <div class="col-md-8">
                    {{ $pembayaran->reservasi->kamar->nomor_kamar ?? '-' }}
                </div>
            </div>


            {{-- TIPE KAMAR --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    Tipe Kamar
                </div>

                <div class="col-md-8">
                    {{ $pembayaran->reservasi->kamar->tipe_kamar ?? '-' }}
                </div>
            </div>


            {{-- TANGGAL PEMBAYARAN --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    Tanggal Pembayaran
                </div>

                <div class="col-md-8">
                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d/m/Y') }}
                </div>
            </div>


            {{-- JUMLAH PEMBAYARAN --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    Jumlah Pembayaran
                </div>

                <div class="col-md-8">
                    Rp{{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}
                </div>
            </div>


            {{-- METODE PEMBAYARAN --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    Metode Pembayaran
                </div>

                <div class="col-md-8">
                    {{ $pembayaran->metode_pembayaran }}
                </div>
            </div>


            {{-- STATUS PEMBAYARAN --}}
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">
                    Status Pembayaran
                </div>

                <div class="col-md-8">

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

                </div>
            </div>


            {{-- TOMBOL KEMBALI --}}
            <div class="mt-4">

                <a href="{{ route('penghuni.pembayaran') }}"
                   class="btn btn-secondary">
                    ← Kembali
                </a>

            </div>

        </div>

    </div>

</div>

@endsection