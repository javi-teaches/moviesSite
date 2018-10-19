@extends('layout.base')

@section('title', 'Movies')

@section('main_content')
	<h2>Listado de películas</h2>
	<br>
	<a href="/movies/create" class="btn btn-info btn-lg">crear movie</a>
	<br>
	<ul>
	@foreach ($movies as $oneMovie)
		<li style="padding: 10px 0;">
			<b>Title:</b> {{ $oneMovie->title }} |
			<b>Length</b>:{{ $oneMovie->length ?? 'Sin duración' }}
			<a href="/movies/{{ $oneMovie->id }}" class="btn btn-success">ver detalle</a>
		</li>
	@endforeach
	</ul>
@endsection
