<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Article model.
 *
 * @property int    id
 * @property string title
 * @property string body
 * @property int    id_owner
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon published_at
 * @property User   $user
 *
 * @method static QueryBuilder orderBy($column, $direction = 'asc')
 * @method static Builder findOrFail($id, $columns = ['*'])
 */
class Article extends Model
{
    public const A1_CONST = 'asdsad';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'title',
        'body',
        'id_owner',
        'published_at',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'id_owner' => 'integer',
    ];

    /**
     * User of current article.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_owner', 'id');
    }

    /**
     * Mutator for published_at property.
     *
     * @param string|null $data
     */
    protected function setPublishedAtAttribute(string $data = null): void
    {
        $this->attributes['published_at'] = Carbon::parse($data)->format('Y-m-d H:i:s');
    }
}
