<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

/**
 * @property int    id
 * @property string title
 * @property string body
 * @property int    id_owner
 * @property string gravatar
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon published_at
 * @property User   $user
 */
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
        //        Log::debug('data', [$data]);

        $this->attributes['published_at'] = Carbon::parse($data)->format('Y-m-d H:i:s');
    }

    protected $casts = [
        'id_owner' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_owner', 'id');
    }
}
