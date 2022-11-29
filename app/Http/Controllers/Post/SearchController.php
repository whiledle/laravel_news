<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$data}%")->orderBy('created_at')->get();
        $tags = Tag::where('name', 'LIKE', "%{$data}%")->get();
        return view('post.search', compact('posts', 'tags'));
    }
}
