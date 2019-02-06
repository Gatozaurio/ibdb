<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','user_id','publisher_id', 'slug', 'description'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function publisher()
	{
		return $this->belongsTo(Publisher::class);
	}

	public function authors()
	{
		return $this->belongsToMany(Author::class);
	}
}
