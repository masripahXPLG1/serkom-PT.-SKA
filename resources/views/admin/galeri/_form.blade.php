@csrf
<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            @isset($galeri)
                <img src="{{ asset('storage/' . $galeri->foto) }}" class="img-thumbnail mt-2" width="200" alt="">
                <div class="form-text">Kosongkan jika tidak ingin mengganti foto.</div>
            @endisset
        </div>
        <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</div>