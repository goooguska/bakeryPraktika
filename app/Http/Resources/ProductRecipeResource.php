<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductRecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'productRecipes',
            'id' => (string) $this->id,
            'relationships' => [
                'product' => [
                    'links' => [
                        'related' => route('products.show', ['product' => $this->product_id])
                    ],
                ],
                'recipe' => [
                    'links' => [
                        'related' => route('recipes.show', ['recipe' => $this->recipe_id])
                    ],
                ],
            ],

            'links' => [
                'self' => route('productRecipes.show', ['productRecipe' => $this->id]),
            ],
        ];
    }
}
