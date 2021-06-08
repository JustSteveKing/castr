<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class EpisodeBuilder extends Builder
{
    public function uuid(string $uuid): self
    {
        return $this->where(
            column: 'uuid',
            value: $uuid,
        );
    }

    public function archived(bool $archived = true): self
    {
        return $this->where(
            column: 'archived',
            value: $archived,
        );
    }

    public function published(): self
    {
        return $this->archived(
            archived: false,
        );
    }
}
