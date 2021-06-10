<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\DataTransferObjects;

class Podcast
{
    public function __construct(
        public string $title,
        public string $feedURL,
    ) {}
}
