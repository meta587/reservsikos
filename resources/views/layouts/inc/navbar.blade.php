<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            @yield('page-title', 'Dashboard')
        </h2>

        <small class="text-secondary">
            🏠 Dashboard
            <span class="mx-2">›</span>
            @yield('page-title', 'Dashboard')
        </small>
    </div>

    {{-- PROFIL --}}
    <div class="dropdown">

        <button class="btn btn-light dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown">

            👤 {{ Auth::user()->name }}

        </button>

        <ul class="dropdown-menu dropdown-menu-end">

            <li>
                <a class="dropdown-item"
                   href="{{ route('admin.profil') }}">
                    Profil
                </a>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>

                <form method="POST"
                      action="{{ route('admin.logout') }}">

                    @csrf

                    <button type="submit"
                            class="dropdown-item text-danger">
                        Logout
                    </button>

                </form>

            </li>

        </ul>

    </div>

</div>