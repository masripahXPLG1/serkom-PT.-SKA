@extends('layouts.public')
@section('title', 'Profil Kami - PT. SKA')
@section('content')

{{-- ========== HEADER ========== --}}
<header class="hero-bg hero-page">
    <div class="container position-relative">
        <div class="row hero-row align-items-center">
            <div class="col-lg-8">
                <p class="hero-eyebrow">Profil Kami</p>
                <h1 class="hero-title">
                    Mengenal<br>PT. SKA<span class="text-orange">.</span>
                </h1>
                <p class="hero-desc mt-3 mb-0">
                    Synergy &bull; Knowledge &bull; Action. Kami hadir untuk membantu bisnis
                    Anda terhubung, bertumbuh, dan siap menghadapi masa depan digital.
                </p>
            </div>
        </div>
    </div>
</header>

{{-- ========== SIAPA KAMI ========== --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3"><span class="judul-section">Siapa Kami</span></h2>
                @foreach (preg_split('/\R+/', trim($profil->siapa_kami)) as $paragraf)
    <p class="text-secondary {{ $loop->last ? 'mb-0' : '' }}">{{ $paragraf }}</p>
@endforeach
                <p class="text-secondary mb-0">
                    Dengan tim yang berpengalaman dan pendekatan yang berorientasi pada kebutuhan
                    pelanggan, kami berkomitmen menghadirkan layanan jaringan, fiber optic,
                    dan cloud server dengan kualitas terbaik.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row g-3 text-center">
                    <div class="col-4">
                        <div class="stat-box">
                            <h3 class="fw-bold text-orange mb-0">3</h3>
                            <small class="text-secondary">Layanan Utama</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-box">
                            <h3 class="fw-bold text-orange mb-0">24/7</h3>
                            <small class="text-secondary">Dukungan</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-box">
                            <h3 class="fw-bold text-orange mb-0">100%</h3>
                            <small class="text-secondary">Profesional</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== VISI & MISI ========== --}}
<section class="py-5 bg-orange-soft">
    <div class="container">
        <h2 class="fw-bold text-center mb-4"><span class="judul-section bg-white">Visi & Misi</span></h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 rounded-4 shadow">
                    <div class="card-body p-4">
                        <div class="icon-circle mb-3"><i class="bi bi-eye-fill"></i></div>
                        <h4 class="fw-bold">Visi</h4>
                        <p class="text-secondary mb-0">{!! nl2br(e($profil->visi)) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 rounded-4 shadow">
                    <div class="card-body p-4">
                        <div class="icon-circle mb-3"><i class="bi bi-bullseye"></i></div>
                        <h4 class="fw-bold">Misi</h4>
                        <ul class="text-secondary mb-0 ps-3">
    @foreach (preg_split('/\R+/', trim($profil->misi)) as $poin)
        <li>{{ $poin }}</li>
    @endforeach
</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== NILAI PERUSAHAAN ========== --}}
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-4"><span class="judul-section">Nilai Kami</span></h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 rounded-4 shadow text-center">
                    <div class="card-body p-4">
                        <div class="icon-circle mx-auto mb-3"><i class="bi bi-people-fill"></i></div>
                        <h5 class="fw-bold">Synergy</h5>
                        <p class="text-secondary mb-0">Bekerja sama dengan pelanggan dan mitra untuk hasil yang lebih besar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 rounded-4 shadow text-center">
                    <div class="card-body p-4">
                        <div class="icon-circle mx-auto mb-3"><i class="bi bi-lightbulb-fill"></i></div>
                        <h5 class="fw-bold">Knowledge</h5>
                        <p class="text-secondary mb-0">Mengandalkan keahlian dan pembelajaran berkelanjutan di bidang teknologi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 rounded-4 shadow text-center">
                    <div class="card-body p-4">
                        <div class="icon-circle mx-auto mb-3"><i class="bi bi-rocket-takeoff-fill"></i></div>
                        <h5 class="fw-bold">Action</h5>
                        <p class="text-secondary mb-0">Bergerak cepat dan tepat untuk mewujudkan solusi nyata.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== AJAKAN ========== --}}
<section class="pb-5">
    <div class="container">
        <div class="bg-orange-soft rounded-4 p-4 p-md-5 d-md-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold">Ingin tahu lebih banyak  kami?</h4>
                <p class="text-secondary mb-md-0">Ikuti Instagram kami atau hubungi lewat formulir kontak.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ $instagram }}" target="_blank" rel="noopener" class="btn btn-orange">
                    <i class="bi bi-instagram me-1"></i> Jelajahi Kami
                </a>
                <a href="{{ route('home') }}#kontak" class="btn btn-outline-orange ms-1">Kontak</a>
            </div>
        </div>
    </div>
</section>

@endsection