```blade
@extends('layouts.auth')

@section('title', 'Detail Reservasi | Reservasi Kos')

@section('content')

<div class="container py-4">

    <h2 class="fw-bold mb-4">
        Detail Reservasi
    </h2>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <table class="table table-striped">

                <tr>
                    <th width="20%">ID</th>
                    <td>{{ $reservasi->id }}</td>
                </tr>

                <tr>
                    <th>Penghuni</th>
                    <td>
                        {{ $reservasi->penghuni->nama ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Kamar</th>
                    <td>
                        {{ $reservasi->kamar->nomor_kamar ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Tanggal Masuk</th>
                    <td>
                        {{ \Carbon\Carbon::parse($reservasi->tanggal_masuk)->isoFormat('DD MMMM YYYY') }}
                    </td>
                </tr>

                <tr>
                    <th>Tanggal Keluar</th>
                    <td>
                        {{ $reservasi->tanggal_keluar
                            ? \Carbon\Carbon::parse($reservasi->tanggal_keluar)->isoFormat('DD MMMM YYYY')
                            : '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        {{ ucfirst($reservasi->status) }}
                    </td>
                </tr>

                <tr>
                    <th>Terdaftar pada</th>
                    <td>
                        {{ \Carbon\Carbon::parse($reservasi->created_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}
                    </td>
                </tr>

                <tr>
                    <th>Diperbarui pada</th>
                    <td>
                        {{ \Carbon\Carbon::parse($reservasi->updated_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}
                    </td>
                </tr>

            </table>


            {{-- TOMBOL --}}
            <div class="d-flex align-items-center gap-2 mt-4">

                <a href="{{ route('admin.reservasi.index') }}"
                   class="btn btn-primary">
                    Kembali
                </a>

                <a href="{{ route('admin.reservasi.edit', $reservasi->id) }}"
                   class="btn btn-secondary">
                    Edit
                </a>

                <form
                    action="{{ route('admin.reservasi.destroy', $reservasi->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus reservasi ini?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Hapus
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
```
