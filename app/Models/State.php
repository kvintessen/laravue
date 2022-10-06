<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property int likes
 * @property int views
 * @property int article_id
 */
class State extends Model
{
    use HasFactory;

    public const FIELD_ID         = 'id';
    public const FIELD_LIKES      = 'likes';
    public const FIELD_VIEWS      = 'views';
    public const FIELD_ARTICLE_ID = 'article_id';

    protected $fillable = [
        self::FIELD_LIKES,
        self::FIELD_VIEWS,
        self::FIELD_ARTICLE_ID,
    ];

    public $timestamps = false;
}
