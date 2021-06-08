<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Reactors;

use Illuminate\Contracts\Queue\ShouldQueue;
use Castr\Domains\Catalog\Events\PodcastCreated;
use Castr\Domains\Catalog\Jobs\ProcessPodcastFeed;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class FetchPodcastMeta extends Reactor implements ShouldQueue
{
    public function onPodcastCreated(
        PodcastCreated $event,
        string $aggregateUuid,
    ): void {
        ProcessPodcastFeed::dispatch(
            $aggregateUuid,
            $event->dto->feedURL,
        );
    }
}
