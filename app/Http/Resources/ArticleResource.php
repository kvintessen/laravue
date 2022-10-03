<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    #[ArrayShape([
        'id' => "mixed",
        'title' => "mixed",
        'img' => "mixed",
        'body' => "mixed", '
        created_at' => "mixed",
        'comments' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection",
        'tags' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection",
        'statistic' => "\App\Http\Resources\StateResource"
    ])]
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'img' => $this->img,
            'body' => $this->body,
            'created_at' => $this->createdAtForHumans(),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'statistic' => new StateResource($this->whenLoaded('state')),
        ];
    }
}