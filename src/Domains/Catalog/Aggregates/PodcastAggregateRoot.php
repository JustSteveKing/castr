<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Aggregates;

use Illuminate\Database\Eloquent\Model;
use Castr\Domains\Catalog\Events\PodcastCreated;
use Castr\Domains\Catalog\Events\PodcastWasSynced;
use Castr\Domains\Catalog\Events\PodcastWasDeleted;
use Castr\Domains\Catalog\DataTransferObjects\Podcast;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class PodcastAggregateRoot extends AggregateRoot
{
    public function createPodcast(Podcast $podcast, int $userID): self
    {
        $this->recordThat(
            domainEvent: new PodcastCreated(
                dto: $podcast,
                user: $userID,
            ),
        )->persist();

        return $this;
    }

    public function syncPodcast(Model $podcast): self
    {
        $this->recordThat(
            domainEvent: new PodcastWasSynced(
                podcast: $podcast,
            ),
        )->persist();

        return $this;
    }

    public function removePodcast(Model $podcast): self
    {
        $this->recordThat(
            domainEvent: new PodcastWasDeleted(
                podcast: $podcast,
            ),
        )->persist();

        return $this;
    }
}
