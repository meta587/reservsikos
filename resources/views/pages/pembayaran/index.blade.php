@extends('layouts.auth')

@section('title', 'Data Pembayaran | Reservasi Kos')

@section('content')

<div class="container-fluid py-3">

    <div class="row">

        {{-- SIDEBAR --}}
        <div class="col-md-2">

            <div class="bg-primary text-white rounded-3 min-vh-100 p-3">

                <h5 class="mb-4">
                    Reservasi Kos
                </h5>

                <div class="d-grid gap-2">

                    {{-- DASHBOARD --}}
                    <a href="{{ route('admin.dashboard') }}"
                       class="btn btn-primary text-white text-start">
                        🏠 Dashboard
                    </a>

                    {{-- KAMAR --}}
                    <a href="{{ route('admin.kamar.index') }}"
                       class="btn btn-primary text-white text-start">
                        ▣ Kamar
                    </a>

                    {{-- PENGHUNI --}}
                    <a href="{{ route('admin.penghuni.index') }}"
                       class="btn btn-primary text-white text-start">
                        ♙ Penghuni
                    </a>

                    {{-- RESERVASI --}}
                    <a href="{{ route('admin.reservasi.index') }}"
                       class="btn btn-primary text-white text-start">
                        ▣ Reservasi
                    </a>

                    {{-- PEMBAYARAN --}}
                    <a href="{{ route('admin.pembayaran.index') }}"
                       class="btn btn-light text-primary text-start">
                        ▣ Pembayaran
                    </a>

                </div>

            </div>

        </div>


        {{-- KONTEN UTAMA --}}
        <div class="col-md-10">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        Data Pembayaran
                    </h2>

                    <small class="text-secondary">
                        🏠 Dashboard
                        <span class="mx-2">›</span>
                        Pembayaran
                    </small>

                </div>


                {{-- PROFIL ADMIN --}}
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


            {{-- PESAN SUKSES --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show"
                     role="alert">

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- TOMBOL TAMBAH --}}
            <div class="d-flex justify-content-end mb-3">

                <a href="{{ route('admin.pembayaran.create') }}"
                   class="btn btn-primary">

                    + &nbsp; Tambah Pembayaran

                </a>

            </div>


            {{-- TABEL --}}
            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle mb-0">

                            <thead class="table-light">

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th>
                                        Reservasi
                                    </th>

                                    <th>
                                        Tanggal
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
                                        Aksi
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


                                        {{-- RESERVASI --}}
                                        <td>
                                            {{ $pembayaran->reservasi_id }}
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


                                        {{-- AKSI --}}
                                        <td class="text-center">

                                            <div class="d-flex justify-content-center gap-2">

                                                {{-- DETAIL --}}
                                                <a href="{{ route('admin.pembayaran.show', $pembayaran->id) }}"
                                                   class="btn btn-sm btn-outline-secondary"
                                                   title="Detail">
                                                    👁
                                                </a>


                                                {{-- EDIT --}}
                                                <a href="{{ route('admin.pembayaran.edit', $pembayaran->id) }}"
                                                   class="btn btn-sm btn-outline-primary"
                                                   title="Edit">
                                                    ✎
                                                </a>


                                                {{-- HAPUS --}}
                                                <form method="POST"
                                                      action="{{ route('admin.pembayaran.destroy', $pembayaran->id) }}"
                                                      onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Hapus">
                                                        🗑
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7"
                                            class="text-center text-secondary py-4">

                                            Belum ada data pembayaran.

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