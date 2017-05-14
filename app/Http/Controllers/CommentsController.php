<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;

class CommentsController extends Controller
{
    public function store(Post $post, CommentFormRequest $request)
    {
    	$post->addComment(request('body'));

    	return back();
    }
}
