@extends('layouts.auth')

@section('title', 'Detail Kamar  Reservasi Kos')

@section('content')

<div class="container py-4">

    <h2 class="fw-bold mb-4">
        Detail Kamar
    </h2>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <table class="table table-striped">

                <tr>
                    <th width="20%">
                        ID
                    </th>

                    <td>
                        {{ $kamar->id }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Nomor Kamar
                    </th>

                    <td>
                        {{ $kamar->nomor_kamar }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Tipe Kamar
                    </th>

                    <td>
                        {{ $kamar->tipe_kamar }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Harga
                    </th>

                    <td>
                        Rp{{ number_format($kamar->harga, 0, ',', '.') }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Fasilitas
                    </th>

                    <td>
                        {{ $kamar->fasilitas }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Status Kamar
                    </th>

                    <td>

                        @if($kamar->status_kamar == 'Tersedia')

                            <span class="badge bg-success-subtle text-success">
                                Tersedia
                            </span>

                        @else

                            <span class="badge bg-danger-subtle text-danger">
                                Terisi
                            </span>

                        @endif

                    </td>
                </tr>


                <tr>
                    <th>
                        Terdaftar pada
                    </th>

                    <td>
                        {{ \Carbon\Carbon::parse($kamar->created_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Diperbarui pada
                    </th>

                    <td>
                        {{ \Carbon\Carbon::parse($kamar->updated_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}
                    </td>
                </tr>

            </table>


            {{-- TOMBOL --}}
            <div class="d-flex align-items-center gap-2 mt-4">

                <a href="{{ route('admin.kamar.index') }}"
                   class="btn btn-primary">

                    Kembali

                </a>

                <a href="{{ route('admin.kamar.edit', $kamar->id) }}"
                   class="btn btn-secondary">

                    Edit

                </a>

                <form
                    action="{{ route('admin.kamar.destroy', $kamar->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus kamar {{ $kamar->nomor_kamar }}?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection