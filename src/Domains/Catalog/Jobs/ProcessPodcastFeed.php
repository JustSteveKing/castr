<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Castr\Domains\Catalog\Models\Podcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Castr\Domains\Catalog\Actions\Podcasts\FetchFeed;
use Castr\Domains\Catalog\Aggregates\EpisodeAggregateRoot;
use Castr\Domains\Catalog\Exceptions\PodcastNotFoundException;
use Ramsey\Uuid\Uuid;

class ProcessPodcastFeed implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public string $uuid,
        public string $feedURL,
    ) {}

    public function handle(): void
    {
        $channel = FetchFeed::handle(
            url: $this->feedURL,
        );

        $podcast = Podcast::uuid(
            uuid: $this->uuid,
        );

        if (is_null($podcast)) {
            throw new PodcastNotFoundException(
                message: "Podcast with uuid {$this->uuid} not found while trying to process feed."
            );
        }

        $podcast->update([
            'generator' => $channel['generator'],
            'description' => $channel['description'],
            'copyright' => $channel['copyright'],
            'language' => $channel['language'],
            'image' => (array) $channel['image'],
        ]);

        $episodes = [];

        foreach ($channel['item'] as $item) {
            $item = (array) $item;
            $media = (array) $item['enclosure'];

            array_push(
                $episodes,
                [
                    'title' => $item['title'],
                    'description' => (string) $item['description'],
                    'author' => $item['author'],
                    'external_url' => $item['link'],
                    'external_id' => $item['guid'],
                    'media' => $media['@attributes'],
                    'published_at' => Carbon::parse($item['pubDate']),
                ],
            );
        }

        EpisodeAggregateRoot::retrieve(
            uuid: Uuid::uuid4()->toString(),
        )->createEpisodes(
            podcastID: $podcast->id,
            episodes: $episodes,
        );
    }
}