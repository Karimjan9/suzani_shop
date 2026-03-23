<?php

namespace App\Support;

use Illuminate\Support\Str;

class UploadedMedia
{
    public static function url(null|string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (Str::startsWith($path, 'data:')) {
            return $path;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return null;
        }

        if (Str::startsWith($path, '/')) {
            return $path;
        }

        return '/storage/'.ltrim($path, '/');
    }

    public static function isManaged(null|string $path): bool
    {
        return filled($path) && Str::startsWith($path, 'admin-uploads/');
    }
}
