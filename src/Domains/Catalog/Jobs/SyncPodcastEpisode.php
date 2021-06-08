<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Jobs;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Castr\Domains\Catalog\Models\Episode;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Castr\Domains\Catalog\Actions\Podcasts\FetchFeed;
use Castr\Domains\Catalog\Aggregates\EpisodeAggregateRoot;

class SyncPodcastEpisode implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public int $podcastID,
        public string $feedURL,
    ) {}

    public function handle()
    {
        $channel = FetchFeed::handle(
            url: $this->feedURL,
        );

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

        foreach ($episodes as $episode) {
            $stored = Episode::where('external_id', $episode['external_id'])->first();

            if ($stored) {
                $stored->update([
                    'title' => $episode['title'],
                    'description' => $episode['description'],
                    'author' => $episode['author'],
                    'external_url' => $episode['external_url'],
                    'external_id' => $episode['external_id'],
                    'media' => $episode['media'],
                    'published_at' => $episode['published_at'],
                    'podcast_id' => $this->podcastID,
                ]);
            } else {
                Episode::create([
                    'uuid' => Uuid::uuid4()->toString(),
                    'title' => $episode['title'],
                    'description' => $episode['description'],
                    'author' => $episode['author'],
                    'external_url' => $episode['external_url'],
                    'external_id' => $episode['external_id'],
                    'media' => $episode['media'],
                    'published_at' => $episode['published_at'],
                    'podcast_id' => $this->podcastID,
                ]);
            }
        }
    }
}
