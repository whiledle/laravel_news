<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post_tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    protected $table = 'post_tag';
}
