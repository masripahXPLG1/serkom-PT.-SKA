@extends('layouts.admin')
@section('title', 'Detail Artikel')
@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h4>{{ $artikel->nama_artikel }}</h4>
        <small class="text-muted">Dibuat: {{ $artikel->created_at->format('d M Y H:i') }}</small>
        <hr>
        <p>{!! nl2br(e($artikel->keterangan)) !!}</p>
        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('admin.artikel.edit', $artikel) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection