@extends('layouts.auth')

@section('title', 'Detail Penghuni | Reservasi Kos')

@section('content')

<div class="container py-4">

    <h2 class="fw-bold mb-4">
        Detail Penghuni
    </h2>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <table class="table table-striped">

                <tr>
                    <th width="20%">ID</th>
                    <td>{{ $penghuni->id }}</td>
                </tr>

                <tr>
                    <th>Nama</th>
                    <td>{{ $penghuni->nama }}</td>
                </tr>

                <tr>
                    <th>NIK</th>
                    <td>{{ $penghuni->nik }}</td>
                </tr>

                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $penghuni->nomor_telepon }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $penghuni->email }}</td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td>{{ $penghuni->alamat }}</td>
                </tr>

                <tr>
                    <th>Terdaftar pada</th>
                    <td>{{ \Carbon\Carbon::parse($penghuni->created_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}</td>
                </tr>

                <tr>
                    <th>Diperbarui pada</th>
                    <td>{{ \Carbon\Carbon::parse($penghuni->updated_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}</td>
                </tr>

            </table>

            {{-- TOMBOL --}}
            <div class="d-flex align-items-center gap-2 mt-4">

                <a href="{{ route('admin.penghuni.index') }}" class="btn btn-primary">
                    Kembali
                </a>

                <a href="{{ route('admin.penghuni.edit', $penghuni->id) }}" class="btn btn-secondary">
                    Edit
                </a>

                <form action="{{ route('admin.penghuni.destroy', $penghuni->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus penghuni {{ $penghuni->nama }}?')">
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