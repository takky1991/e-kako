<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

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
}
