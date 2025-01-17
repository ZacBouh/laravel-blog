@extends('layouts.mainLayout')

@section('title', 'Tag Creation')

@section('body_title', "Création d'un Tag")
@section('body')

@if(@session('success'))

    <p class="alert alert-success">{{ session('success') }}</p>

@endif

<form action="{{ route('tags.create') }}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('POST')
    <label for="name">Nom du tag</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" >
    
    <label for="description">Description</label>
    <input type="text" id="description" name="description" value="{{ old('description') }}" >

    <label for="image">Image associée</label>
    <input type="file" id="image" name="image" >

    <button type="submit">Créer</button>
</form>

@endsection