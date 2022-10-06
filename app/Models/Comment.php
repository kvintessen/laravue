<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int    id
 * @property string subject
 * @property string body
 * @property int    article_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Comment extends Model
{
    use HasFactory;

    public const FIELD_ID         = 'id';
    public const FIELD_SUBJECT    = 'subject';
    public const FIELD_BODY       = 'body';
    public const FIELD_ARTICLE_ID = 'article_id';
    public const FIELD_CREATED_AT = 'created_at';
    public const FIELD_UPDATED_AT = 'updated_at';

    protected $fillable = [
        self::FIELD_SUBJECT,
        self::FIELD_BODY,
        self::FIELD_ARTICLE_ID,
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function createdAtForHumans(): string
    {
        return $this->created_at->diffForHumans();
    }
}
