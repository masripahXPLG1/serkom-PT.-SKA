@extends('layouts.public')
@section('title', 'PT Solusi Koneksi  - Company Profile')
@section('content')

{{-- ========== PROFIL / HERO ========== --}}
<header id="profil" class="hero-bg">
    <div class="container position-relative">
        <div class="row hero-row align-items-center">
            <div class="col-lg-7">
                <p class="hero-eyebrow">Solusi Koneksi & Software</p>
                <h1 class="hero-title">
                    Terhubung<br>Lebih Andal<span class="text-orange">.</span>
                </h1>
                <p class="hero-desc mt-3 mb-4">
                    PT. SKA (Solusi Koneksi Anda) membantu rancang apliaksi Anda sesuai kebutuhan, uji sebelum digunakan, dan dampingi setelah aplikasi berjalan
                </p>
                <a href="{{ $instagram }}" target="_blank" rel="noopener" class="btn btn-orange px-4">Jelajahi Kami</a>
                <a href="{{ route('profil') }}" class="btn btn-outline-dark-pill px-4 ms-1">Profil Kami</a>
            </div>
        </div>
    </div>
</header>

{{-- Produk (6 terbaru) --}}
<section id="produk" class="py-5">
    <div class="container">
<h2 class="fw-bold mb-1"><span class="judul-section">Produk Aplikasi & Website</span></h2>
<p class="text-secondary mb-0">Aplikasi dan website yang telah kami bangun.</p>        <div class="row g-4">
            @forelse ($produks as $p)
                <div class="col-md-6 col-lg-4">@include('partials.card-produk')</div>
            @empty
                <p class="text-center text-muted">Belum ada produk.</p>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('produk.public') }}" class="btn btn-outline-primary">Lihat Semua</a>
        </div>
    </div>
</section>

{{-- ========== GALERI (slider, 10 terbaru) ========== --}}
<section id="galeri" class="py-5 bg-orange-soft">
    <div class="container text-center mb-4">
        <h2 class="fw-bold text-orange mb-2">Galeri Kegiatan</h2>
        <div class="garis-judul"><span></span><span></span><span></span></div>
        <p class="text-secondary mt-3 mb-0">Temukan momen seru di balik kegiatan kami</p>
    </div>

    @if ($galeris->count())
        <div class="galeri-slider" id="galeriSlider">
            <div class="galeri-track">
                @foreach ($galeris as $g)
                    <div class="galeri-item">
                        <img src="{{ asset('storage/' . $g->foto) }}" alt="Foto galeri">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="galeri-kontrol d-flex justify-content-center align-items-center gap-3 mt-4">
            <button type="button" class="btn-panah" id="galeriPrev" aria-label="Sebelumnya"><i class="bi bi-arrow-left"></i></button>
            <div class="galeri-indikator" id="galeriIndikator"></div>
            <button type="button" class="btn-panah" id="galeriNext" aria-label="Berikutnya"><i class="bi bi-arrow-right"></i></button>
        </div>
    @else
        <p class="text-center text-muted">Belum ada galeri.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('galeri.public') }}" class="btn btn-outline-orange">Lihat Semua</a>
    </div>
</section>

{{-- ========== ARTIKEL (3 terbaru) ========== --}}
<section id="artikel" class="py-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
            <div>
                <h2 class="fw-bold mb-1"><span class="judul-section">Artikel & Informasi</span></h2>
                <p class="text-secondary mb-0">Informasi dan berita terkini.</p>
            </div>
            <a href="{{ route('artikel.public') }}" class="btn btn-outline-orange mt-3 mt-md-0">Lihat Semua</a>
        </div>

        @include('partials.artikel-list')
    </div>
</section>

@endsection