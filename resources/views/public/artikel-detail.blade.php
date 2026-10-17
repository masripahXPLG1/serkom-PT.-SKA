@extends('layouts.public')
@section('title', $artikel->nama_artikel)
@section('content')
<section class="py-5">
    <div class="container" style="max-width:800px">
        <a href="{{ route('artikel.public') }}" class="text-decoration-none">← Kembali</a>
        <h2 class="fw-bold mt-3">{{ $artikel->nama_artikel }}</h2>
        <small class="text-muted">{{ $artikel->created_at->translatedFormat('d F Y') }}</small>
        <hr>
        <div>{!! nl2br(e($artikel->keterangan)) !!}</div>
    </div>
</section>
@endsection