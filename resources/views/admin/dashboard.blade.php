@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

{{-- ===== Banner sambutan ===== --}}
<div class="welcome-banner mb-4">
    <div class="position-relative" style="z-index:1">
        <small class="opacity-75">{{ now()->translatedFormat('l, d F Y') }}</small>
        <h3 class="fw-bold mt-1 mb-1">Selamat datang, {{ auth()->user()->name }}!</h3>
        <p class="mb-3 opacity-90">
            @if ($pesanBaru)
                Ada <strong>{{ $pesanBaru }} pesan baru</strong> yang belum Anda baca.
            @else
                Semua pesan sudah dibaca. Tidak ada pesan baru.
            @endif
        </p>
        <a href="{{ route('admin.pesan.index') }}" class="btn-banner"><i class="bi bi-envelope-open me-1"></i> Buka Pesan Masuk</a>
    </div>
</div>

{{-- ===== Statistik ===== --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-pro">
            <div>
                <div class="lbl">Produk & Aplikasi</div>
                <div class="num my-1">{{ $totalProduk }}</div>
                <a href="{{ route('admin.produk.index') }}" class="stat-link">Kelola <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="stat-ico ico-orange"><i class="bi bi-box-seam"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-pro">
            <div>
                <div class="lbl">Artikel & Informasi</div>
                <div class="num my-1">{{ $totalArtikel }}</div>
                <a href="{{ route('admin.artikel.index') }}" class="stat-link">Kelola <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="stat-ico ico-amber"><i class="bi bi-newspaper"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-pro">
            <div>
                <div class="lbl">Foto Galeri</div>
                <div class="num my-1">{{ $totalGaleri }}</div>
                <a href="{{ route('admin.galeri.index') }}" class="stat-link">Kelola <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="stat-ico ico-green"><i class="bi bi-images"></i></div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-pro">
            <div>
                <div class="lbl">Total Pesan Masuk</div>
                <div class="num my-1">{{ $totalPesan }}</div>
                <a href="{{ route('admin.pesan.index') }}" class="stat-link">
                    @if ($pesanBaru) <span class="dot-baru me-1"></span>{{ $pesanBaru }} belum dibaca @else Lihat pesan <i class="bi bi-arrow-right"></i> @endif
                </a>
            </div>
            <div class="stat-ico ico-red"><i class="bi bi-envelope-paper"></i></div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">

    {{-- ===== Pesan terbaru ===== --}}
    <div class="col-lg-7">
        <div class="panel h-100">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fw-bold mb-0">Pesan Terbaru</h6>
                <a href="{{ route('admin.pesan.index') }}" class="small text-orange text-decoration-none">Lihat semua</a>
            </div>
            @forelse ($pesanTerbaru as $m)
                <a href="{{ route('admin.pesan.show', $m) }}" class="pesan-item">
                    <span class="avatar-sm">{{ strtoupper(substr($m->nama, 0, 1)) }}</span>
                    <div class="flex-grow-1 min-w-0">
                        <div class="d-flex justify-content-between gap-2">
                            <span class="fw-semibold">{{ $m->nama }} @unless($m->dibaca)<span class="dot-baru ms-1"></span>@endunless</span>
                            <small class="text-secondary text-nowrap">{{ $m->created_at->diffForHumans() }}</small>
                        </div>
                        <small class="text-secondary d-block text-truncate">{{ $m->pesan }}</small>
                    </div>
                </a>
            @empty
                <p class="text-muted small mb-0 mt-3">Belum ada pesan masuk.</p>
            @endforelse
        </div>
    </div>

    {{-- ===== Produk per kategori + aksi cepat ===== --}}
    <div class="col-lg-5">
        <div class="panel h-100">
            <h6 class="fw-bold mb-3">Produk per Kategori</h6>
            @foreach (\App\Models\Produk::KATEGORI as $k)
                @php
                    $jumlah = $perKategori[$k] ?? 0;
                    $persen = $totalProduk ? round($jumlah / $totalProduk * 100) : 0;
                @endphp
                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1">
                        <span>{{ $k }}</span><span class="fw-semibold">{{ $jumlah }}</span>
                    </div>
                    <div class="progress" style="height:8px">
                        <div class="progress-bar" style="width: {{ $persen }}%"></div>
                    </div>
                </div>
            @endforeach

            <h6 class="fw-bold mt-4 mb-2">Aksi Cepat</h6>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.produk.create') }}" class="quick-btn"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
                <a href="{{ route('admin.artikel.create') }}" class="quick-btn"><i class="bi bi-plus-circle"></i> Tambah Artikel</a>
                <a href="{{ route('admin.galeri.create') }}" class="quick-btn"><i class="bi bi-plus-circle"></i> Tambah Foto</a>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">

    {{-- ===== Produk terbaru ===== --}}
    <div class="col-lg-5">
        <div class="panel h-100">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fw-bold mb-0">Produk Terbaru</h6>
                <a href="{{ route('admin.produk.index') }}" class="small text-orange text-decoration-none">Lihat semua</a>
            </div>
            <table class="table align-middle mb-0">
                <tbody>
                @forelse ($produkTerbaru as $p)
                    <tr>
                        <td width="64"><img src="{{ asset('storage/' . $p->foto) }}" class="thumb-tabel" alt=""></td>
                        <td>
                            <div class="fw-semibold small">{{ Str::limit($p->judul, 34) }}</div>
                            <small class="text-secondary">{{ $p->created_at->translatedFormat('d M Y') }}</small>
                        </td>
                        <td class="text-end"><span class="badge bg-primary">{{ $p->kategori }}</span></td>
                    </tr>
                @empty
                    <tr><td class="text-muted">Belum ada produk.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===== Artikel terbaru ===== --}}
    <div class="col-lg-4">
        <div class="panel h-100">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="fw-bold mb-0">Artikel Terbaru</h6>
                <a href="{{ route('admin.artikel.index') }}" class="small text-orange text-decoration-none">Lihat semua</a>
            </div>
            @forelse ($artikelTerbaru as $a)
                <div class="aktivitas">
                    <span class="aktivitas-ikon"><i class="bi bi-newspaper"></i></span>
                    <div>
                        <div class="fw-semibold small">{{ Str::limit($a->nama_artikel, 40) }}</div>
                        <small class="text-secondary">{{ $a->created_at->translatedFormat('d M Y') }}</small>
                    </div>
                </div>
            @empty
                <small class="text-muted">Belum ada artikel.</small>
            @endforelse
        </div>
    </div>

    {{-- ===== Galeri terbaru ===== --}}
    <div class="col-lg-3">
        <div class="panel h-100">
            <h6 class="fw-bold mb-3">Galeri Terbaru</h6>
            <div class="galeri-grid">
                @forelse ($galeriTerbaru as $g)
                    <img src="{{ asset('storage/' . $g->foto) }}" alt="Foto galeri">
                @empty
                    <small class="text-muted">Belum ada foto.</small>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection