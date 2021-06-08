<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\DataTransferObjects;

class Podcast
{
    public function __construct(
        public string $title,
        public string $generator,
        public string $description,
        public string $copyright,
        public string $language,
        public string $externalURL,
        public string $feedURL,
    ) {}
}
