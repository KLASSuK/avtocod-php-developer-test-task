<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'body',
        'username',
        'gravatar',
        'published_at',
//        'created_at',
        'updated_at',
    ];
}
