@extends('layouts.admin')
@section('title', 'Tambah Artikel')
@section('content')
<h4 class="mb-3">Tambah Artikel</h4>
<form action="{{ route('admin.artikel.store') }}" method="POST">
    @include('admin.artikel._form')
</form>
@endsection