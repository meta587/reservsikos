```blade
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Reservasi Kos</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container-fluid">

    <div class="row min-vh-100">

        {{-- SIDEBAR --}}
        <div class="col-md-3 col-lg-2 bg-primary text-white p-0">

            <div class="p-4 text-center">
                <h4>🏠 Reservasi Kos</h4>
            </div>

            <div class="list-group list-group-flush">

                <a href="{{ route('admin.dashboard') }}"
                   class="list-group-item list-group-item-action active">
                    🏠 Dashboard
                </a>

                <a href="#"
                   class="list-group-item list-group-item-action">
                    🛏️ Kamar
                </a>

                <a href="#"
                   class="list-group-item list-group-item-action">
                    👤 Penghuni
                </a>

                <a href="#"
                   class="list-group-item list-group-item-action">
                    📋 Reservasi
                </a>

                <a href="#"
                   class="list-group-item list-group-item-action">
                    💳 Pembayaran
                </a>

            </div>

        </div>


        {{-- KONTEN UTAMA --}}
        <div class="col-md-9 col-lg-10 p-0">

            {{-- HEADER --}}
            <nav class="navbar bg-white border-bottom px-4 py-3">

                <div>
                    <h3 class="mb-0">Dashboard</h3>

                    <small class="text-secondary">
                        🏠 Dashboard
                    </small>
                </div>


                {{-- AKUN ADMIN --}}
                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown">

                        👤 Admin

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="#">
                                👤 Profil
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            {{-- LOGOUT --}}
                            <form
                                action="{{ route('logout') }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    🚪 Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            </nav>


            {{-- ISI DASHBOARD --}}
            <div class="p-4">

                {{-- KARTU STATISTIK --}}
                <div class="row g-4 mb-4">

                    {{-- TOTAL KAMAR --}}
                    <div class="col-md-6 col-xl-3">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <div class="fs-1">
                                    🛏️
                                </div>

                                <h2 class="mt-2">
                                    12
                                </h2>

                                <p class="text-secondary mb-0">
                                    Total Kamar
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- PENGHUNI --}}
                    <div class="col-md-6 col-xl-3">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <div class="fs-1">
                                    👥
                                </div>

                                <h2 class="mt-2">
                                    8
                                </h2>

                                <p class="text-secondary mb-0">
                                    Penghuni Aktif
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- RESERVASI --}}
                    <div class="col-md-6 col-xl-3">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <div class="fs-1">
                                    📋
                                </div>

                                <h2 class="mt-2">
                                    5
                                </h2>

                                <p class="text-secondary mb-0">
                                    Reservasi Aktif
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- PEMBAYARAN --}}
                    <div class="col-md-6 col-xl-3">

                        <div class="card shadow-sm border-0 h-100">

                            <div class="card-body">

                                <div class="fs-1">
                                    💳
                                </div>

                                <h2 class="mt-2">
                                    7
                                </h2>

                                <p class="text-secondary mb-0">
                                    Pembayaran Bulan Ini
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- TABEL RESERVASI --}}
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white py-3">

                        <h4 class="mb-0">
                            Reservasi Terbaru
                        </h4>

                    </div>


                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th>No</th>
                                    <th>Penghuni</th>
                                    <th>Kamar</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Status</th>
                                </tr>

                            </thead>


                            <tbody>

                                <tr>

                                    <td>1</td>

                                    <td>
                                        Budi Santoso
                                    </td>

                                    <td>
                                        101
                                    </td>

                                    <td>
                                        20/05/2024
                                    </td>

                                    <td>
                                        27/05/2024
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            Aktif
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td>2</td>

                                    <td>
                                        Siti Aisyah
                                    </td>

                                    <td>
                                        102
                                    </td>

                                    <td>
                                        21/05/2024
                                    </td>

                                    <td>
                                        28/05/2024
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            Aktif
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td>3</td>

                                    <td>
                                        Rudi Hermawan
                                    </td>

                                    <td>
                                        103
                                    </td>

                                    <td>
                                        22/05/2024
                                    </td>

                                    <td>
                                        29/05/2024
                                    </td>

                                    <td>
                                        <span class="badge bg-success">
                                            Aktif
                                        </span>
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- Bootstrap JavaScript --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
