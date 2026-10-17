{{-- Kartu (klik untuk membuka pop up) --}}
<div class="card h-100 border-0 rounded-4 shadow overflow-hidden card-klik"
     role="button" tabindex="0"
     data-bs-toggle="modal" data-bs-target="#produkModal{{ $p->id }}">
    <div class="img-produk-wrap">
        <img src="{{ asset('storage/' . $p->foto) }}" class="img-produk" alt="{{ $p->judul }}">
    </div>
    <div class="card-body">
        <span class="badge badge-orange mb-2">{{ $p->kategori }}</span>
        <h5 class="card-title fw-bold">{{ $p->judul }}</h5>
        <p class="card-text text-secondary mb-2">{{ Str::limit($p->keterangan, 100) }}</p>
        <span class="text-orange fw-semibold small">Lihat detail <i class="bi bi-arrow-right"></i></span>
    </div>
</div>

{{-- Pop up detail --}}
<div class="modal fade" id="produkModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-4 overflow-hidden">
            <div class="modal-header border-0 pb-0">
                <span class="badge badge-orange">{{ $p->kategori }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="img-modal-wrap mb-3">
                    <img src="{{ asset('storage/' . $p->foto) }}" class="img-modal" alt="{{ $p->judul }}">
                </div>
                <h4 class="fw-bold">{{ $p->judul }}</h4>
                <p class="text-secondary mb-0">{!! nl2br(e($p->keterangan)) !!}</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-orange" data-bs-dismiss="modal">Tutup</button>
                <a href="{{ $instagram }}" target="_blank" rel="noopener" class="btn btn-orange">
                    <i class="bi bi-instagram me-1"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</div>