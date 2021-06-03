<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    public function up(): void
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');

            $table->string('title');
            $table->string('generator')->nullable();
            $table->text('description')->nullable();
            $table->string('author');
            $table->string('copyright')->nullable();
            $table->string('language');
            $table->string('external_url');
            $table->string('feed_url');
            $table->json('image')->nullable();
            $table->json('owner')->nullable();

            $table->foreignId('user_id');
            $table->foreignId('category_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('podcasts');
    }
}
