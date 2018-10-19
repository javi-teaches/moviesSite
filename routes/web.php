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

// Route::get('/', function () {
//    return view('index');
// });
//
// Route::get('/genres', function () {
// 	$genres = DB::table('genres')->get();
//    return view('genres.index')->with(compact('genres'));
// });

Route::get('/movies', 'MoviesController@index');
Route::get('/movies/create', 'MoviesController@create');
Route::get('/movies/{id}', 'MoviesController@show');
Route::post('/movies/store', 'MoviesController@store');
