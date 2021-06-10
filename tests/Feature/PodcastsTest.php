<?php

declare(strict_types=1);

use function Pest\Laravel\get;
use JustSteveKing\StatusCode\Http;

use Castr\Domains\Catalog\Models\Podcast;
use Illuminate\Testing\Fluent\AssertableJson;

it('can receive the correct status code and payload', function () {
    $podcast = Podcast::first();

    get(
        uri: route('api:podcasts:index')
    )->assertStatus(
        status: Http::OK,
    )->assertJson(
        fn (AssertableJson $json) =>
        $json->has(1)
            ->first(
                fn ($json) =>
                $json->where('id', $podcast->uuid)
                    ->where('type', 'podcast')
                    ->where('relationships', [])
                    ->etc()
            )
    );

    get(
        uri: route('api:podcasts:index', [
            'include' => 'category',
        ])
    )->assertStatus(
        status: Http::OK,
    )->assertJson(
        fn (AssertableJson $json) =>
        $json->has(1)
            ->first(
                fn ($json) =>
                $json->where('id', $podcast->uuid)
                    ->where('type', 'podcast')
                    ->where('relationships.category.type', 'category')
                    ->etc()
            )
    );
});
