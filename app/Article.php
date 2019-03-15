<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'username',
        'text'
        //      'published_at'
//        'gravatar',
//        'created_at',
//        'updated_at'

    ];
}
