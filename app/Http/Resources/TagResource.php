<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'label' => "string"])]
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'label' => Str::ucfirst($this->label),
        ];
    }
}