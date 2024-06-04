<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'news',
            'id' => (string) $this->id,
            'attributes' => [
                'name' => $this->name,
                'date_news' =>  $this->date_news,
                'info' => $this->info,
                'image' =>  $this->image,
            ],
            'links' => [
                'self' => route('news.show', ['news' => $this->id]),
            ],
        ];
    }
}
