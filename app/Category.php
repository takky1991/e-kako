<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
	protected $fillable = [
		'name',
		'slug',
		'description'
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function activePosts()
	{
		return $this->posts()->wherePublic(true)->get();
	}

	public function scopeWhereHasPosts($query)
	{
		return $query->whereHas('posts', function($query) {
			$query->where('public', true);
		});
	}

	public function latestThreeActivePosts()
	{
		return $this->posts()->wherePublic(true)->latest()->limit(3)->get();
	}

	public function latestSixActivePosts()
	{
		return $this->posts()->wherePublic(true)->latest()->limit(6)->get();
	}
}
