@extends('layouts.app')

@section('title', 'Data Penghuni | Reservasi Kos')

@section('content')


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

        

   



@endsection