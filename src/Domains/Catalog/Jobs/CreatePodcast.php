<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Jobs;

use Ramsey\Uuid\Uuid;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Castr\Domains\Catalog\Factories\PodcastFactory;
use Castr\Domains\Catalog\Aggregates\PodcastAggregateRoot;


class CreatePodcast implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public string $title,
        public string $feedURL,
        public int $userID,
    ) {}

    public function handle(): void
    {
        PodcastAggregateRoot::retrieve(
            uuid: Uuid::uuid4()->toString(),
        )->createPodcast(
            podcast: PodcastFactory::build(
                attributes: [
                    'title' => $this->title,
                    'feed_url' => $this->feedURL,
                ],
            ),
            userID: $this->userID,
        );
    }
}