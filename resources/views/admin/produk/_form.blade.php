@csrf
<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
            @isset($produk)
                <img src="{{ asset('storage/' . $produk->foto) }}" class="img-thumbnail mt-2" width="150" alt="">
                <div class="form-text">Kosongkan jika tidak ingin mengganti foto.</div>
            @endisset
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach (\App\Models\Produk::KATEGORI as $k)
                    <option value="{{ $k }}" @selected(old('kategori', $produk->kategori ?? '') == $k)>{{ $k }}</option>
                @endforeach
            </select>
            @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                   value="{{ old('judul', $produk->judul ?? '') }}">
            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" rows="5" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $produk->keterangan ?? '') }}</textarea>
            @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</div>