<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BakerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'type' => 'bakers',
            'id' => $this->id,

            'attributes' => [
                'name' => $this->name,
                'shift_at_work' => $this->shift_at_work,
            ],
            'links' => [
                'self' => route('bakers.show', ['baker' => $this->id])
            ],
        ];
    }
}
