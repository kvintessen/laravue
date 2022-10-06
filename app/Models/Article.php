<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\Pure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int    id
 * @property string title
 * @property string slug
 * @property string body
 * @property string img
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon published_at
 * @property State  state
 */
class Article extends Model
{
    use HasFactory;

    public const FIELD_ID           = 'id';
    public const FIELD_TITLE        = 'title';
    public const FIELD_SLUG         = 'slug';
    public const FIELD_BODY         = 'body';
    public const FIELD_IMG          = 'img';
    public const FIELD_CREATED_AT   = 'created_at';
    public const FIELD_UPDATED_AT   = 'updated_at';
    public const FIELD_PUBLISHED_AT = 'published_at';

    protected $fillable = [
        self::FIELD_ID,
        self::FIELD_TITLE,
        self::FIELD_SLUG,
        self::FIELD_BODY,
        self::FIELD_IMG,
        self::FIELD_CREATED_AT,
        self::FIELD_UPDATED_AT,
    ];

    public $dates = [
        self::FIELD_PUBLISHED_AT,
        ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function state(): HasOne
    {
        return $this->hasOne(State::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    #[Pure]
    public function getBodyPreview(): string
    {
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans(): string
    {
        return $this->created_at->diffForHumans();
    }

    /*
   |--------------------------------------------------------------------------
   | SCOPES
   |--------------------------------------------------------------------------
   */
}
