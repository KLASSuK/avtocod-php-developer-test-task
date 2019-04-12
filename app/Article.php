<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class Article extends Model
{

    protected $fillable = [
        'title',
        'body',
        'id_owner',
        'gravatar',
        'published_at',
//        'created_at',
//        'updated_at',
    ];

    protected function setPublishedAtAttribute($data) //Mutator
    {
        Log::debug('data', [$data]);

        $this->attributes['published_at'] = Carbon::parse($data)->format('Y-m-d H:i:s');
        //$this->attributes['published_at'] = Carbon::parse($data);

    }


    protected $casts = [
        'id_owner' => 'integer',
    ];
}