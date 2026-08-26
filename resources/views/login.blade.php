<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Reservasi Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <!-- Card Login -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Reservasi Kos</h1>
                <p class="text-gray-500 text-sm mt-1">Silahkan login untuk melanjutkan</p>
            </div>

            
            <!-- Pesan Error -->
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>❌ {{ session('error') }}</strong>
                </div>
            @endif

            <!-- Pesan Success -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <strong>✅ {{ session('success') }}</strong>
                </div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                
                <!-- Input Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="Masukkan email Anda"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                        required
                    >
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    >
                </div>

                <!-- Tombol Login -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200"
                >
                    LOGIN
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">© 2025 Reservasi Kos. All rights reserved.</p>
            </div>
        </div>

        <!-- Informasi Akun Demo -->
        <div class="mt-4 bg-blue-50 border border-blue-200 rounded-lg p-3">
            <p class="text-xs text-blue-800 text-center">
                <strong>Akun Demo:</strong><br>
                Admin: admin@kos.com / password123<br>
                Penghuni: penghuni@kos.com / password123
            </p>
        </div>
    </div>
</body>
</html>