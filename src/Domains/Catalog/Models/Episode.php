<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    protected $fillable = [
        'uuid',
        'title',
        'description',
        'author',
        'media',
        'external_url',
        'external_id',
        'archived',
        'podcast_id',
        'published_at',
    ];

    protected $casts = [
        'media' => AsArrayObject::class,
        'published_at' => 'datetime',
        'archived' => 'boolean',
    ];

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(
            related: Podcast::class,
            foreignKey: 'podcast_id',
        );
    }
}
