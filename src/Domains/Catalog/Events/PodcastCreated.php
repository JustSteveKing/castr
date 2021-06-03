<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Events;

use Castr\Domains\Catalog\DataTransferObjects\Podcast;
use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PodcastCreated extends ShouldBeStored
{
    public function __construct(
        public Podcast $dto,
        public int $user,
    ) {}
}
