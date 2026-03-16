<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'group',
        'key',
        'label',
        'value',
        'type',
        'is_public',
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    public static function typeOptions(): array
    {
        return [
            'text' => 'Text',
            'textarea' => 'Textarea',
            'url' => 'URL',
            'json' => 'JSON',
        ];
    }
}
