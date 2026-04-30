<?php

namespace App\Support;

class Locales
{
    public const DEFAULT = 'uz';

    public const SUPPORTED = ['uz', 'ru', 'en'];

    public static function current(): string
    {
        $locale = app()->getLocale();

        return in_array($locale, self::SUPPORTED, true) ? $locale : self::DEFAULT;
    }

    public static function isSupported(?string $locale): bool
    {
        return in_array($locale, self::SUPPORTED, true);
    }

    public static function labels(): array
    {
        return [
            'uz' => "O'zbek",
            'ru' => 'Русский',
            'en' => 'English',
        ];
    }

    public static function shortLabels(): array
    {
        return [
            'uz' => 'UZ',
            'ru' => 'RU',
            'en' => 'EN',
        ];
    }
}
