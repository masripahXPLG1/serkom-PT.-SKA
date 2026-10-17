@extends('layouts.admin')
@section('title', 'Detail Galeri')
@section('content')
<div class="card shadow-sm" style="max-width:700px">
    <img src="{{ asset('storage/' . $galeri->foto) }}" class="card-img-top" alt="Foto galeri">
    <div class="card-body">
        <small class="text-muted">Dibuat: {{ $galeri->created_at->format('d M Y H:i') }}</small>
        <div class="mt-3">
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection