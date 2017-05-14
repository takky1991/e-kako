<?php

namespace App;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;
    
    protected $fillable = [
		'user_id',
		'category_id',
		'featured_image_id',
		'title',
		'intro',
		'content',
		'public',
		'slug',
		'guest'
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

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function featuredImage()
	{
		return $this->belongsTo('App\UploadedImage');
	}

	public function featuredImageUrl()
	{
		if($this->featuredImage) {
			return Storage::disk('local')->url($this->featuredImage->featured_uri);
		}

		return asset('images/no-image.png');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function addComment($body)
	{
		$this->comments()->create([
			'user_id' => Auth::id(),
			'body' => $body
		]);
	}
}
