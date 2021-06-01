<?php

declare(strict_types=1);

namespace Castr\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'uuid',
        'name'
    ];

    public $timestamps = false;

    public function podcasts(): HasMany
    {
        return $this->hasMany(
            related: Podcast::class,
            foreignKey: 'category_id',
        );
    }
}
