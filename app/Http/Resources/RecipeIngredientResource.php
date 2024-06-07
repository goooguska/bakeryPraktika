<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeIngredientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'recipeIngredients',
            'id' => (string) $this->id,
            'attributes' =>[
                'recipe' => $this->recipe,
                'ingredient' => $this->ingredient,
           ],
            'relationships' => [
                'recipe' => [
                    'links' => [
                        'related' => route('recipes.show', ['recipe' => $this->recipe_id])
                    ],
                ],
                'ingredient' => [
                    'links' => [
                        'related' => route('ingredients.show', ['ingredient' => $this->ingredient_id])
                    ],
                ],
            ],

            'links' => [
                'self' => route('recipeIngredients.show', ['recipeIngredient' => $this->id]),
            ],
        ];
    }
}
