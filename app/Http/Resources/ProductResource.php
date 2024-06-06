<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'products',
            'id' => (string) $this->id,

            'attributes' => [
                'name' => $this->name,
                'info' => $this->info,
                'cost' =>(float) $this->cost,
            ],
            'links' => [
                'self' => route('products.show', ['product' => $this->id]),
            ],
        ];
    }
}
