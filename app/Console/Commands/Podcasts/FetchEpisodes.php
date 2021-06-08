<?php

declare(strict_types=1);

namespace App\Console\Commands\Podcasts;

use Ramsey\Uuid\Uuid;
use Illuminate\Console\Command;
use Castr\Domains\Catalog\Models\Podcast;
use Castr\Domains\Catalog\Aggregates\PodcastAggregateRoot;

class FetchEpisodes extends Command
{
    protected $signature = 'castr:sync';

    protected $description = 'Sync Podcast Episodes with their feeds.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        foreach (Podcast::cursor() as $podcast) {
            PodcastAggregateRoot::retrieve(
                uuid: Uuid::uuid4()->toString(),
            )->syncPodcast(
                podcast: $podcast,
            );
        }

        return 0;
    }
}
