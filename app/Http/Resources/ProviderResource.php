<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'providers',
            'id' => $this->id,

            'attributes' => [
                'name' => $this->name,
                'cost' => $this->cost,
                'quantity' => $this->quantity,
                'date_of_delivery' => $this->date_of_delivery,
            ],
            
            'links' => [
                'self' => route('providers.show', ['provider' => $this->id])
            ],
        ];
    }
}
