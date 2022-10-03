<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int id
 * @property string label
 */
class Tag extends Model
{
    use HasFactory;

    public const FIELD_ID    = 'id';
    public const FIELD_LABEL = 'label';

    protected $fillable = [
        self::FIELD_LABEL,
    ];

    public $timestamps = false;

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(
            Article::class,
            'article_tag',
            'article_id',
            'tag_id'
        );
    }
}
