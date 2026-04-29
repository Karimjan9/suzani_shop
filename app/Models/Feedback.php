<?php

namespace App\Models;

use App\Models\Concerns\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasTranslations;

    protected $table = 'feedback';

    protected $fillable = [
        'customer_name',
        'phone',
        'city',
        'content',
        'rating',
        'is_approved',
        'is_featured',
        'admin_notes',
        'published_at',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'datetime',
            'translations' => 'array',
        ];
    }
}
