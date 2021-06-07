<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedSeeder extends Seeder
{
    public function run(): void
    {
        $feed = (array) simplexml_load_file(__DIR__ . '/../data/PHPUgly.xml');

        $channel = (array) $feed['channel'];
        $image = (array) $channel['image'];

        dd($image);
        dd($channel);
    }
}
