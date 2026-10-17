@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('content')
<h4 class="mb-3">Tambah Produk Aplikasi & Website</h4>
<form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
    @include('admin.produk._form')
</form>
@endsection