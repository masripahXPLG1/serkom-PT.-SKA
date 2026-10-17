@extends('layouts.admin')
@section('title', 'Pesan Masuk')
@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-end mb-3">
    <div>
        <h4 class="fw-bold mb-1">Pesan Masuk</h4>
        <p class="text-secondary mb-0">Pesan yang dikirim pengunjung lewat formulir kontak.</p>
    </div>
    <span class="badge rounded-pill text-bg-light border mt-2 mt-md-0 px-3 py-2">
        Total: {{ $pesans->total() }} pesan
    </span>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table tabel-pro align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th><th>Pengirim</th><th>Pesan</th><th>Diterima</th><th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($pesans as $p)
                <tr>
                    <td>{{ $pesans->firstItem() + $loop->index }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span class="avatar-sm">{{ strtoupper(substr($p->nama, 0, 1)) }}</span>
                            <div class="lh-sm">
                                <div class="{{ $p->dibaca ? '' : 'fw-bold' }}">{{ $p->nama }}</div>
                                <small class="text-secondary">{{ $p->email }}</small>
                            </div>
                        </div>
                    </td>
                    <td class="{{ $p->dibaca ? 'text-secondary' : 'fw-semibold' }}">{{ Str::limit($p->pesan, 50) }}</td>
                    <td class="text-nowrap lh-sm">
                        {{ $p->created_at->translatedFormat('d M Y') }}<br>
                        <small class="text-secondary">{{ $p->created_at->format('H:i') }} WIB</small>
                    </td>
                    <td>
                        @if ($p->dibaca)
                            <span class="badge rounded-pill text-bg-secondary">Dibaca</span>
                        @else
                            <span class="badge rounded-pill bg-primary">Baru</span>
                        @endif
                    </td>
                    <td class="text-center text-nowrap">
                        <a href="{{ route('admin.pesan.show', $p) }}" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i> Show</a>
                        <form action="{{ route('admin.pesan.destroy', $p) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted py-5">Belum ada pesan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $pesans->links() }}</div>

@endsection