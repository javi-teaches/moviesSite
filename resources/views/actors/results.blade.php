@extends('layout.base')

@section('title', 'Actors Results')

@section('main_content')
	<h1>Actors results para la palabra: {{ $queryString }}</h1>
	{{-- {{ dd( app('request')->input('searchActor') ) }} --}}
	<ul>
	@forelse ($result as $actor)
		<li>{{ $actor->getFullName() }}</li>
	@empty
	<strong>No se encontraron resultados</strong>
	@endforelse
	</ul>
@endsection
