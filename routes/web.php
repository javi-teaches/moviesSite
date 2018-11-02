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

   return view('home');
});
//
// Route::get('/genres', function () {
// 	$genres = DB::table('genres')->get();
//    return view('genres.index')->with(compact('genres'));
// });


// Requieren autenticacion
Route::middleware('auth')->group(function() {
	Route::get('/movies/create', 'MoviesController@create')
			->name('movies.create');

});


// No requieren autenticacion
Route::resource('movies', 'MoviesController')->except('create');


// Route::get('/movies', 'MoviesController@index')->name('movies.index');
// Route::get('/movies/create', 'MoviesController@create')->name('movies.create');
// Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');
// Route::post('/movies/store', 'MoviesController@store')->name('movies.store');
// Route::delete('/movies/{id}', 'MoviesController@destroy')->name('movies.delete');
// Route::get('/movies/{id}/edit', 'MoviesController@edit')->name('movies.edit');
// Route::put('/movies/{id}', 'MoviesController@update')->name('movies.update');

// Route::resource('actors', 'ActorsController');
Route::get('/actors/search', 'ActorsController@search')->name('actors.search');
Route::get('/actors/result/', 'ActorsController@result')->name('actors.result');

// Route::get('/genres', 'GenresController@index');

//
// Route::get('/testCollection', function (){
// 	$movies = \App\Movie::all('title', 'rating');
//
// 	$movies->push(['title' => 'ultima peli insertada']);
//
// 	$nuevaVariable = $movies->implode('title', ' - ');
//
// 	$myArray = [
// 		'nombre' => 'Javi',
// 		'apellido' => 'Herrera'
// 	];
//
// 	dd($movies->pluck('title')->sort());
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
