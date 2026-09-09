@extends('layouts.app')

@section('title', 'Data Kamar | Reservasi Kos')

@section('page-title', 'Data Kamar')

@section('content')

{{-- TOMBOL TAMBAH --}}
<div class="d-flex justify-content-end mb-3">

    <a href="{{ route('admin.kamar.create') }}"
       class="btn btn-primary">

        + &nbsp; Tambah Kamar

    </a>

</div>


{{-- TABLE DATA KAMAR --}}
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
                            Nomor Kamar
                        </th>

                        <th>
                            Tipe Kamar
                        </th>

                        <th>
                            Harga
                        </th>

                        <th>
                            Fasilitas
                        </th>

                        <th class="text-center">
                            Status
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($kamars as $kamar)

                        <tr>

                            {{-- NO --}}
                            <td class="text-center">
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
                            <td class="text-center">

                                @if($kamar->status_kamar == 'Tersedia')

                                    <span class="badge bg-success-subtle text-success px-3 py-2">
                                        Tersedia
                                    </span>

                                @else

                                    <span class="badge bg-danger-subtle text-danger px-3 py-2">
                                        Terisi
                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}
                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    {{-- DETAIL --}}
                                    <a href="{{ route('admin.kamar.show', $kamar->id) }}"
                                       class="btn btn-sm btn-outline-secondary"
                                       title="Lihat Detail">

                                        👁

                                    </a>


                                    {{-- EDIT --}}
                                    <a href="{{ route('admin.kamar.edit', $kamar->id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="Edit">

                                        ✎

                                    </a>


                                    {{-- HAPUS --}}
                                    <form method="POST"
                                          action="{{ route('admin.kamar.destroy', $kamar->id) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus kamar {{ $kamar->nomor_kamar }}?')">

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

                                Belum ada data kamar.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection