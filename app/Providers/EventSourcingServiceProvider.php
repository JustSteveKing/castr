<?php

declare(strict_types=1);

namespace App\Providers;

use Castr\Domains\Catalog\Projectors\EpisodeProjector;
use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;
use Castr\Domains\Catalog\Reactors\FetchPodcastMeta;
use Castr\Domains\Catalog\Projectors\PodcastProjector;
use Castr\Domains\Catalog\Reactors\NotifiyAuthorOfEpisodeSync;

class EventSourcingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Projectionist::addProjectors(
            projectors: [
                PodcastProjector::class,
                EpisodeProjector::class,
            ],
        );
        Projectionist::addReactors(
            reactors: [
                FetchPodcastMeta::class,
                NotifiyAuthorOfEpisodeSync::class,
            ]
        );
    }

    public function boot(): void
    {
        //
    }
}
