@extends('layout.base')

@section('title', 'Genres')

@section('main_content')
	<h2>Listado de géneros</h2>
	<ul>
	@foreach ($genres as $oneGenre)
		<li>{{ $oneGenre->name }}</li>
	@endforeach
	</ul>
@endsection
