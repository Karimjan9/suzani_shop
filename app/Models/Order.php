<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const STATUS_NEW = 'new';

    public const STATUS_CALLED = 'called';

    public const STATUS_CONFIRMED = 'confirmed';

    public const STATUS_PREPARING = 'preparing';

    public const STATUS_SHIPPED = 'shipped';

    public const STATUS_DELIVERED = 'delivered';

    public const STATUS_CANCELLED = 'cancelled';

    public const SHIPPING_PENDING = 'pending';

    public const SHIPPING_PACKING = 'packing';

    public const SHIPPING_SENT = 'sent';

    public const SHIPPING_DELIVERED = 'delivered';

    protected $fillable = [
        'customer_id',
        'order_number',
        'customer_name',
        'phone',
        'telegram',
        'instagram',
        'address',
        'notes',
        'admin_notes',
        'status',
        'shipping_status',
        'admin_contacted_at',
        'total_items',
        'total_amount',
    ];

    protected function casts(): array
    {
        return [
            'admin_contacted_at' => 'datetime',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function statusOptions(): array
    {
        return [
            static::STATUS_NEW => 'Yangi',
            static::STATUS_CALLED => 'Qo\'ng\'iroq qilindi',
            static::STATUS_CONFIRMED => 'Tasdiqlandi',
            static::STATUS_PREPARING => 'Tayyorlanmoqda',
            static::STATUS_SHIPPED => 'Yuborildi',
            static::STATUS_DELIVERED => 'Yetkazildi',
            static::STATUS_CANCELLED => 'Bekor qilingan',
        ];
    }

    public static function inProgressStatuses(): array
    {
        return [
            static::STATUS_CALLED,
            static::STATUS_CONFIRMED,
            static::STATUS_PREPARING,
            static::STATUS_SHIPPED,
        ];
    }

    public static function shippingStatusOptions(): array
    {
        return [
            static::SHIPPING_PENDING => 'Jo\'natishga tayyor emas',
            static::SHIPPING_PACKING => 'Qadoqlanmoqda',
            static::SHIPPING_SENT => 'Yuborildi',
            static::SHIPPING_DELIVERED => 'Yetkazildi',
        ];
    }
}
