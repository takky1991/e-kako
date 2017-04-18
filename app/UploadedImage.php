<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedImage extends Model
{
	protected $table = 'images';
    protected $fillable = [
		'name',
		'real_name',
		'thumbnail_name',
		'featured_name',
		'uri',
		'thumbnail_uri',
		'featured_uri',
		'alt',
		'format',
		'size',
		'mime_type',
	];
}
