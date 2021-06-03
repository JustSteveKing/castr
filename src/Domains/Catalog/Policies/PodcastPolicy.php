<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Policies;

use Castr\Domains\Shared\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PodcastPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        // @todo Check if they have a subscription.
        return true;
    }
}
