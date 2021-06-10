<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Podcasts;

use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Castr\Domains\Catalog\Models\Podcast;
use App\Http\Resources\V1\PodcastResource;

class ShowController extends Controller
{
    public function __invoke(string $uuid): Response
    {
        $podcast = QueryBuilder::for(
            subject: Podcast::class,
        )->allowedIncludes(
            includes: [
                'category',
                'owner',
                'episodes',
            ],
        )->where('uuid', $uuid)->firstOrFail();

        return new Response(
            content: new PodcastResource(
                resource: $podcast,
            ),
            status: Http::OK,
        );
    }
}
