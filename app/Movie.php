<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	// protected $table = 'peliculas';

	// protected $guarded = [];

	protected $fillable = ['title', 'rating', 'awards', 'release_date'];

	protected $dates = ['release_date'];

	public function getTitleAndRating()
	{
		return $this->title . " " . $this->rating;
	}

	public function genre()
	{
		return $this->hasOne(Genre::class, 'id', 'genre_id');
	}
}
