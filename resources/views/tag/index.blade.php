@extends('layouts.mainLayout')

@section('title', 'Tags')

@section('body_title', 'Liste des Tags')

@section('body')

@foreach ( $tags as $tag )
    
    <div>
        <div>
            <h3>{{ $tag->name }}</h3>
            <div>
                <a href="{{ route('tags.edit', $tag->id) }}">edit</a>
                <a href="{{ route('tags.delete', $tag->id) }}">delete</a>
            </div>
        </div>
        <p>{{ $tag->description}}</p>
        <img src="{{ $tag->image_url }}" alt="tag image">
    </div>

@endforeach

@endsection