<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Reactors;

use Illuminate\Contracts\Queue\ShouldQueue;
use Castr\Domains\Catalog\Events\PodcastCreated;
use Castr\Domains\Catalog\Events\PodcastWasSynced;
use Castr\Domains\Catalog\Jobs\ProcessPodcastFeed;
use Castr\Domains\Catalog\Jobs\SyncPodcastEpisode;
use Castr\Domains\Catalog\Events\PodcastWasDeleted;
use Castr\Domains\Catalog\Notifications\PodcastWasDeletedNotification;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class PodcastReactor extends Reactor implements ShouldQueue
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

    public function onPodcastWasSynced(
        PodcastWasSynced $event,
    ): void {
        SyncPodcastEpisode::dispatch(
            $event->podcast->id,
            $event->podcast->feed_url,
        );
    }

    public function onPodcastWasDeleted(
        PodcastWasDeleted $event,
    ): void {
        /**
         * @var \Castr\Domains\Shared\Models\User
         */
        $owner = $event->podcast->owner;

        $owner->notify(
            instance: new PodcastWasDeletedNotification(
                podcast: $event->podcast,
            ),
        );
    }
}
