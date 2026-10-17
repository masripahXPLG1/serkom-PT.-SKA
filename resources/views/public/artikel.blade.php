@extends('layouts.public')
@section('title', 'Artikel & Informasi')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold artikel-heading">Artikel & Informasi</h2>
        </div>

        @include('partials.artikel-list')

        <div class="mt-4">{{ $artikels->links() }}</div>
    </div>
</section>
@endsection