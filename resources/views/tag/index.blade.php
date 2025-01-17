@extends('layouts.mainLayout')

@section('title', 'Tags')

@section('body_title', 'Liste des Tags')

@section('body')

@if (session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif

@foreach ( $tags as $tag )
    
    <div>
        <div>
            <h3>{{ $tag->name }}</h3>
            <div>
                <a href="{{ route('tags.edit', $tag->id) }}">
                    <button>edit</button>
                </a>
                <form action="{{ route('tags.delete', $tag->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>delete</button>
                </form>
            </div>
        </div>
        <p>{{ $tag->description}}</p>
        <img src="{{ $tag->image_url }}" alt="tag image">
    </div>

@endforeach

@endsection