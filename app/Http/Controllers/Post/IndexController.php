<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest()->take(3)->get();
        $tagsCollection = Post::select('id','post_tags')->where('post_comments', '>', 0)->orderBy('post_comments', 'desc')->take(4)->get();
        $tagsUnique = [];
        foreach ($tagsCollection as $values) {
            $tagsArray = explode(',', $values->post_tags);
            foreach ($tagsArray as $tag) {
                $tagsUnique[] = $tag;
            }
        }
        $tagsUnique = array_unique($tagsUnique);
        return view('post.index', compact('posts', 'tagsUnique'));
    }
}
