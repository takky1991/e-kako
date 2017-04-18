<?php

namespace App\Http\Controllers;

use App\UploadedImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redactorImageUpload(Request $request)
    {
    	$this->validate($request, [
	        'file' => 'image',
	    ]);

    	$file = $request->file('file');

        $realName = $file->hashName();
        $thumbnailName = 'tn-' . $realName;
        $featuredName = 'ft-' . $realName;
        $format = $file->guessClientExtension();
        $size = $file->getClientSize();
        $mimeType = $file->getMimeType();
        $uri = $file->store('public/uploads');
        $thumbnailUri = 'public/thumbnails/' . $thumbnailName;
        $featuredUri = 'public/featured/' . $featuredName;

        Image::make(storage_path('app/' . $uri))->fit(200)->save(storage_path('app/' . $thumbnailUri));
        Image::make(storage_path('app/' . $uri))->fit(336, 170)->save(storage_path('app/' . $featuredUri));

        UploadedImage::create([
            'name' => '',
            'real_name' => $realName,
            'thumbnail_name' => $thumbnailName,
            'featured_name' => $featuredName,
            'uri' => $uri,
            'thumbnail_uri' => $thumbnailUri,
            'featured_uri' => $featuredUri,
            'alt' => '',
            'format' => $format,
            'size' => $size,
            'mime_type' => $mimeType
        ]);

        return Response::json([
        	'filelink' => Storage::disk('local')->url($uri)
        ]);
    }
}
