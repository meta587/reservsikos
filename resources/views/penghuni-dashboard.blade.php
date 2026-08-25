<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penghuni - Reservasi Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold text-gray-800">🏠 Dashboard Penghuni</h1>
                <p class="text-sm text-gray-500">Area Penghuni Kos</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Welcome -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Selamat Datang, Penghuni!</h2>
            <p class="text-gray-600 mt-1">Anda login sebagai Penghuni Kos</p>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="bg-purple-100 rounded-full p-3">
                        <span class="text-purple-600 text-2xl">📋</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Reservasi Aktif</p>
                        <p class="text-2xl font-bold text-gray-800">0</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="bg-pink-100 rounded-full p-3">
                        <span class="text-pink-600 text-2xl">🏷️</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Status Kos</p>
                        <p class="text-2xl font-bold text-gray-800">-</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Tambahan -->
        <div class="mt-6 bg-white rounded-lg shadow-md p-6">
            <h3 class="font-semibold text-gray-700 mb-2">Informasi Sistem</h3>
            <ul class="text-sm text-gray-600 space-y-1">
                <li>✅ Anda login sebagai Penghuni</li>
                <li>📅 Tanggal: {{ date('d-m-Y H:i:s') }}</li>
                <li>🔒 Login berhasil dengan role: Penghuni</li>
            </ul>
        </div>
    </div>
</body>
</html>