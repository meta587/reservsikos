<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('admin.dashboard') }}">

        <div class="sidebar-brand-icon">
            <i class="fas fa-home"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            RESERVASI KOS
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Kamar -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.kamar.index') }}">
            <i class="fas fa-fw fa-bed"></i>
            <span>Kamar</span>
        </a>
    </li>

    <!-- Nav Item - Penghuni -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.penghuni.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Penghuni</span>
        </a>
    </li>

    <!-- Nav Item - Reservasi -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.reservasi.index') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Reservasi</span>
        </a>
    </li>

    <!-- Nav Item - Pembayaran -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.pembayaran.index') }}">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Pembayaran</span>
        </a>
    </li>

</ul>