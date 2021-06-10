<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Podcasts;

use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Podcasts\StoreRequest;
use Castr\Domains\Catalog\Jobs\CreatePodcast;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): Response
    {
        CreatePodcast::dispatch(
            $request->get('title'),
            $request->get('feed_url'),
            $request->get('user_id', 1),
        );

        return new Response(
            content: [
                'message' => 'We are creating your podcast.'
            ],
            status: Http::ACCEPTED,
        );
    }
}
