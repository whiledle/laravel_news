<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store()
    {
        dd(request());
        $data = request()->validate([
            'comment_content' => 'string',
        ]);
        Comment::create($data);
    }
}
