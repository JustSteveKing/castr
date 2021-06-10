<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Podcasts;

use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PodcastResource;
use Castr\Domains\Catalog\Models\Podcast;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    public function __invoke()
    {
        $podcasts = QueryBuilder::for(
            subject: Podcast::class,
        )->allowedIncludes(
            includes: [
                'category',
                'episodes',
            ]
        )->get();

        return new Response(
            content: PodcastResource::collection($podcasts),
            status: Http::OK,
        );
    }
}
