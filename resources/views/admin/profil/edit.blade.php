@extends('layouts.admin')
@section('title', 'Profil Perusahaan')
@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div>
        <h4 class="fw-bold mb-1">Profil Perusahaan</h4>
        <p class="text-secondary mb-0">Ubah teks Siapa Kami, Visi, dan Misi yang tampil di halaman Profil.</p>
    </div>
    <a href="{{ route('profil') }}" target="_blank" class="btn btn-outline-orange mt-3 mt-md-0">
        <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Halaman Profil
    </a>
</div>

<form action="{{ route('admin.profil.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="mb-4">
                <label class="form-label fw-semibold">Siapa Kami</label>
                <textarea name="siapa_kami" rows="7"
                          class="form-control @error('siapa_kami') is-invalid @enderror">{{ old('siapa_kami', $profil->siapa_kami) }}</textarea>
                <div class="form-text">Tekan Enter untuk membuat paragraf baru.</div>
                @error('siapa_kami') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Visi</label>
                <textarea name="visi" rows="3"
                          class="form-control @error('visi') is-invalid @enderror">{{ old('visi', $profil->visi) }}</textarea>
                @error('visi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Misi</label>
                <textarea name="misi" rows="6"
                          class="form-control @error('misi') is-invalid @enderror">{{ old('misi', $profil->misi) }}</textarea>
                <div class="form-text">Tulis <strong>satu poin per baris</strong> (tekan Enter untuk poin berikutnya).</div>
                @error('misi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
            <small class="text-muted ms-2">Terakhir diperbarui: {{ $profil->updated_at->translatedFormat('d F Y H:i') }}</small>
        </div>
    </div>
</form>

@endsection