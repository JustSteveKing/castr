<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            
            'id' => $this->uuid,
            'type' => 'category',
            'attributes' => [
                'name' => $this->name,
            ],
            'relationships' => [
                'podcasts' => PodcastResource::collection(
                    resource: $this->whenLoaded(
                        relationship: 'podcasts',
                    ),
                ),
            ],
            'links' => [],
        ];
    }
}
