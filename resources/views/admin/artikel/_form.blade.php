@csrf
<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Nama Artikel</label>
            <input type="text" name="nama_artikel" class="form-control @error('nama_artikel') is-invalid @enderror"
                   value="{{ old('nama_artikel', $artikel->nama_artikel ?? '') }}">
            @error('nama_artikel') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" rows="8" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $artikel->keterangan ?? '') }}</textarea>
            @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</div>