<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public const STOCK_IN = 'in_stock';

    public const STOCK_LOW = 'low_stock';

    public const STOCK_OUT = 'out_of_stock';

    public const AVAILABILITY_AVAILABLE = 'available';

    public const AVAILABILITY_MADE_TO_ORDER = 'made_to_order';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'short_description',
        'full_description',
        'product_story',
        'material',
        'size',
        'color',
        'craftsmanship_method',
        'production_time',
        'price',
        'old_price',
        'stock_quantity',
        'stock_status',
        'is_made_to_order',
        'custom_order_available',
        'availability_mode',
        'delivery_available',
        'is_active',
        'is_featured',
        'view_count',
        'main_image',
        'gallery',
    ];

    protected function casts(): array
    {
        return [
            'gallery' => 'array',
            'is_made_to_order' => 'boolean',
            'custom_order_available' => 'boolean',
            'delivery_available' => 'boolean',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function stockOptions(): array
    {
        return [
            static::STOCK_IN => 'Sotuvda',
            static::STOCK_LOW => 'Kam qoldi',
            static::STOCK_OUT => 'Tugagan',
        ];
    }

    public static function availabilityOptions(): array
    {
        return [
            static::AVAILABILITY_AVAILABLE => 'Mavjud',
            static::AVAILABILITY_MADE_TO_ORDER => 'Buyurtma asosida',
        ];
    }
}
