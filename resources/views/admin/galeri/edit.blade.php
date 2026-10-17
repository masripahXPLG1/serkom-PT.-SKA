@extends('layouts.admin')
@section('title', 'Edit Galeri')
@section('content')
<h4 class="mb-3">Edit Galeri</h4>
<form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.galeri._form')
</form>
@endsection