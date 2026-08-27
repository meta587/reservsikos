<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Reservasi Kos</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    @vite(['resources/css/app.css']) <!-- jika pakai Vite -->
    <style>
        /* sama seperti kode CSS sebelumnya, bisa disimpan di file terpisah */
        /* Saya singkat di sini, tapi Anda bisa copy-paste CSS dari kode sebelumnya */
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Inter',sans-serif; background:#f4f7fc; min-height:100vh; display:flex; align-items:center; justify-content:center; padding:1.5rem; }
        .login-card { background:#fff; border-radius:28px; box-shadow:0 20px 60px rgba(0,20,40,0.08); padding:2.5rem 2.8rem 2rem; max-width:420px; width:100%; }
        ... (salin semua CSS dari jawaban sebelumnya) ...
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="logo-icon"><i class="fas fa-home"></i></div>
            <h1>Login</h1>
            <span class="subtitle"><i class="fas fa-building"></i> Reservasi Kos</span>
        </div>

        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" placeholder="Masukan email" value="{{ old('email') }}" required autofocus />
                </div>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Masukan password" required />
                    <button type="button" class="toggle-password" id="togglePassword" aria-label="Tampilkan password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="form-options">
                <a href="#">Lupa password?</a>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> LOGIN
            </button>
        </form>

        <div class="login-footer">
            <i class="fas fa-circle"></i>
            &copy; 2025 reservasi kos
            <i class="fas fa-circle"></i>
        </div>
    </div>

    <script>
        // Toggle password (sama seperti sebelumnya)
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        toggleBtn.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>