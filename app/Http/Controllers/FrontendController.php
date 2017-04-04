<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
    	$posts1 = Post::where('category_id', 1)->get();
    	$posts2 = Post::where('category_id', 2)->get();
    	$posts3 = Post::where('category_id', 3)->get();
    	return view('frontend/home', [
    		'posts1' => $posts1,
    		'posts2' => $posts2,
    		'posts3' => $posts3
    	]);
    }

    public function article()
    {
    	$post = Post::find(10);
    	return view('frontend/article', [
    		'post' => $post
    	]);
    }
}
