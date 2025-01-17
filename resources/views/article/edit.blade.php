@extends('layouts.mainLayout')

@push('script')
<script>
    $( '#tags' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
    } );
</script>
@endpush

@section('title', 'Article Edition')

@section('body_title', "Modification d'un Article")
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


<form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <label for="title">Titre</label>
    <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" >
    
    <select class="form-select" multiple id="tags" data-placeholder="Themes" name='tags[]'>
        @foreach ($tags as $tag )
            <option value="{{ $tag->id }}"
                {{ in_array($tag->id, old('tags', $article->tags->pluck('id')->toArray())) ? 'selected' : '' }}
                >{{ $tag->name }}</option>         
        @endforeach
    </select>


    <label for="content">Contenu</label>
    <textarea type="text" id="content" name="content"  >{{ old('content', $article->content) }}</textarea>    
    <label for="image">Image</label>
    <input type="file" id="image" name="image" >

    <button type="submit">Créer</button>
</form>

@endsection