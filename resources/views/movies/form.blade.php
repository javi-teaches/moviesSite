@extends('layout.base')

@section('title', 'Movies')

@section('main_content')
	<h2>Crear movie</h2>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<form action="/movies/store" method="post">
		@csrf
		<div class="form-group">
			<label>Title:</label>
			<input type="text" name="title" class="form-control" value="{{ old('title') }}">
		</div>

		<div class="form-group">
			<label>Rating:</label>
			<input type="text" name="rating" class="form-control" value="{{ old('rating') }}">
		</div>

		<div class="form-group">
			<label>Awards:</label>
			<input type="text" name="awards" class="form-control" value="{{ old('awards') }}">
		</div>

		<div class="form-group">
			<label>Release:</label>
			<input type="date" name="release_date" class="form-control" value="{{ old('release_date') }}">
		</div>

		<button type="submit" class="btn btn-success">CREAR</button>
	</form>
@endsection
