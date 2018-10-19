@extends('layout.base')

@section('title', 'Movies')

@section('main_content')
	<h2>{{ $movie->title }}</h2>
	<p><b>Length:</b> {{ $movie->length ?? 'Sin duración' }}</p>
	<p><b>Rating:</b> {{ $movie->rating }}</p>
	<p><b>Awards:</b> {{ $movie->awards }}</p>
	<a href="/movies" class="btn btn-info">volver</a>
@endsection
