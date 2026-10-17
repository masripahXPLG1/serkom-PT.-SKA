@extends('layouts.auth')
@section('title', 'Login Admin')
@section('content')

<div class="auth-wrap">
    <div class="auth-card">

        <div class="text-center mb-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PT. SKA" class="auth-logo">
            </a>
            <h4 class="fw-bold mt-3 mb-1">Login Admin</h4>
            <p class="text-secondary small mb-0">Masuk untuk mengelola konten website.</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success py-2 small">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-envelope text-orange"></i></span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Masukkan email" required autofocus autocomplete="username">
                </div>
                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label small fw-semibold">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-lock text-orange"></i></span>
                    <input id="password" type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Masukkan kata sandi" required autocomplete="current-password">
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword" aria-label="Tampilkan kata sandi">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-orange w-100">
                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-secondary small text-decoration-none">
                <i class="bi bi-arrow-left"></i> Kembali ke website
            </a>
        </div>
    </div>
</div>

<script>
    // Tampilkan / sembunyikan kata sandi
    document.getElementById('togglePassword').addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon = this.querySelector('i');
        const show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
    });
</script>

@endsection