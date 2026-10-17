@extends('layouts.admin')
@section('title', 'Edit Artikel')
@section('content')
<h4 class="mb-3">Edit Artikel</h4>
<form action="{{ route('admin.artikel.update', $artikel) }}" method="POST">
    @method('PUT')
    @include('admin.artikel._form')
</form>
@endsection