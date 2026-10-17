@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('content')
<h4 class="mb-3">Edit Produk Aplikasi & Website</h4>
<form action="{{ route('admin.produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.produk._form')
</form>
@endsection