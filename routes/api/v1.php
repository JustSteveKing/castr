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

    /**
     * Create Podcast
     */
    Route::post(
        '/',
        \App\Http\Controllers\Api\V1\Podcasts\StoreController::class,
    )->name('store');

    /**
     * Get a specific Podcast
     */
    Route::get(
        '{uuid}',
        \App\Http\Controllers\Api\V1\Podcasts\ShowController::class,
    )->name('show');

    /**
     * Delete a Podcast
     */
    Route::delete(
        '{uuid}',
        \App\Http\Controllers\Api\V1\Podcasts\DeleteController::class,
    )->name('delete');
});
