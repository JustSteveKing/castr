<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Jobs;

use Illuminate\Bus\Queueable;
use shweshi\OpenGraph\OpenGraph;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Castr\Domains\Catalog\Models\Podcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use RuntimeException;

class FetchPodcastItems implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public int $podcastID,
        public string $feedURL,
    ) {}

    public function handle(): void
    {
        $response = Http::withHeaders(
            headers: [
                'Accept' => 'application/xml',
            ],
        )->get(
            url: $this->feedURL,
        );

        if ($response->failed()) {
            $response->throw();
        }

        $feed = (array) simplexml_load_string($response->body());

        $channel = (array) $feed['channel'];
        $image = (array) $channel['image'];

        // Update our podcast with feed data as this is more accurate.
        $podcast = Podcast::find($this->podcastID);

        if (! $podcast) {
            throw new RuntimeException(
                message: "The Podcast with an ID of {$this->podcastID} does not exist anymore.",
            );
        }

        $podcast->update([
            'generator' => $channel['generator'],
            'description' => $channel['description'],
            'copyright' => $channel['copyright'],
            'language' => $channel['language'],
            'image' => $image,
        ]);

        // work with our podcast episodes.

        collect($channel['item'])->map(function ($item) {
            $episode = (array) $item;

            // Event Sourcing - create an episode.
            dd($episode);
        });
    }
}
