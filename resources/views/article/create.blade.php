@extends('layouts.mainLayout')

@push('script')
<script>
    $( '#tags' ).select2();
</script>
@endpush

@section('title', 'Article Creation')

@section('body_title', "Nouvel Article")
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


<form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 32px; margin-top: 32px;" >
    @csrf
    @method('POST')
    <label style="margin-bottom: -24px" for="title">Titre</label>
    <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" >
    
    <label style="margin-bottom: -24px" for="tags">Tags</label>
    <select class="form-select" multiple id="tags" data-placeholder="Themes" name='tags[]'>
        @foreach ($tags as $tag )
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>

    <label style="margin-bottom: -24px" for="image">Image</label>
    <input class="form-control" type="file" id="image" name="image" >

    <label style="margin-bottom: -24px" for="content">Contenu</label>
    <textarea class="form-control" type="text" id="content" name="content"  rows="20" >{{ old('content') }}</textarea>    

    <button class="btn bg-custom-button" type="submit">Créer</button>
</form>

@endsection