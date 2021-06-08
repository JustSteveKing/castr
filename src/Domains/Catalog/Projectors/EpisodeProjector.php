<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Projectors;

use Castr\Domains\Catalog\Models\Episode;
use Castr\Domains\Catalog\Events\EpisodesCreated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class EpisodeProjector extends Projector
{
    public function onEpisodesCreated(
        EpisodesCreated $event,
        string $aggregateUuid,
    ) {
        foreach ($event->episodes as $episode) {
            Episode::create([
                'uuid' => $aggregateUuid,
                'title' => $episode['title'],
                'description' => $episode['description'],
                'author' => $episode['author'],
                'external_url' => $episode['external_url'],
                'external_id' => $episode['external_id'],
                'media' => $episode['media'],
                'published_at' => $episode['published_at'],
                'podcast_id' => $event->podcastID,
            ]);
        }
    }
}
