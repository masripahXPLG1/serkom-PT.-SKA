@extends('layouts.public')
@section('title', 'Galeri Kegiatan')
@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Galeri Kegiatan</h2>
        <div class="row g-4">
            @foreach ($galeris as $g)
                <div class="col-md-6 col-lg-4">@include('partials.card-galeri')</div>
            @endforeach
        </div>
        <div class="mt-4">{{ $galeris->links() }}</div>
    </div>
</section>
@endsection