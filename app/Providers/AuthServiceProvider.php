<?php

declare(strict_types=1);

namespace App\Providers;

use Castr\Domains\Catalog\Models\Podcast;
use Castr\Domains\Catalog\Policies\PodcastPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Podcast::class => PodcastPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
