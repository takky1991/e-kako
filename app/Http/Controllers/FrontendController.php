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
    	$categories = Category::whereHasPosts()->get();
    	return view('frontend/home', [
    		'categories' => $categories,
    	]);
    }

    public function post(Category $category, Post $post)
    {
        $categories = Category::whereHasPosts()->get();
    	return view('frontend/article', [
    		'post' => $post,
            'category' => $category,
            'categories' => $categories
    	]);
    }

    public function category(Category $category)
    {
        $categories = Category::whereHasPosts()->get();
        $posts = $category->activePosts();
        return view('frontend/category', [
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function showCreatePostForm()
    {
        $categories = Category::whereHasPosts()->get();
        return view('frontend/create_post', [
            'categories' => $categories
        ]);
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
