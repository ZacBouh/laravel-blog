@extends('layouts.mainLayout')

@section('title', 'Articles')

@section('body')

<h2>Articles</h2>

@if('count($articles) == 0')
<p>No Article found</p>
@endif

@endsection