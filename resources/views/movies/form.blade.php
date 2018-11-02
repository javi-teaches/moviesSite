@extends('layouts.app')

@section('title', 'Movies')

@section('content')
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

	<form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
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
			<label>Image:</label>
			<div class="custom-file">
		    	<input type="file" class="custom-file-input" id="customFile" name="poster">
		    	<label class="custom-file-label" for="customFile">Choose file...</label>
		  	</div>
		</div>

		<div class="form-group">
			<label>Genre:</label>
			<select class="form-control" name="genre_id" value="{{ old('genre_id') }}">
					<option value="">Elegí</option>
				@foreach ($genres as $genre)
		      	<option
						value="{{ $genre->id }}"
						{{ $genre->id == old('genre_id') ? 'selected' : '' }}
					>
						{{ $genre->name }}
					</option>
		      @endforeach
		   </select>
		</div>

		<div class="form-group">
			<label>Release:</label>
			<input type="date" name="release_date" class="form-control" value="{{ old('release_date') }}">
		</div>

		<button type="submit" class="btn btn-success">CREAR</button>
	</form>
@endsection
