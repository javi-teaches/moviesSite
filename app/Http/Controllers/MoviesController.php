<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MoviesRequest;

use App\Movie;
use App\Genre;

class MoviesController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$myTime = \Carbon\Carbon::now('America/Argentina/Buenos_Aires');

		$movies = Movie::orderBy('title')->paginate(10);
		$allMovies = Movie::all()->count();

		return view('movies.index')->with( compact('movies', 'myTime', 'allMovies') );
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		$genres = Genre::orderBy('name')->get();

		return view('movies.form')->with(compact('genres'));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(MoviesRequest $request)
	{
		// Movie::create($request->all());

		$movie = new Movie;

		self::storeOrUpdate($movie, $request);

		return redirect('/movies');
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		$movie = Movie::findOrFail($id);

		return view('movies.show')->with(compact('movie'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		$movie = Movie::findOrFail($id);
		$genres = Genre::orderBy('name')->get();

		return view('movies.editForm')->with( compact('movie', 'genres') );
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(MoviesRequest $request, $id)
	{
		$movie = Movie::find($id);

		self::storeOrUpdate($movie, $request);

		return redirect('/movies')->with('edited', "Movie editada: $movie->title");
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
		try {
			$movie = Movie::findOrFail($id);
			$movie->delete();
			// Al hacer redirect se guarda en SESSION una posición deleted con el valor indicado
			return redirect('/movies')->with('deleted', 'Peli eliminada');
		} catch (\Exception $e) {
			return redirect('/movies/'.$id)->with('errorDeleted', 'No se pudo eliminar :(');
		}
	}

	public function storeOrUpdate($movie, $request)
	{
		$movie->title = $request->title;
		$movie->rating = $request->rating;
		$movie->awards = $request->awards;
		$movie->genre_id = $request->genre_id;
		$movie->release_date = $request->release_date;

		// Necesito el archivo en una variable esta vez
		$file = $request->file("poster");

		// Nombre final de la imagen
		$finalName = strtolower(str_replace(" ", "_", $request->input("title")));

		// Armo un nombre único para este archivo
		$name = $finalName . uniqid('_image_') . "." . $file->extension();

		// Guardo el archivo en la carpeta
		$file->storePubliclyAs("public/posters", $name);

		// Guardo en base de datos el nombre de la imagen
		$movie->poster = $name;
		$movie->save();
	}
}
