@extends('layouts.admin')
@section('title', 'Artikel')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Artikel / Informasi</h4>
    <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Artikel</a>
</div>
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>No</th><th>Nama Artikel</th><th>Keterangan</th><th class="text-center">Aksi</th></tr>
            </thead>
            <tbody>
            @forelse ($artikels as $a)
                <tr>
                    <td>{{ $artikels->firstItem() + $loop->index }}</td>
                    <td>{{ $a->nama_artikel }}</td>
                    <td>{{ Str::limit($a->keterangan, 80) }}</td>
                    <td class="text-center text-nowrap">@include('admin._aksi', ['route' => 'admin.artikel', 'item' => $a])</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted py-4">Belum ada data.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $artikels->links() }}</div>
@endsection