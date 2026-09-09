<div class="col-md-2">

    <div class="bg-primary text-white rounded-3 min-vh-100 p-3">

        <h5 class="mb-4">
            Reservasi Kos
        </h5>

        <div class="d-grid gap-2">

            {{-- DASHBOARD --}}
            <a href="{{ route('admin.dashboard') }}"
               class="btn {{ request()->routeIs('admin.dashboard') ? 'btn-light text-primary' : 'btn-primary text-white' }} text-start">
                🏠 Dashboard
            </a>

            {{-- KAMAR --}}
            <a href="{{ route('admin.kamar.index') }}"
               class="btn {{ request()->routeIs('admin.kamar.*') ? 'btn-light text-primary' : 'btn-primary text-white' }} text-start">
                ▣ Kamar
            </a>

            {{-- PENGHUNI --}}
            <a href="{{ route('admin.penghuni.index') }}"
               class="btn {{ request()->routeIs('admin.penghuni.*') ? 'btn-light text-primary' : 'btn-primary text-white' }} text-start">
                ♙ Penghuni
            </a>

            {{-- RESERVASI --}}
            <a href="{{ route('admin.reservasi.index') }}"
               class="btn {{ request()->routeIs('admin.reservasi.*') ? 'btn-light text-primary' : 'btn-primary text-white' }} text-start">
                ▣ Reservasi
            </a>

            {{-- PEMBAYARAN --}}
            <a href="{{ route('admin.pembayaran.index') }}"
               class="btn {{ request()->routeIs('admin.pembayaran.*') ? 'btn-light text-primary' : 'btn-primary text-white' }} text-start">
                ▣ Pembayaran
            </a>

        </div>

    </div>

</div>