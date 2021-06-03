<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->mediumText('description');
            $table->string('author');
            $table->json('media');
            $table->string('external_url');
            $table->string('external_id');
            $table->boolean('archived')->default(false);

            $table->foreignId('podcast_id')->constrained()->onDelete('CASCADE');

            $table->timestamp('published_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
}
