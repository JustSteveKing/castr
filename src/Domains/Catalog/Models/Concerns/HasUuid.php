<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    public static function uuid(string $uuid): Model|null
    {
        return static::where('uuid', $uuid)->first();
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
