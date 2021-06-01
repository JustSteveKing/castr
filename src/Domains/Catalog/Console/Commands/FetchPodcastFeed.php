<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Console\Commands;

use Illuminate\Console\Command;
use Laminas\Feed\Reader\Reader;

class FetchPodcastFeed extends Command
{
    protected $signature = 'podcast:fetch {url}';

    protected $description = 'Fetch the feed from a podcast to process.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $feed = Reader::import(
            uri: $this->argument('url'),
        );

        $data = (array) simplexml_load_string($feed->saveXml());

        dd((array) $data['channel']);

        return 0;
    }
}
