@extends('layouts.admin')
@section('title', 'Produk Aplikasi & Website')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Produk Aplikasi & Website</h4>
    <a href="{{ route('admin.produk.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
</div>
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th><th>Foto</th><th>Kategori</th><th>Judul</th><th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($produks as $p)
                <tr>
                    <td>{{ $produks->firstItem() + $loop->index }}</td>
                    <td><img src="{{ asset('storage/' . $p->foto) }}" width="70" height="50" class="rounded object-fit-cover" alt=""></td>
                    <td><span class="badge bg-primary">{{ $p->kategori }}</span></td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ Str::limit($p->keterangan, 60) }}</td>
                    <td class="text-center text-nowrap">@include('admin._aksi', ['route' => 'admin.produk', 'item' => $p])</td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $produks->links() }}</div>
@endsection