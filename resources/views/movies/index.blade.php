@extends('layouts.app')

@section('title', 'Movies')

@section('content')
	<h2>Listado de películas - Total ({{ $allMovies }}) - {{ $myTime->toDateTimeString() }}</h2>

	@if ( session('deleted') )
		<div class="alert alert-success">
		  {{ session('deleted') }}
		</div>
	@endif

	@if ( session('edited') )
		<div class="alert alert-success">
		  {{ session('edited') }}
		</div>
	@endif

	<br>
	<a href="/movies/create" class="btn btn-info btn-lg">crear movie</a>
	<a href="/apiMovies" class="btn btn-info btn-lg">crear movie with fetch</a>
	<br>
	<ul>
	@foreach ($movies as $oneMovie)
		<li style="padding: 10px 0;">
			<b>Title:</b> {{ $oneMovie->title }} |
			<b>Length</b>:{{ $oneMovie->length ?? 'Sin duración' }} |
			<b>Genre:</b> {{ $oneMovie->genre ? $oneMovie->genre->name : 'Sin género'  }}
			<a href="/movies/{{ $oneMovie->id }}" class="btn btn-success">ver detalle</a>
		</li>
	@endforeach
	</ul>

	{{ $movies->links() }}
@endsection
