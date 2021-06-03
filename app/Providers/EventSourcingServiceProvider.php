<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\EventSourcing\Facades\Projectionist;
use Castr\Domains\Catalog\Reactors\FetchPodcastMeta;
use Castr\Domains\Catalog\Projectors\PodcastProjector;

class EventSourcingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Projectionist::addProjector(
            projector: PodcastProjector::class,
        );
        Projectionist::addReactor(
            reactor: FetchPodcastMeta::class
        );
    }

    public function boot(): void
    {
        //
    }
}
