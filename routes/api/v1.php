<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/**
 * Podcast Routes
 */
Route::prefix('podcasts')->as('podcasts:')->group(function () {

    /**
     * List Podcasts
     */
    Route::get(
        '/',
        \App\Http\Controllers\Api\V1\Podcasts\IndexController::class,
    )->name('index');
});
