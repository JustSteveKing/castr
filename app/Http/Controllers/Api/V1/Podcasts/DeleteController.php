<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Podcasts;

use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;
use App\Http\Controllers\Controller;
use Castr\Domains\Catalog\Aggregates\PodcastAggregateRoot;
use Castr\Domains\Catalog\Models\Podcast;
use Ramsey\Uuid\Uuid;

class DeleteController extends Controller
{
    public function __invoke(string $uuid): Response
    {
        $podcast = Podcast::where(
            'uuid',
            $uuid
        )->firstOrFail();

        PodcastAggregateRoot::retrieve(
            uuid: Uuid::uuid4()->toString(),
        )->removePodcast(
            podcast: $podcast,
        );

        return new Response(
            content: '',
            status: Http::ACCEPTED,
        );
    }
}
