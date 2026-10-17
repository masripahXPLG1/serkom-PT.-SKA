@extends('layouts.admin')
@section('title', 'Tambah Galeri')
@section('content')
<h4 class="mb-3">Tambah Galeri</h4>
<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
    @include('admin.galeri._form')
</form>
@endsection