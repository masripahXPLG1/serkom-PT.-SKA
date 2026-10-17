@extends('layouts.admin')
@section('title', 'Galeri')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Galeri</h4>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Foto</a>
</div>
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr><th>No</th><th>Foto</th><th class="text-center">Aksi</th></tr>
            </thead>
            <tbody>
            @forelse ($galeris as $g)
                <tr>
                    <td>{{ $galeris->firstItem() + $loop->index }}</td>
                    <td><img src="{{ asset('storage/' . $g->foto) }}" width="90" height="60" class="rounded object-fit-cover" alt=""></td>
                    <td class="text-center text-nowrap">@include('admin._aksi', ['route' => 'admin.galeri', 'item' => $g])</td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center text-muted py-4">Belum ada data.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $galeris->links() }}</div>
@endsection