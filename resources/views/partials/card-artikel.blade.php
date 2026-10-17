<div class="card h-100 border-0 rounded-4 shadow">
    <div class="card-body d-flex flex-column">
        <small class="text-muted mb-2">{{ $a->created_at->translatedFormat('d F Y') }}</small>
        <h5 class="card-title fw-bold">{{ $a->nama_artikel }}</h5>
        <p class="card-text text-secondary">{{ Str::limit(strip_tags($a->keterangan), 110) }}</p>
        <a href="{{ route('artikel.detail', $a) }}" class="mt-auto fw-semibold text-orange text-decoration-none">Baca selengkapnya →</a>
    </div>
</div>