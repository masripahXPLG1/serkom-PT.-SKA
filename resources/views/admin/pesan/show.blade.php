@extends('layouts.admin')
@section('title', 'Detail Pesan')
@section('content')

<div class="card shadow-sm" style="max-width:720px">
    <div class="card-body p-4">
        <div class="mb-3">
            <small class="text-secondary">Nama</small>
            <div class="fw-semibold">{{ $pesan->nama }}</div>
        </div>
        <div class="mb-3">
            <small class="text-secondary">Email</small>
            <div><a href="mailto:{{ $pesan->email }}" class="text-orange">{{ $pesan->email }}</a></div>
        </div>
        <div class="mb-3">
            <small class="text-secondary">Dikirim</small>
            <div>{{ $pesan->created_at->translatedFormat('d F Y, H:i') }} WIB</div>
        </div>
        <div class="mb-4">
            <small class="text-secondary">Pesan</small>
            <div class="p-3 rounded-3 mt-1 bg-orange-soft">{!! nl2br(e($pesan->pesan)) !!}</div>
        </div>

        <a href="{{ route('admin.pesan.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="mailto:{{ $pesan->email }}" class="btn btn-primary"><i class="bi bi-reply"></i> Balas via Email</a>
    </div>
</div>

@endsection