<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    public function post(PostRequest $request)
    {
        $post = new Post;
        $post->content = $request->input('content');
        $post->save();

        return redirect('/');
    }
}
