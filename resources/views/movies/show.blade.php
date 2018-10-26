@extends('layout.base')

@section('title', 'Movies')

@section('main_content')
	<h2>{{ $movie->title }}</h2>
	@if ( session('errorDeleted') )
		<div class="alert alert-danger">
		  {{ session('errorDeleted') }}
		</div>
	@endif
	<p><b>Length:</b> {{ $movie->length ?? 'Sin duración' }}</p>
	<p><b>Rating:</b> {{ $movie->rating }}</p>
	<p><b>Awards:</b> {{ $movie->awards }}</p>
	<p><b>Genre:</b> {{ $movie->genre ? $movie->genre->name : 'Sin género'}}</p>
	<img src="/storage/posters/{{ $movie->poster }}" width="200">
	<hr>
	<a href="/movies" class="btn btn-info">volver</a>
	<a href="/movies/{{ $movie->id }}/edit" class="btn btn-warning">actualizar</a>
	<form action="{{ route('movies.destroy', $movie->id) }}" method="post" style="display: inline-block;">
		@csrf
		{{ method_field('DELETE') }}
		<button type="submit" class="btn btn-danger">borrar</button>
	</form>
@endsection
