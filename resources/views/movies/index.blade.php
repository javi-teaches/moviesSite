@extends('layout.base')

@section('title', 'Movies')

@section('main_content')
	<h2>Listado de películas</h2>
	<ul>
	@foreach ($movies as $oneMovie)
		<li>{{ $oneMovie->getTitleAndRating() }}</li>
	@endforeach
	</ul>
@endsection
