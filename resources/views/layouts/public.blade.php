@php
    // Admin sudah login -> dashboard, selain itu -> halaman login
    $brandUrl = auth()->check() ? route('dashboard') : route('login');

    // Di landing page cukup "#profil"; di halaman lain arahkan ke home
    $base = request()->routeIs('home') ? '' : route('home');
@endphp


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PT. SKA')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-2">
    <div class="container">

        {{-- Brand versi HP (link rahasia login) --}}
        <a class="navbar-brand d-lg-none d-flex align-items-center gap-2" href="{{ $brandUrl }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo PT. SKA" class="logo-nav">
            <span class="fw-bold brand-ska">PT. SKA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <div class="row w-100 align-items-center g-2">

                {{-- Kiri: menu --}}
                <div class="col-lg-4">
                    <ul class="navbar-nav flex-lg-row gap-lg-1" id="menu-utama">
                        <li class="nav-item"><a class="nav-link" href="{{ $base }}#beranda">Beranda</a></li>                        <li class="nav-item"><a class="nav-link" href="{{ $base }}#produk">Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ $base }}#galeri">Galeri</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ $base }}#artikel">Artikel</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ $base }}#kontak">Kontak</a></li>
                    </ul>
                </div>

                {{-- Tengah: logo + nama (link rahasia login, desktop) --}}
                <div class="col-lg-4 text-center d-none d-lg-block">
                    <a class="navbar-brand m-0 d-inline-flex align-items-center gap-2" href="{{ $brandUrl }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo PT. SKA" class="logo-nav">
                        <span class="fw-bold fs-5 brand-ska">PT. SKA</span>
                    </a>
                </div>

                {{-- Kanan: tombol ke Instagram --}}
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ $instagram }}" target="_blank" rel="noopener" class="btn btn-orange">
                        <i class="bi bi-instagram me-1"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

@yield('content')

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/navbar.js') }}"></script>
<script src="{{ asset('js/galeri.js') }}"></script>
</body>
</html>