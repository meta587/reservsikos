@extends('layouts.auth')

@section('title', 'Data Penghuni | Reservasi Kos')

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

                    <a href="{{ route('admin.dashboard') }}"
                       class="btn btn-primary text-white text-start">
                        🏠 Dashboard
                    </a>

                    <a href="{{ route('admin.kamar.index') }}"
                       class="btn btn-primary text-white text-start">
                        ▣ Kamar
                    </a>

                    <a href="{{ route('admin.penghuni.index') }}"
                       class="btn btn-light text-primary text-start">
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


        {{-- KONTEN UTAMA --}}
        <div class="col-md-10">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h2 class="fw-bold mb-1">
                        Data Penghuni
                    </h2>

                    <small class="text-secondary">
                        🏠 Dashboard
                        <span class="mx-2">›</span>
                        Penghuni
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

                <div class="alert alert-success alert-dismissible fade show" role="alert">

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

                <a href="{{ route('admin.penghuni.create') }}"
                   class="btn btn-primary">

                    + &nbsp; Tambah Penghuni

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
                                        Nama
                                    </th>

                                    <th>
                                        NIK
                                    </th>

                                    <th>
                                        No. Telp
                                    </th>

                                    <th>
                                        Email
                                    </th>

                                    <th>
                                        Alamat
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($penghunis as $penghuni)

                                    <tr>

                                        {{-- NO --}}
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>


                                        {{-- NAMA --}}
                                        <td>
                                            {{ $penghuni->nama }}
                                        </td>


                                        {{-- NIK --}}
                                        <td>
                                            {{ $penghuni->nik }}
                                        </td>


                                        {{-- NOMOR TELEPON --}}
                                        <td>
                                            {{ $penghuni->nomor_telepon }}
                                        </td>


                                        {{-- EMAIL --}}
                                        <td>
                                            {{ $penghuni->email }}
                                        </td>


                                        {{-- ALAMAT --}}
                                        <td>
                                            {{ $penghuni->alamat }}
                                        </td>


                                        {{-- AKSI --}}
                                        <td class="text-center">

                                            <div class="d-flex justify-content-center gap-2">

                                                {{-- DETAIL --}}
                                                <a
                                                    href="{{ route('admin.penghuni.show', $penghuni->id) }}"
                                                    class="btn btn-sm btn-outline-secondary"
                                                    title="Lihat Detail">

                                                    👁

                                                </a>


                                                {{-- EDIT --}}
                                                <a
                                                    href="{{ route('admin.penghuni.edit', $penghuni->id) }}"
                                                    class="btn btn-sm btn-outline-primary"
                                                    title="Edit">

                                                    ✎

                                                </a>


                                                {{-- HAPUS --}}
                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.penghuni.destroy', $penghuni->id) }}"
                                                    onsubmit="return confirm('Yakin ingin menghapus penghuni {{ $penghuni->nama }}?')">

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

                                        <td
                                            colspan="7"
                                            class="text-center text-secondary py-4">

                                            Belum ada data penghuni.

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