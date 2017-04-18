<?php

namespace App\Http\Controllers\Backend;

use App\UploadedImage;
use Illuminate\Http\Request;
use App\Http\Requests\ImageUpload;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ImagesController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = UploadedImage::paginate(100);

        return view('backend/image/index', ['images' => $images]);
    }

    public function upload(ImageUpload $request)
    {   
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadedImage $picture)
    {
        Storage::disk('local')->delete($picture->uri);
        Storage::disk('local')->delete($picture->thumbnail_uri);
        Storage::disk('local')->delete($picture->featured_uri);
        $picture->delete();
        flashSuccess('Uspjesno ste uklonili sliku.');
        return back();
    }

    public function imagesJson()
    {
        $images = UploadedImage::all();
        $imageArray = array();

        $images->each(function ($item, $key) use (&$imageArray) {
            array_push($imageArray, [ 
                "thumb" => Storage::disk('local')->url($item->thumbnail_uri),
                "thumbtitle" => Storage::disk('local')->url($item->thumbnail_uri),
                "image" => Storage::disk('local')->url($item->uri), 
                "title" => $item->real_name, 
                "id" => $item->id ]);
        });

        return Response::json($imageArray);
    }
}
