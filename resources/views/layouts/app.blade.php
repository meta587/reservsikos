<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Reservasi Kos')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <div class="bg-primary text-white p-4"
             style="width: 220px; min-height: 100vh;">

            <h4 class="fw-bold mb-4">
                RESERVASI KOS
            </h4>

            <div class="mb-3">
                <a href="{{ route('admin.dashboard') }}"
                   class="text-white text-decoration-none">
                    🏠 Dashboard
                </a>
            </div>

            <div class="mb-3">
                <a href="{{ route('admin.kamar.index') }}"
                   class="text-white text-decoration-none">
                    ▣ Kamar
                </a>
            </div>

            <div class="mb-3">
                <a href="{{ route('admin.penghuni.index') }}"
                   class="text-white text-decoration-none">
                    ♙ Penghuni
                </a>
            </div>

            <div class="mb-3">
                <a href="{{ route('admin.reservasi.index') }}"
                   class="text-white text-decoration-none">
                    ▣ Reservasi
                </a>
            </div>

            <div class="mb-3">
                <a href="{{ route('admin.pembayaran.index') }}"
                   class="text-white text-decoration-none">
                    ▣ Pembayaran
                </a>
            </div>

        </div>


        <!-- CONTENT -->
        <div class="flex-grow-1">

            <!-- TOPBAR -->
            <div class="border-bottom p-3 d-flex justify-content-end">

                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        👤 {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <!-- PROFILE -->
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('admin.profil') }}">
                                👤 Profile
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <!-- LOGOUT -->
                        <li>
                            <form action="{{ route('admin.logout') }}"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item">
                                    🚪 Logout
                                </button>

                            </form>
                        </li>

                    </ul>

                </div>

            </div>


            <!-- HALAMAN -->
            <div class="p-4">
                @yield('content')
            </div>

        </div>

    </div>


    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>