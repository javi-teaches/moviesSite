@extends('layout.base')

@section('title', 'Actors')

@section('main_content')
	<h2>Find an actor</h2>
	<form action="/actors/result" method="get">
		<div class="form-group">
			<input type="text" name="searchActor" class="from-control">
			<button type="submit" class="btn btn-info">Buscar</button>
		</div>
	</form>
@endsection
