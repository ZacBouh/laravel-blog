@extends('layouts.mainLayout')

@section('title', 'Tags')

@section('body_title', 'Liste des Tags')

@section('body')

@foreach ( $tags as $tag )
    
    <div>
        <h3>{{ $tag->name }}</h3>
        <p>{{ $tag->description}}</p>
    </div>

@endforeach

@endsection