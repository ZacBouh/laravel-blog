@extends('layouts.mainLayout')

@section('title', 'Articles')

@section('body')

<h1>Index</h1>

@if('count($articles) == 0')
<p>No Article found</p>
@endif

@endsection