<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Actions\Podcasts;

use Illuminate\Support\Facades\Http;

class FetchFeed
{
    public static function handle(string $url): array
    {
        $response = Http::withHeaders(
            headers: [
                'Accept' => 'application/xml',
            ],
        )->get(
            url: $url,
        );

        if ($response->failed()) {
            /**
             * @var \Illuminate\Http\Client\RequestException
             */
            $response->throw();
        }

        $feed = (array) simplexml_load_string($response->body());
        $channel = (array) $feed['channel'];

        return $channel;
    }
}
