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

                    {{-- Reservasi --}}
                    <a href="{{ route('reservasi-penghuni.index') }}"
                       class="btn btn-primary text-white text-start">
                        📋 Reservasi
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
                        Halaman penghuni
                    </small>
                </div>


                {{-- NAMA + LOGOUT --}}
                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown">

                        👤 {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <form method="POST"
                                  action="{{ route('penghuni.logout') }}">

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


            {{-- SELAMAT DATANG --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold">
                        Selamat datang, {{ Auth::user()->name }} 👋
                    </h4>

                    <p class="text-secondary mb-0">
                        Selamat datang di aplikasi Reservasi Kos.
                        Kamu dapat melihat kamar yang tersedia,
                        melakukan reservasi.
                    </p>

                </div>

            </div>


            {{-- DAFTAR KAMAR --}}
            <div class="card border-0 shadow-sm mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">
                        🏠 Daftar Kamar
                    </h4>

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <thead class="table-light">

                                <tr>
                                    <th>No</th>
                                    <th>Nomor Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Harga</th>
                                    <th>Fasilitas</th>
                                    <th>Status</th>
                                    <th>Reservasi</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($kamars as $kamar)

                                    <tr>

                                        {{-- NO --}}
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        {{-- NOMOR KAMAR --}}
                                        <td>
                                            {{ $kamar->nomor_kamar }}
                                        </td>


                                        {{-- TIPE KAMAR --}}
                                        <td>
                                            {{ $kamar->tipe_kamar }}
                                        </td>


                                        {{-- HARGA --}}
                                        <td>
                                            Rp{{ number_format($kamar->harga, 0, ',', '.') }}
                                        </td>


                                        {{-- FASILITAS --}}
                                        <td>
                                            {{ $kamar->fasilitas }}
                                        </td>


                                        {{-- STATUS --}}
                                        <td>

                                            @if(strtolower(trim($kamar->status_kamar)) == 'tersedia')

                                                <span class="badge bg-success">
                                                    Tersedia
                                                </span>

                                            @else

                                                <span class="badge bg-danger">
                                                    Terisi
                                                </span>

                                            @endif

                                        </td>


                                        {{-- RESERVASI --}}
                                        <td>

                                            @if(strtolower(trim($kamar->status_kamar)) == 'tersedia')

                                                <a href="{{ route('reservasi-penghuni.index', ['kamar_id' => $kamar->id]) }}"
                                                   class="btn btn-primary btn-sm">

                                                    📋 Reservasi

                                                </a>

                                            @else

                                                <button
                                                    type="button"
                                                    class="btn btn-secondary btn-sm"
                                                    disabled>

                                                    Tidak tersedia

                                                </button>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7"
                                            class="text-center text-secondary">

                                            Belum ada data kamar.

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