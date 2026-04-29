<?php

namespace App\Models\Concerns;

use App\Support\Locales;
use Illuminate\Support\Arr;

trait HasTranslations
{
    public function translated(string $attribute, ?string $locale = null, mixed $fallback = null): mixed
    {
        $locale ??= Locales::current();

        if ($locale !== Locales::DEFAULT) {
            $translated = Arr::get($this->translations ?? [], $locale.'.'.$attribute);

            if (filled($translated)) {
                return $translated;
            }
        }

        $value = $this->getAttribute($attribute);

        return filled($value) ? $value : $fallback;
    }

    public function translatedMeta(string $key, ?string $locale = null, mixed $fallback = null): mixed
    {
        $locale ??= Locales::current();

        if ($locale !== Locales::DEFAULT) {
            $translated = Arr::get($this->translations ?? [], $locale.'.meta.'.$key);

            if (filled($translated)) {
                return $translated;
            }
        }

        return Arr::get($this->meta ?? [], $key, $fallback);
    }
}
