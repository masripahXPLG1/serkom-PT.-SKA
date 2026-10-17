<div class="card h-100 border-0 rounded-4 shadow overflow-hidden">
<img src="{{ asset('storage/' . $g->foto) }}" class="img-fluid rounded-4 shadow-sm w-100 img-galeri" alt="Foto galeri">    <div class="card-body">
        <span class="badge badge-orange mb-2">{{ $g->kategori }}</span>
        <h6 class="card-title fw-bold mb-0">{{ $g->judul_kegiatan }}</h6>
    </div>
</div>