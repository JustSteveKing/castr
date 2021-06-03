<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Reactors;

use Illuminate\Contracts\Queue\ShouldQueue;
use Castr\Domains\Catalog\Events\PodcastCreated;
use Castr\Domains\Catalog\Jobs\FetchMetaDataForPodcast;
use Castr\Domains\Catalog\Jobs\FetchPodcastItems;
use Castr\Domains\Catalog\Models\Podcast;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class FetchPodcastMeta extends Reactor implements ShouldQueue
{
    public function onPodcastCreated(
        PodcastCreated $event,
        string $aggregateUuid,
    ): void {
        // Fetch the Podcast from the Aggregate UUID
        $podcast = Podcast::uuid($aggregateUuid);

        // get meta information on podcast from external url.
        FetchMetaDataForPodcast::dispatch(
            $podcast->id,
            $podcast->external_url,
        );

        // dispatch _another_ job to fetch feed items.
        FetchPodcastItems::dispatch(
            $podcast->id,
            $podcast->feed_url,
        );
    }
}
