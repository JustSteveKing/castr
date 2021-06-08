<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Reactors;

use Castr\Domains\Catalog\Models\Podcast;
use Castr\Domains\Catalog\Events\EpisodesCreated;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;
use Castr\Domains\Catalog\Notifications\PodcastIsSyncingNotification;

class NotifiyAuthorOfEpisodeSync extends Reactor
{
    public function onEpisodesCreated(
        EpisodesCreated $event,
        string $aggregateUuid,
    ) {
        $podcast = Podcast::with(['owner'])->find($event->podcastID);

        $podcast->owner->notify(new PodcastIsSyncingNotification(
            podcast: $podcast,
        ));
    }
}
