<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    public const TYPE_BANNER = 'banner';

    public const TYPE_HOME_TEXT = 'home_text';

    public const TYPE_ABOUT = 'about';

    public const TYPE_WHY_US = 'why_us';

    public const TYPE_CTA = 'cta';

    public const TYPE_CONTACT = 'contact';

    public const TYPE_SOCIAL = 'social';

    public const TYPE_FOOTER = 'footer';

    protected $fillable = [
        'type',
        'key',
        'title',
        'subtitle',
        'content',
        'image',
        'link',
        'meta',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'meta' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public static function typeOptions(): array
    {
        return [
            static::TYPE_BANNER => 'Banner',
            static::TYPE_HOME_TEXT => 'Bosh sahifa matni',
            static::TYPE_ABOUT => 'Biz haqimizda',
            static::TYPE_WHY_US => 'Nega biz',
            static::TYPE_CTA => 'CTA',
            static::TYPE_CONTACT => 'Kontakt',
            static::TYPE_SOCIAL => 'Ijtimoiy tarmoqlar',
            static::TYPE_FOOTER => 'Footer',
        ];
    }
}
