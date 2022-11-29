<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Post $post, Request $request)
    {
        $data = [
            'post_id' => $post->id,
            'text' => $request->text,
        ];

        Comment::create($data);
        $post->increment('post_comments');
        return redirect()->route('post.show', $post->id);
    }
}
