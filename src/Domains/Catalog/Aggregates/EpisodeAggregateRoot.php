<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Aggregates;

use Castr\Domains\Catalog\Events\EpisodesCreated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class EpisodeAggregateRoot extends AggregateRoot
{
    public function createEpisodes(
        int $podcastID,
        array $episodes,
    ): self {
        $this->recordThat(
            domainEvent: new EpisodesCreated(
                podcastID: $podcastID,
                episodes: $episodes,
            ),
        )->persist();

        return $this;
    }
}
