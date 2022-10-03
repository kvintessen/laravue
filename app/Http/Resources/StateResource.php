<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    #[ArrayShape(['likes' => "mixed", 'views' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'likes' => $this->likes,
            'views' => $this->views,
        ];
    }
}