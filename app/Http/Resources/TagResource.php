<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Tag $resource
 */
class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     */
    #[ArrayShape([
        'id'    => "int",
        'label' => "string",
    ])]
    public function toArray($request) : array
    {
        return [
            'id'    => $this->resource->id,
            'label' => Str::ucfirst($this->resource->label),
        ];
    }
}
