<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag)
    {
        $tagId = Tag::select('id')->where('name', $tag)->firstOrFail();
        if ($tagId) {
            $posts = $tagId->posts;
            return view('tag.show', compact('posts', 'tag'));
        }
    }
}
