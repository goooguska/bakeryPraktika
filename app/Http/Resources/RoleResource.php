<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'roles',
            'id' => (string) $this->id,

            'attributes' => [
                'name' => $this->name,
            ],
            'links' => [
                'self' => route('roles.show', ['role' => $this->id]),
            ],
        ];
    }
}
