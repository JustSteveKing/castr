<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Projectors;

use Castr\Domains\Catalog\Models\Podcast;
use Castr\Domains\Catalog\Events\PodcastCreated;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PodcastProjector extends Projector
{
    public function onPodcastCreated(
        PodcastCreated $event,
        string $aggregateUuid,
    ): void {
        Podcast::create([
            'uuid' => $aggregateUuid,
            'title' => $event->dto->title,
            'generator' => $event->dto->generator,
            'description' => $event->dto->description,
            'copyright' => $event->dto->copyright,
            'language' => $event->dto->language,
            'external_url' => $event->dto->externalURL,
            'feed_url' => $event->dto->feedURL,
            'user_id' => $event->user,
        ]);
    }
}
