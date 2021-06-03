<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Aggregates;

use Castr\Domains\Catalog\Events\PodcastCreated;
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
}
