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

        return redirect('/')->with([
            'message_1' => 'あなたの「今」を共有しました。',
            'message_2' => '引き続きお楽しみください。'
        ]);
    }
}
