<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	// protected $table = 'peliculas';

	// protected $guarded = [];

	// protected $fillable = ['title', 'rating', 'awards', 'length'];

	public function getTitleAndRating()
	{
		return $this->title . " " . $this->rating;
	}
}
