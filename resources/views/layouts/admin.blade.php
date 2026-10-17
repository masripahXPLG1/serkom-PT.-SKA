<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - Admin PT. SKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body class="admin-page">

<div class="d-lg-flex">

    {{-- ========== SIDEBAR ========== --}}
    <aside class="offcanvas-lg offcanvas-start admin-sidebar" tabindex="-1" id="sidebar">
        <div class="d-flex flex-column h-100 p-3 w-100">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-nav">
                    <div class="lh-sm">
                        <div class="fw-bold brand-ska">PT. SKA</div>
                        <small class="text-secondary">Panel Admin</small>
                    </div>
                </a>
                <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#sidebar" aria-label="Tutup"></button>
            </div>

            <nav class="nav flex-column gap-1">
                <a class="side-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a class="side-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}" href="{{ route('admin.profil.edit') }}">
                    <i class="bi bi-building"></i> Profil Perusahaan
                </a>
                <a class="side-link {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}" href="{{ route('admin.produk.index') }}">
                    <i class="bi bi-box-seam"></i> Produk Aplikasi & Website
                </a>
                <a class="side-link {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}" href="{{ route('admin.artikel.index') }}">
                    <i class="bi bi-newspaper"></i> Artikel
                </a>
                <a class="side-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}" href="{{ route('admin.galeri.index') }}">
                    <i class="bi bi-images"></i> Galeri
                </a>
                @php $belumDibaca = \App\Models\Pesan::where('dibaca', false)->count(); @endphp
<a class="side-link {{ request()->routeIs('admin.pesan.*') ? 'active' : '' }}" href="{{ route('admin.pesan.index') }}">
    <i class="bi bi-envelope"></i> Pesan Masuk
    @if ($belumDibaca)
        <span class="badge rounded-pill bg-danger ms-auto">{{ $belumDibaca }}</span>
    @endif
</a>
                <a class="side-link" href="{{ route('home') }}" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Website
                </a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="mt-auto pt-3">
                @csrf
                <button type="submit" class="side-link side-logout w-100 border-0 bg-transparent">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- ========== KONTEN ========== --}}
    <main class="admin-main flex-grow-1">

        <div class="admin-topbar d-flex align-items-center justify-content-between px-3 px-lg-4 py-3">
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-outline-secondary d-lg-none" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-label="Menu">
                    <i class="bi bi-list"></i>
                </button>
                <h5 class="mb-0 fw-bold">@yield('title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="avatar-admin">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                <div class="lh-sm d-none d-sm-block">
                    <div class="fw-semibold small">{{ auth()->user()->name }}</div>
                    <small class="text-secondary">Administrator</small>
                </div>
            </div>
        </div>

        <div class="p-3 p-lg-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>