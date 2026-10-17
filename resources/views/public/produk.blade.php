@extends('layouts.public')
@section('title', 'Produk & Layanan')
@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Produk & Layanan</h2>
        <div class="row g-4">
            @foreach ($produks as $p)
                <div class="col-md-6 col-lg-4">@include('partials.card-produk')</div>
            @endforeach
        </div>
        <div class="mt-4">{{ $produks->links() }}</div>
    </div>
</section>
@endsection