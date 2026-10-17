@extends('layouts.admin')
@section('title', 'Detail Produk')
@section('content')
<div class="card shadow-sm">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $produk->foto) }}" class="img-fluid rounded-start w-100" alt="{{ $produk->judul }}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h4>{{ $produk->judul }}</h4>
                <span class="badge bg-primary mb-3">{{ $produk->kategori }}</span>
                <p>{!! nl2br(e($produk->keterangan)) !!}</p>
                <small class="text-muted">Dibuat: {{ $produk->created_at->format('d M Y H:i') }}</small>
                <div class="mt-3">
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('admin.produk.edit', $produk) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection