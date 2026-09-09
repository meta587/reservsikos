@extends('layouts.app')

@section('title', 'Data Reservasi | Reservasi Kos')

@section('page-title', 'Data Reservasi')

@section('content')

{{-- PESAN SUKSES --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- TOMBOL TAMBAH --}}
<div class="d-flex justify-content-end mb-3">

    <a href="{{ route('admin.reservasi.create') }}"
       class="btn btn-primary">

        + &nbsp; Tambah Reservasi

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
                            Penghuni
                        </th>

                        <th>
                            Kamar
                        </th>

                        <th>
                            Tanggal Masuk
                        </th>

                        <th>
                            Tanggal Keluar
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

                    @forelse($reservasis as $reservasi)

                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $reservasi->penghuni->nama ?? '-' }}
                            </td>
                           
                            <td>
                                {{ $reservasi->kamar->nomor_kamar ?? '-' }}
                            </td>

                            <td>
                                {{ date('d-m-Y', strtotime($reservasi->tanggal_masuk)) }}
                            </td>
                            
                            <td>

                                @if($reservasi->tanggal_keluar)

                                    {{ date('d-m-Y', strtotime($reservasi->tanggal_keluar)) }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if($reservasi->status == 'Pending')

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @elseif($reservasi->status == 'Aktif')

                                    <span class="badge bg-success">
                                        Aktif
                                    </span>

                                @elseif($reservasi->status == 'Selesai')

                                    <span class="badge bg-info text-dark">
                                        Selesai
                                    </span>

                                @elseif($reservasi->status == 'Dibatalkan')

                                    <span class="badge bg-danger">
                                        Dibatalkan
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    {{-- DETAIL --}}
                                    <a href="{{ route('admin.reservasi.show', $reservasi->id) }}"
                                       class="btn btn-sm btn-outline-secondary"
                                       title="Lihat Detail">

                                        👁

                                    </a>


                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.reservasi.edit', $reservasi->id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="Edit">

                                        ✎

                                    </a>


                                    {{-- HAPUS --}}
                                    <form method="POST"
                                          action="{{ route('admin.reservasi.destroy', $reservasi->id) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus reservasi ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
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