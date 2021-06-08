<?php

declare(strict_types=1);

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Castr\Domains\Catalog\Aggregates\PodcastAggregateRoot;
use Castr\Domains\Catalog\Factories\PodcastFactory;
use Castr\Domains\Shared\Models\User;

class FeedSeeder extends Seeder
{
    public function run(): void
    {
        $uuid = Uuid::uuid4()->toString();

        PodcastAggregateRoot::retrieve(
            uuid: $uuid,
        )->createPodcast(
            podcast: PodcastFactory::build(
                attributes: [
                    'title' => 'PHPUgly',
                    'generator' => 'simplecasts',
                    'description' => 'This is PHPUgly podcast',
                    'copyright' => 'PHPUgly',
                    'author' => 'PHPUgly',
                    'language' => 'en-US',
                    'external_url' => 'http://www.phpugly.com',
                    'feed_url' => 'https://feeds.simplecast.com/iYRiH9ym',
                ]
            ),
            userID: User::first()->id,
        );
    }
}
