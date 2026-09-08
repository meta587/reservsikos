@extends('layouts.auth')

@section('title','Login | Reservasi Kos')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">

                                <div class="text-center mb-5">

                                    <div class="mb-2">
                                        <i class="bi bi-house-door-fill"
                                           style="font-size: 100px; color: #dce3ff;">
                                        </i>
                                    </div>

                                    <h1 class="h4 text-gray-900 mb-4">
                                        Reservasi Kos
                                    </h1>

                                </div>

                                <form method="POST"
                                      action="{{ route('admin.login') }}"
                                      class="user">

                                    @csrf

                                    <div class="form-group mb-4">

                                        <label class="form-label fw-bold fs-5">
                                            Email
                                        </label>

                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}"
                                            placeholder="Masukan email"
                                            required
                                        >

                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-4">

                                        <label class="form-label fw-bold fs-5">
                                            Password
                                        </label>

                                      <div class="password-wrapper">
                                        <input 
                                                type="password" 
                                                name="password" 
                                                id="password" 
                                                class="form-control form-control-user @error('password') is-invalid @enderror" 
                                                placeholder="Masukan password" 
                                                required >
                                        <button type="button" id="togglePassword" class="toggle-password">
                                                👁️
                                        </button>
                                        </div>

                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                    <button
                                        type="submit"
                                        class="btn btn-primary btn-user btn-block w-100">

                                        LOGIN

                                    </button>

                                </form>

                                <div class="text-center text-secondary mt-4">
                                    <small>© 2025 reservasi kos</small>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection