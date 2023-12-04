<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->resource->map(function ($tag) {
            return [
                'id' => $tag->id,
                'title' => $tag->title,
                'slug' => $tag->slug,
            ];
        })->all();
    }
}

