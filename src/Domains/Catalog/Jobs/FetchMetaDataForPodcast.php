<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Jobs;

use Castr\Domains\Catalog\Models\Podcast;
use Illuminate\Bus\Queueable;
use shweshi\OpenGraph\OpenGraph;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class FetchMetaDataForPodcast implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public int $podcastID,
        public string $externalURL,
    ) {}

    public function handle(): void
    {
        $data = (new OpenGraph())->fetch(
            url: $this->externalURL,
            allMeta: true,
        );

        $podcast = Podcast::find($this->podcastID);

        if ($podcast) {
            $podcast->update([
                'description' => $data['description'],
                'image' => [
                    'src' => $this->fetchImage(data: $data)
                ],
            ]);
        }
    }

    protected function fetchImage(array $data): string|null
    {
        if (isset($data['twitter:image'])) {
            return $data['twitter:image'];
        }
        if (isset($data['image'])) {
            return $data['image'];
        }
        if (isset($data['og:image'])) {
            return $data['og:image'];
        }

        return null;
    }
}
