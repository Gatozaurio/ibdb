<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','user_id', 'slug', 'author', 'description'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
