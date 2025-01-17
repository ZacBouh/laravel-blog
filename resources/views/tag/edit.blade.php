@extends('layouts.mainLayout')

@section('title', 'Tag Edit')

@section('body_title', 'Modifier le Tag')

@section('body')

@if (session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif

<form action="{{ route('tags.update', $tag->id) }}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <label for="name">Nom du tag</label>
    <input type="text" id="name" name="name" value="{{ old('name', $tag->name) }}" >
    
    <label for="description">Description</label>
    <input type="text" id="description" name="description" value="{{ old('description', $tag->description) }}" >

    <label for="image">Image associée</label>
    <input type="file" id="image" name="image"  >

    <button type="submit">Enregistrer</button>
</form>


@endsection