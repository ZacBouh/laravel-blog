@extends('layouts.mainLayout')

@section('title', 'Contact')

@section('body_title', "Envoyer un message")
@section('body')

@if(@session('success'))

    <p class="alert alert-success">{{ session('success') }}</p>

@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() AS $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('messages.store') }}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('POST')
    <label for="name">Nom</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" >
    
    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="{{ old('email') }}" >
    
    <label for="subject">Sujet</label>
    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" >

    <label for="message">Message</label>
    <textarea type="text" id="message" name="message" >{{old('message')}}</textarea>

    <button type="submit">Créer</button>
</form>

@endsection