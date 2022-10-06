<?php

namespace App\Http\Resources;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property State $resource
 */
class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     */
    #[ArrayShape([
        'likes' => "int",
        'views' => "int"
    ])]
    public function toArray($request): array
    {
        return [
            'likes' => $this->resource->likes,
            'views' => $this->resource->views,
        ];
    }
}
