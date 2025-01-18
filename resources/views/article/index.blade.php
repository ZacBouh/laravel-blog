@extends('layouts.mainLayout')

@section('title', 'Articles')

@section('body_title', '')
@section('body')

@if(count($articles) == 0)
<p>No Article found</p>
@endif

@if (session('success'))
    <p class="alert alert-success">{{session('success')}}</p>
@endif
<div style="display : flex; flex-direction: column; margin-bottom: 54px;">
    <div style="display: flex; width: 100%; gap: 1em; padding: 1em 0;  margin-top: 16px;">
        @include('component.tag.filterBar', ['tags' => $tags])
        @include('component.searchBar')
    </div>
    <div class='top-separator' style="height: 32px; border-bottom: 1px solid black; width: 90%; margin: 0 5%;" ></div>
</div>
<div style="display: flex; flex-direction: column; gap: 128px;" >
    @foreach ($articles as $article )
        <div class='card' style="width: 100%; overflow: hidden; max-height: 100%;" >
            <div style="background-image: url({{$article->image_url}}); background-size: cover; background-position: center; height: 300px;">
                {{-- <img class="card-img-top" src="{{$article->image_url}}" alt="image de l'article {{$article->title}}"> --}}
            </div>
            <div class="article-card-header "  >
                <div class="title-bar " style="display: flex; justify-content: space-between;  padding : 0.5em 1em; padding-top: 1em;">
                    <h3 class="article-title" >{{$article->title}}</h3>
                    <div class="card-action-buttons" style="display: flex; gap: 0.5em;">
        
                        <a href="{{ route('articles.edit', $article->id)}}"><button class="btn bg-custom bg-custom-button" ><i class="fa-solid fa-pen-to-square"></i></button></a>
                        <form action="{{route('articles.delete', $article->id)}}" method="post" >
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                <div class="bg-custom color-custom-primary" style="display: flex; justify-content: start; gap: 15px; width: 100%; height: 30px; padding-left: 1em; padding-top: 2px;" >
                    <p class="card-text"><small><i class="fa-solid fa-user"></i> {{$article->user->name}}</small></p>
                    <p class="card-text"><small><i class="fa-solid fa-calendar-days"></i> {{$article->created_at->format('d-m-Y')}} </small></p>
                    <p class="card-text"><small><i class="fa-solid fa-clock"></i> {{$article->created_at->format('H:i')}} </small></p>
                </div>
                <div class="tag-container " style="background: white; text-align: right;" >
                    @foreach ($article->tags as $tag )
                    <div class="badge bg-badge "> {{$tag->name}}</div>
                    @endforeach
                </div>
                <div class="separator" ></div>
            </div>
            <div>
            </div>
            <div class="article-container" style="display: flex; flex-direction: column; " >
                <div style="max-height: 100px;  text-overflow: ellipsis;" >
                    <p style=" display: block; padding: 10px; text-align: justify; " >{{$article->content}}</p>
                </div>
                <a href="{{ route('articles.show', $article->id) }}"  style="text-decoration: none;" >
                <div class="read-more" style="background: linear-gradient(to top, white 25%, transparent); height: 90px; display: flex; justify-content: center; align-items: end;">
                    <strong class="color-custom-primary" style="font-size: 1.3em;" >Lire la suite</strong> 
                </div>
                </a>
            </div> 
        </div>
                    
    @endforeach

</div>

@endsection