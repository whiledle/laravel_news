<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowPostsController extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest()->paginate(3);
        foreach ($posts as $post) {
            $post->fill(['date' => $post->created_at->format('d.m.Y')]);
        }

        return response()->json([
            'posts' => $posts,
        ]);
    }
}
