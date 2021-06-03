<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Factories;

use Castr\Domains\Catalog\DataTransferObjects\Podcast;

class PodcastFactory
{
    public static function build(array $attributes): Podcast
    {
        return new Podcast(
            title: $attributes['title'],
            generator: $attributes['generator'],
            description: $attributes['description'],
            copyright: $attributes['copyright'],
            owner: $attributes['owner'],
            language: $attributes['language'],
            externalURL: $attributes['external_url'],
            feedURL: $attributes['feed_url'],
        );
    }
}
