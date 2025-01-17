@extends('layouts.mainLayout')

@section('title', 'Articles')

@section('body_title', 'Liste des Articles')
@section('body')

@if('count($articles) == 0')
<p>No Article found</p>
@endif

@endsection