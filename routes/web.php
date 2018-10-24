<?php

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return redirect('/movies');
});
//
// Route::get('/genres', function () {
// 	$genres = DB::table('genres')->get();
//    return view('genres.index')->with(compact('genres'));
// });

Route::get('/movies', 'MoviesController@index');
Route::get('/movies/create', 'MoviesController@create');
Route::get('/movies/{id}', 'MoviesController@show');
Route::post('/movies/store', 'MoviesController@store');
Route::delete('/movies/{id}', 'MoviesController@destroy');
Route::get('/movies/{id}/edit', 'MoviesController@edit');
Route::put('/movies/{id}', 'MoviesController@update');

Route::get('/actors', 'ActorsController@index');
Route::get('/actors/search', 'ActorsController@search');
Route::get('/actors/result/', 'ActorsController@result');

Route::get('/genres', 'GenresController@index');


Route::get('/testCollection', function (){
	$movies = \App\Movie::all('title', 'rating');

	$movies->push(['title' => 'ultima peli insertada']);

	$nuevaVariable = $movies->implode('title', ' - ');

	$myArray = [
		'nombre' => 'Javi',
		'apellido' => 'Herrera'
	];

	dd($movies->pluck('title')->sort());
});
