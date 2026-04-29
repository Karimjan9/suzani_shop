<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'project_type',
        'highlight_value',
        'excerpt',
        'description',
        'cover_image',
        'gallery',
        'is_featured',
        'is_active',
        'sort_order',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'gallery' => 'array',
            'translations' => 'array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
