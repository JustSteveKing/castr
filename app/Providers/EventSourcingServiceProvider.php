<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;
use Castr\Domains\Catalog\Reactors\PodcastReactor;
use Castr\Domains\Catalog\Projectors\EpisodeProjector;
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
                PodcastReactor::class,
                NotifiyAuthorOfEpisodeSync::class,
            ]
        );
    }

    public function boot(): void
    {
        //
    }
}
