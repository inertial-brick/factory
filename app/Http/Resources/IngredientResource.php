<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->resource->map(function ($ingredient) {
            return [
                'id' => $ingredient->id,
                'title' => $ingredient->title,
                'slug' => $ingredient->slug,
            ];
        })->all();

    }
}
