<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PodcastResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->uuid,
            'type' => 'podcast',
            'attributes' => [
                'title' => $this->title,
                'copyright' => $this->copyright,
                'description' => $this->description,
                'image' => json_decode($this->image),
                'created' => [
                    'human' => $this->created_at->diffForHumans(),
                    'date' => $this->created_at->toDateString(),
                ]
            ],
            'relationships' => [
                'category' => new CategoryResource(
                    resource: $this->whenLoaded(
                        relationship: 'category',
                    ),
                ),
                'episodes' => EpisodeResource::collection(
                    resource: $this->whenLoaded(
                        relationship: 'episodes',
                    ),
                ),
            ],
            'links' => [],
        ];
    }
}
