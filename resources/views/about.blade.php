@extends('layout.base')

@section('title', 'About Us')

@section('main_content')
	<ul>
		@foreach ($listado as $persona)
			<li>
				{{ $persona }}
				@unless ($persona !== 'Javi')
					<strong>Es el profe</strong>
				@endunless
			</li>
		@endforeach
	</ul>

	<ul>
		@forelse ($arrayVacio as $item)
			<li> {{ $item }} </li>
		@empty
			<li> <strong> Está vacío el array </strong>	</li>
		@endforelse
	</ul>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sedst laborum.</p>

	<img src="/images/hansolo.jpg" width="100">
	<img src="{{ asset('/images/hansolo.jpg') }}" width="100">

	<ul>
		<li>Item</li>
		<li>Item</li>
	</ul>
@endsection
