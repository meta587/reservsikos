@extends('layouts.auth')

@section('title', 'Login | Reservasi Kos')

@section('content')

<div class="container mt-4">

    <div class="card mx-auto border-0 shadow-sm" style="max-width: 580px;">

        <div class="card-body px-5 py-4">

            <div class="text-center mb-5">

                <div class="mb-2">
                    <i class="bi bi-house-door-fill"
                       style="font-size: 100px; color: #dce3ff;">
                    </i>
                </div>

                <h3 class="fw-bold">
                    Reservasi Kos
                </h3>

            </div>

            <form method="POST" action="{{ route('admin.login') }}">

                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold fs-5">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control bg-light border-0 py-2"
                        placeholder="Masukan email"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold fs-5">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control bg-light border-0 py-2"
                        placeholder="Masukan password"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="btn btn-primary w-100 py-2">
                    LOGIN
                </button>

            </form>

            <div class="text-center text-secondary mt-4">
                <small>© 2025 reservasi kos</small>
            </div>

        </div>

    </div>

</div>

@endsection