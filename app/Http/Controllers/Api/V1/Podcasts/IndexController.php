<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Podcasts;

use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Castr\Domains\Catalog\Models\Podcast;
use App\Http\Resources\V1\PodcastResource;

class IndexController extends Controller
{
    public function __invoke(): Response
    {
        $podcasts = QueryBuilder::for(
            subject: Podcast::class,
        )->allowedFilters(
            filters: [
                'title',
                AllowedFilter::exact(
                    name: 'language',
                ),
            ]
        )->allowedIncludes(
            includes: [
                'category',
                'episodes',
            ]
        )->get();

        return new Response(
            content: PodcastResource::collection(
                resource: $podcasts,
            ),
            status: Http::OK,
        );
    }
}
