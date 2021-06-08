<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class EpisodesCreated extends ShouldBeStored
{
    public function __construct(
        public int $podcastID,
        public array $episodes,
    ) {}
}
