@extends('layouts.mainLayout')

@section('title', 'Articles')

@section('body_title', 'Liste des Articles')
@section('body')

@if(count($articles) == 0)
<p>No Article found</p>
@endif

@if (session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif

@foreach ($articles as $article )
    <div class='article-container' >
        <div>
            <h3>{{$article->title}}</h3>
            <form action="{{route('articles.delete', $article->id)}}" method="post" >
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
        </div>
        <p>Auteur : {{$article->user_id}}</p>
        <p>Publié le : {{$article->created_at}}</p>
        <div class="tag-container">
            @foreach ($article->tags as $tag )
            <div class="tag">{{$tag->name}}</div>
            @endforeach
        </div>
        <div>
            <img src="{{$article->image_url}}" alt="">
        </div>
        <div>
            <p>{{$article->content}}</p>
        </div>
    </div>

                
@endforeach

@endsection