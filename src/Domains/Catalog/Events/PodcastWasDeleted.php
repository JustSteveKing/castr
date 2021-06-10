<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Events;

use Castr\Domains\Catalog\Models\Podcast;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PodcastWasDeleted extends ShouldBeStored
{
    public function __construct(
        public Podcast $podcast,
    ) {}
}
