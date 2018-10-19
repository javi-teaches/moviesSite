<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;

class MoviesController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$movies = Movie::orderBy('title')->get();

		return view('movies.index')->with( compact('movies') );
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		return view('movies.form');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'rating' => 'required | numeric | max:10',
			'awards' => 'required | integer',
			'release_date' => 'required',
		], [
			'title.required' => 'El título es obligatorio',
			'rating.required' => 'El rating es obligatorio',
			'rating.numeric' => 'El rating debe ser un número',
			'rating.max' => 'El rating debe ser un número entre 0 y 10',
			'awards.required' => 'Los premios son obligatorios',
			'release_date.required' => 'La fecha de lanzamiento es obligatoria',
		]);

		Movie::create($request->all());

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
