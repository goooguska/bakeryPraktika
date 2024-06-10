<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BakedProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'bakedProducts',
            'id' => $this->id,

            'attributes' => [
                'date_baking' => $this->date_baking,
                'date_sale' => $this->date_sale,
            ],
            'relationships' => [
                'baker' => [
                    'links' => [
                        'related' =>route('bakers.show', ['baker' => $this->baker_id])
                    ],
                ],
                'productRecipe' => [
                    'links' => [
                        'related' =>route('productRecipes.show', ['productRecipe' => $this->productRecipe_id])
                    ],
                ],
            ],
            'links' => [
                'self' => route('bakedProducts.show', ['bakedProduct' => $this->id])
            ],
        ];
      
    }
}
