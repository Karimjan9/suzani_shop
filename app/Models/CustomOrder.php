<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    public const STATUS_NEW = 'new';

    public const STATUS_REVIEWING = 'reviewing';

    public const STATUS_CONFIRMED = 'confirmed';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'order_number',
        'customer_name',
        'phone',
        'telegram',
        'product_name',
        'description',
        'material',
        'size',
        'color',
        'budget',
        'status',
        'admin_notes',
    ];

    public static function statusOptions(): array
    {
        return [
            static::STATUS_NEW => 'Yangi',
            static::STATUS_REVIEWING => 'Ko\'rib chiqilmoqda',
            static::STATUS_CONFIRMED => 'Tasdiqlangan',
            static::STATUS_COMPLETED => 'Yakunlangan',
            static::STATUS_CANCELLED => 'Bekor qilingan',
        ];
    }
}
