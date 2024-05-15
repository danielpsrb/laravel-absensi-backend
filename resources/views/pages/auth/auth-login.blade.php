@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Welcome, Admin Dashboard</h4>
        </div>

        <div class="card-body">
            <form method="POST"
                action="{{ route('login') }}"
                class="needs-validation"
                novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" name="email" tabindex="1" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="invalid-feedback">
                        Please Fill in your Email
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password"
                            class="control-label">
                            Password
                        </label>

                    </div>
                    <div class="input-group position-relative">
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        <span class="input-group-text">
                            <img src="{{ asset('img/eye.png') }}" width="20" id="togglePassword" class="password-toggle" style="cursor: pointer" onclick="togglePasswordVisibility()">
                        </span>
                        <div class="invalid-feedback">
                            Please Fill in your Password
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 d-flex justify-content-between"">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                            name="remember"
                            class="custom-control-input"
                            tabindex="3"
                            id="remember-me">
                        <label class="custom-control-label"
                            for="remember-me">Remember Me</label>
                    </div>
                    <div>
                        <a href="{{ route('password.request') }}"
                            class="text-small">
                            Forgot Password?
                            </a>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
        <div class="text-muted mt-15 text-center">
            Don't have an account ? <a href="{{route('register')}}">Signup Now</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleButton = document.getElementById("togglePassword");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.src = "{{ asset('img/eye-hide.png') }}"; // Mengubah gambar menjadi ikon mata tersembunyi
            } else {
                passwordField.type = "password";
                toggleButton.src = "{{ asset('img/eye.png') }}"; // Mengubah gambar kembali menjadi ikon mata biasa
            }
        }
    </script>
@endpush
