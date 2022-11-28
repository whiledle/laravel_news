<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag)
    {
        $tag = Tag::select('id')->where('name', $tag)->firstOrFail();
        if ($tag) {
            $posts = $tag->posts;
            return view('tag.show', compact('posts'));
        }
    }
}
