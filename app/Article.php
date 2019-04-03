<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


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
public function setPublishedAtAttribute($data) //Mutator
{
    $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $data);
    //$this->attributes['published_at'] = Carbon::parse($data);

}
}
