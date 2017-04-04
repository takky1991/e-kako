<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
		'user_id',
		'category_id',
		'promo_image_id',
		'title',
		'intro',
		'content',
		'public'
	];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
