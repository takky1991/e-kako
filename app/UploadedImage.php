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
		'uri',
		'thumbnail_uri',
		'alt',
		'format',
		'size',
		'mime_type',
	];
}
