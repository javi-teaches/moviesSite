@extends('layout.base')

@section('title', 'Genres')

@section('main_content')
	<h2>Listado de géneros</h2>
	<ul>
	@foreach ($genres as $oneGenre)
		<li>
			{{ $oneGenre->name }}
			<ul>
				@forelse ($oneGenre->movies as $movie)
					<li>{{ $movie->title }}</li>
				@empty
					<li><b>No hay películas relacionadas</b></li>
				@endforelse
			</ul>
		</li>
	@endforeach
	</ul>
@endsection
