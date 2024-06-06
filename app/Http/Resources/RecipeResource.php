<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'recipes',
            'id' => (string) $this->id,

            'attributes' => [
                'name' => $this->name,
                'baking_time' =>  $this->baking_time,
                'info' => $this->info,
            ],
            'links' => [
                'self' => route('recipes.show', ['recipe' => $this->id]),
            ],
        ];

    }
}
