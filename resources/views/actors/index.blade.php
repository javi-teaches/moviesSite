@extends('layout.base')

@section('title', 'Actors')

@section('main_content')
	<h2>Listado de actores - Total ({{ count($actors) }})</h2>

	<ul>
	@foreach ($actors as $actor)
		<li style="padding: 10px 0;">
			<b> {{ $actor->getFullName() }} </b>
			@foreach ($actor->movies as $movie)
				<br><em>{{ $movie->title }}</em>
			@endforeach
		</li>
	@endforeach
	</ul>


@endsection
