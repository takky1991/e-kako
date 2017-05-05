<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use App\Category;
use App\UploadedImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;
use League\HTMLToMarkdown\HtmlConverter;

class PostsController extends Controller
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
        $posts = Post::latest()->paginate(50);
        return view('backend/post/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $images = UploadedImage::all();

        return view('backend/post/create', [
            'categories' => $categories,
            'images' => $images
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'intro' => $request->intro,
            'content' => $request->get('content'),
            'category_id' => $request->category_id,
            'featured_image_id' => $request->featured_image_id,
            'public' => $request->public == 'on' ? true : false,
            'guest' => false
        ]);

        return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
        $categories = Category::all();
        $images = UploadedImage::all();

        return view('backend/post/edit', [
            'post' => $post,
            'categories' => $categories,
            'images' => $images
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'intro' => $request->intro,
            'content' => $request->get('content'),
            'category_id' => $request->category_id,
            'featured_image_id' => $request->featured_image_id,
            'public' => $request->public == 'on' ? true : false,
        ]);

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $title = $post->title;
        $post->delete();
        flashSuccess('Uspjesno ste izbrisali post ' . $title . '.');
        return back();
    }
}
