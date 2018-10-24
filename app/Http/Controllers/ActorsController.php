<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;

class ActorsController extends Controller
{
	public function index()
	{
		$actors = Actor::all();

		return view('actors.index')->with( compact('actors') );
	}

   public function search()
   {
   	return view('actors.search');
   }

	public function result(Request $request)
	{
		$queryString = $request->searchActor;

		$result = Actor::where('first_name', 'LIKE', "%$queryString%")
		->orWhere('last_name', 'LIKE', "%$queryString%")
		->get();

		return view('actors.results')->with( compact('result', 'queryString') );
	}
}
