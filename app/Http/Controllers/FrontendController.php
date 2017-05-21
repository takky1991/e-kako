<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
    	return view('frontend/home');
    }

    public function post(Category $category, Post $post)
    {
        $comments = $post->comments()->oldest('created_at')->get();

    	return view('frontend/article', [
    		'post' => $post,
            'category' => $category,
            'comments' => $comments
    	]);
    }

    public function category(Category $category)
    {
        $posts = $category->activePosts();
        return view('frontend/category', [
            'posts' => $posts,
            'category' => $category
        ]);
    }

    public function showCreatePostForm()
    {
        return view('frontend/create_post');
    }

    public function storePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'intro' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'intro' => $request->get('intro'),
            'content' => $request->get('content'),
            'public' => false,
            'guest' => true
        ]);

        return redirect()->route('homepage');
    }
}
