<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'sales',
            'id' => (string) $this->id,
           'attributes' =>[
                'date_sale' => $this->date_sale,
                'quantity' => $this->quantity,
           ],
            'relationships' => [
                'product' => [
                    'links' => [
                        'related' => route('products.show', ['product' => $this->product_id])
                    ],
                ],
              
                'user' => [
                    'links' => [
                        'related' => route('users.show', ['user' => $this->user_id])
                    ],
                ],
           
            ],

            'links' => [
                'self' => route('sales.show', ['sale' => $this->id]),
            ],
        ];
      
    }
}
