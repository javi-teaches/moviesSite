@extends('layout.base')

@section('title', 'Movies')

@section('main_content')
	<h2>Editando película: {{ $movie->title }}</h2>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<form action="/movies/{{ $movie->id }}" method="post">
		@csrf
		{{ method_field('PUT') }}
		<div class="form-group">
			<label>Title:</label>
			<input type="text" name="title"
				class="form-control {{ $errors->has('title') ? 'is-invalid': '' }}"
				value="{{ old('title', $movie->title) }}"
			>
			<div class="invalid-feedback">
				{{ $errors->first('title') }}
			</div>
		</div>

		<div class="form-group">
			<label>Rating:</label>
			<input type="text" name="rating" class="form-control"
				value=" {{ old('rating', $movie->rating) }}"
			>
		</div>

		<div class="form-group">
			<label>Awards:</label>
			<input type="text" name="awards" class="form-control"
				value=" {{ old('awards', $movie->awards) }}"
			>
		</div>

		<div class="form-group">
			<label>Release: </label>
			<input type="date" name="release_date" class="form-control" value="{{ $movie->release_date->format('Y-m-d') }}">
		</div>

		<button type="submit" class="btn btn-success">CREAR</button>
	</form>
@endsection
