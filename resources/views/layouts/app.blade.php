<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Reservasi Kos')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container-fluid py-3">

        <div class="row">

            {{-- SIDEBAR --}}
            @include('layouts.inc.sidebar')

            {{-- KONTEN UTAMA --}}
            <div class="col-md-10">

                {{-- NAVBAR --}}
                @include('layouts.inc.navbar')

                {{-- ISI HALAMAN --}}
                @yield('content')

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>