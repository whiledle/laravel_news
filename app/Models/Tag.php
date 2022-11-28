<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function posts()
    {
//        return $this->belongsToMany(Post::class, 'posts_tags', 'tag_id', 'post_id');
        return $this->belongsToMany(Post::class);
    }
}
