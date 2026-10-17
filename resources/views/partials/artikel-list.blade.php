@if ($artikels->count())
    <div class="artikel-list" id="artikelList">
        @foreach ($artikels as $a)
            <div class="artikel-item">

                {{-- Baris yang diklik --}}
                <div class="artikel-head collapsed" role="button" tabindex="0"
                     data-bs-toggle="collapse" data-bs-target="#artikel{{ $a->id }}"
                     aria-expanded="false" aria-controls="artikel{{ $a->id }}">
                    <div class="row align-items-center g-2 w-100 m-0">
                        <div class="col-md-4">
                            <h3 class="artikel-judul">{{ $a->nama_artikel }}</h3>
                        </div>
                        <div class="col-md-7">
                            <p class="artikel-ringkas mb-1">{{ Str::limit(strip_tags($a->keterangan), 120) }}</p>
                            <small class="text-muted">{{ $a->created_at->translatedFormat('d F Y') }}</small>
                        </div>
                        <div class="col-md-1 text-md-end">
                            <i class="bi bi-arrow-up-right artikel-ikon"></i>
                        </div>
                    </div>
                </div>

                {{-- Isi lengkap (terbuka saat diklik) --}}
                <div id="artikel{{ $a->id }}" class="collapse" data-bs-parent="#artikelList">
                    <div class="artikel-isi">{!! nl2br(e($a->keterangan)) !!}</div>
                </div>

            </div>
        @endforeach
    </div>
@else
    <p class="text-center text-muted">Belum ada artikel.</p>
@endif