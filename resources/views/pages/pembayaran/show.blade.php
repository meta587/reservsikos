@extends('layouts.auth')

@section('title', 'Detail Pembayaran Reservasi Kos')

@section('content')

<div class="container py-4">

    <h2 class="fw-bold mb-4">
        Detail Pembayaran
    </h2>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <table class="table table-striped">

                <tr>
                    <th width="20%">
                        ID
                    </th>

                    <td>
                        {{ $pembayaran->id }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Reservasi
                    </th>

                    <td>
                        RSV-{{ str_pad($pembayaran->reservasi_id, 3, '0', STR_PAD_LEFT) }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Tanggal Pembayaran
                    </th>

                    <td>
                        {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->isoFormat('DD MMMM YYYY') }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Jumlah Pembayaran
                    </th>

                    <td>
                        Rp{{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Metode Pembayaran
                    </th>

                    <td>
                        {{ $pembayaran->metode_pembayaran }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Status Pembayaran
                    </th>

                    <td>

                        @if($pembayaran->status_pembayaran == 'Lunas')

                            <span class="badge bg-success-subtle text-success">
                                Lunas
                            </span>

                        @else

                            <span class="badge bg-warning-subtle text-warning">
                                Pending
                            </span>

                        @endif

                    </td>
                </tr>


                <tr>
                    <th>
                        Terdaftar pada
                    </th>

                    <td>
                        {{ \Carbon\Carbon::parse($pembayaran->created_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}
                    </td>
                </tr>


                <tr>
                    <th>
                        Diperbarui pada
                    </th>

                    <td>
                        {{ \Carbon\Carbon::parse($pembayaran->updated_at)->isoFormat('DD MMMM YYYY HH:mm:ss') }}
                    </td>
                </tr>

            </table>


            {{-- TOMBOL --}}
            <div class="d-flex align-items-center gap-2 mt-4">

                <a href="{{ route('admin.pembayaran.index') }}"
                   class="btn btn-primary">

                    Kembali

                </a>

                <a href="{{ route('admin.pembayaran.edit', $pembayaran->id) }}"
                   class="btn btn-secondary">

                    Edit

                </a>

                <form
                    action="{{ route('admin.pembayaran.destroy', $pembayaran->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">

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