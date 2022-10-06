<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Comment $resource
 */
class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.

     * @param Request $request
     */
    #[ArrayShape([
        'id'          => "int",
        'subject'    => "string",
        'body'       => "string",
        'created_at' => "Carbon"]
    )]
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'subject' => $this->resource->subject,
            'body' => $this->resource->body,
            'created_at' => $this->resource->createdAtForHumans(),
        ];
    }
}
