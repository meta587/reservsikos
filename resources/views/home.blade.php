<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Reservasi Kos</title>
</head>
<body>

    <h1>Dashboard Reservasi Kos</h1>

    <p>Selamat datang di Aplikasi Reservasi Kos</p>

    <hr>

    <h3>Menu</h3>

    <ul>
        <li>
            <a href="{{ route('admin.kamar.index') }}">
                Data Kamar
            </a>
        </li>

        <li>
            <a href="{{ route('admin.penghuni.index') }}">
                Data Penghuni
            </a>
        </li>

        <li>
            <a href="{{ route('admin.reservasi.index') }}">
                Data Reservasi
            </a>
        </li>

        <li>
            <a href="{{ route('admin.pembayaran.index') }}">
                Data Pembayaran
            </a>
        </li>

        <li>
            <a href="{{ route('admin.profil') }}">
                Profil
            </a>
        </li>
    </ul>

</body>
</html>