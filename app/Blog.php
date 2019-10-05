<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_title', 'blog_content', 'blog_image','blog_views','created_at',
    ];
}
