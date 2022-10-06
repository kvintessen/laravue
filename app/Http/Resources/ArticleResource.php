<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Article $resource
 */
class ArticleResource extends JsonResource
{
    /**
     * @param Request $request
     */
    #[ArrayShape([
        'id'         => "int",
        'title'      => "string",
        'img'        => "string",
        'body'       => "string",
        'created_at' => "Carbon",
        'comments'   => CommentResource::class,
        'tags'       => TagResource::class,
        'statistic'  => StateResource::class
    ])]
    public function toArray( $request): array
    {
        return [
            'id'         => $this->resource->id,
            'title'      => $this->resource->title,
            'img'        => $this->resource->img,
            'body'       => $this->resource->body,
            'created_at' => $this->resource->createdAtForHumans(),
            'comments'   => CommentResource::collection($this->whenLoaded('comments')),
            'tags'       => TagResource::collection($this->whenLoaded('tags')),
            'statistic'  => new StateResource($this->whenLoaded('state')),
        ];
    }
}
