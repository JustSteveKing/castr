<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Podcasts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Podcasts\StoreRequest;
use Castr\Domains\Catalog\Factories\PodcastFactory;
use Castr\Domains\Catalog\Policies\PodcastPolicy;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // @todo test this
        $this->authorize('create', PodcastPolicy::class);

        $dto = PodcastFactory::build(
            attributes: $request->validated(),
        );

        // create our podcast

        // return 
    }
}
