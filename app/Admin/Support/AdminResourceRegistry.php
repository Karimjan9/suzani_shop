<?php

namespace App\Admin\Support;

use App\Models\Category;
use App\Models\ContentBlock;
use App\Models\Customer;
use App\Models\CustomOrder;
use App\Models\Feedback;
use App\Models\NotificationLog;
use App\Models\Order;
use App\Models\PortfolioItem;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AdminResourceRegistry
{
    public static function all(): array
    {
        return [
            'orders' => self::resource('orders', [
                'group' => 'Savdo',
                'label' => 'Buyurtmalar',
                'singular' => 'Buyurtma',
                'description' => 'Mijoz buyurtmalarini, statuslarni va aloqa yozuvlarini boshqaring.',
                'model' => Order::class,
                'with' => ['customer'],
                'search' => ['order_number', 'customer_name', 'phone', 'telegram', 'instagram'],
                'default_sort' => ['column' => 'created_at', 'direction' => 'desc'],
                'create' => false,
                'columns' => [
                    ['key' => 'order_number', 'label' => 'Raqam'],
                    ['key' => 'customer_name', 'label' => 'Mijoz'],
                    ['key' => 'status', 'label' => 'Holat', 'type' => 'badge', 'options' => [Order::class, 'statusOptions']],
                    ['key' => 'shipping_status', 'label' => 'Yetkazish', 'type' => 'badge', 'options' => [Order::class, 'shippingStatusOptions']],
                    ['key' => 'total_amount', 'label' => 'Summa', 'type' => 'money'],
                    ['key' => 'created_at', 'label' => 'Sana', 'type' => 'datetime'],
                ],
                'filters' => [
                    ['name' => 'status', 'label' => 'Holat', 'type' => 'select', 'options' => [Order::class, 'statusOptions']],
                    ['name' => 'shipping_status', 'label' => 'Yetkazish', 'type' => 'select', 'options' => [Order::class, 'shippingStatusOptions']],
                ],
                'sections' => [
                    [
                        'title' => 'Mijoz maʼlumotlari',
                        'description' => 'Kirish maʼlumotlari va manzil tafsilotlari.',
                        'fields' => [
                            ['name' => 'customer_name', 'label' => 'Mijoz', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'phone', 'label' => 'Telefon', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'telegram', 'label' => 'Telegram', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'instagram', 'label' => 'Instagram', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'address', 'label' => 'Manzil', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 4, 'column_span' => 2],
                            ['name' => 'notes', 'label' => 'Mijoz izohi', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 4, 'column_span' => 2],
                        ],
                    ],
                    [
                        'title' => 'Ichki boshqaruv',
                        'description' => 'Admin statuslari va ichki qaydlar.',
                        'fields' => [
                            ['name' => 'status', 'label' => 'Buyurtma holati', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(Order::statusOptions()))], 'options' => [Order::class, 'statusOptions']],
                            ['name' => 'shipping_status', 'label' => 'Yetkazish holati', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(Order::shippingStatusOptions()))], 'options' => [Order::class, 'shippingStatusOptions']],
                            ['name' => 'admin_contacted_at', 'label' => 'Aloqa vaqti', 'type' => 'datetime-local', 'rules' => ['nullable', 'date']],
                            ['name' => 'admin_notes', 'label' => 'Admin izohi', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'custom-orders' => self::resource('custom-orders', [
                'group' => 'Savdo',
                'label' => 'Individual Buyurtmalar',
                'singular' => 'Individual Buyurtma',
                'description' => 'Maxsus tayyorlanadigan buyurtmalar oqimi.',
                'model' => CustomOrder::class,
                'search' => ['order_number', 'customer_name', 'product_name', 'phone'],
                'default_sort' => ['column' => 'created_at', 'direction' => 'desc'],
                'create' => false,
                'columns' => [
                    ['key' => 'order_number', 'label' => 'Raqam'],
                    ['key' => 'customer_name', 'label' => 'Mijoz'],
                    ['key' => 'product_name', 'label' => 'Mahsulot'],
                    ['key' => 'budget', 'label' => 'Byudjet', 'type' => 'money'],
                    ['key' => 'status', 'label' => 'Holat', 'type' => 'badge', 'options' => [CustomOrder::class, 'statusOptions']],
                    ['key' => 'created_at', 'label' => 'Sana', 'type' => 'datetime'],
                ],
                'filters' => [
                    ['name' => 'status', 'label' => 'Holat', 'type' => 'select', 'options' => [CustomOrder::class, 'statusOptions']],
                ],
                'sections' => [
                    [
                        'title' => 'Buyurtma tafsilotlari',
                        'fields' => [
                            ['name' => 'customer_name', 'label' => 'Mijoz', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'phone', 'label' => 'Telefon', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'telegram', 'label' => 'Telegram', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'product_name', 'label' => 'Mahsulot', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'material', 'label' => 'Material', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'size', 'label' => 'Oʻlcham', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'color', 'label' => 'Rang', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'budget', 'label' => 'Byudjet', 'type' => 'number', 'rules' => ['nullable', 'numeric', 'min:0']],
                            ['name' => 'description', 'label' => 'Tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2],
                            ['name' => 'status', 'label' => 'Holat', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(CustomOrder::statusOptions()))], 'options' => [CustomOrder::class, 'statusOptions']],
                            ['name' => 'admin_notes', 'label' => 'Admin izohi', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 4, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'customers' => self::resource('customers', [
                'group' => 'Savdo',
                'label' => 'Mijozlar',
                'singular' => 'Mijoz',
                'description' => 'Mijoz kontaktlari va buyurtma tarixini yuriting.',
                'model' => Customer::class,
                'search' => ['name', 'phone', 'telegram', 'instagram'],
                'default_sort' => ['column' => 'updated_at', 'direction' => 'desc'],
                'columns' => [
                    ['key' => 'name', 'label' => 'Mijoz'],
                    ['key' => 'phone', 'label' => 'Telefon'],
                    ['key' => 'telegram', 'label' => 'Telegram'],
                    ['key' => 'instagram', 'label' => 'Instagram'],
                    ['key' => 'created_at', 'label' => 'Qoʻshilgan', 'type' => 'date'],
                ],
                'sections' => [
                    [
                        'title' => 'Kontaktlar',
                        'fields' => [
                            ['name' => 'name', 'label' => 'F.I.Sh', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'phone', 'label' => 'Telefon', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'telegram', 'label' => 'Telegram', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'instagram', 'label' => 'Instagram', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'notes', 'label' => 'Izoh', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'products' => self::resource('products', [
                'group' => 'Katalog',
                'label' => 'Mahsulotlar',
                'singular' => 'Mahsulot',
                'description' => 'Katalog, narx va vitrina mahsulotlarini boshqaring.',
                'model' => Product::class,
                'with' => ['category'],
                'search' => ['name', 'slug', 'sku', 'material', 'color'],
                'default_sort' => ['column' => 'updated_at', 'direction' => 'desc'],
                'columns' => [
                    ['key' => 'name', 'label' => 'Mahsulot'],
                    ['key' => 'category.name', 'label' => 'Kategoriya'],
                    ['key' => 'price', 'label' => 'Narx', 'type' => 'money'],
                    ['key' => 'stock_status', 'label' => 'Zaxira', 'type' => 'badge', 'options' => [Product::class, 'stockOptions']],
                    ['key' => 'availability_mode', 'label' => 'Mavjudlik', 'type' => 'badge', 'options' => [Product::class, 'availabilityOptions']],
                    ['key' => 'is_active', 'label' => 'Faol', 'type' => 'boolean'],
                ],
                'filters' => [
                    ['name' => 'category_id', 'label' => 'Kategoriya', 'type' => 'select', 'options' => fn (): array => Category::query()->orderBy('name')->pluck('name', 'id')->all()],
                    ['name' => 'stock_status', 'label' => 'Zaxira', 'type' => 'select', 'options' => [Product::class, 'stockOptions']],
                    ['name' => 'is_active', 'label' => 'Faollik', 'type' => 'select', 'options' => self::booleanOptions()],
                ],
                'sections' => [
                    [
                        'title' => 'Asosiy blok',
                        'description' => 'Mahsulotning asosiy katalog maʼlumotlari.',
                        'fields' => [
                            ['name' => 'category_id', 'label' => 'Kategoriya', 'type' => 'select', 'rules' => ['nullable', 'exists:categories,id'], 'options' => fn (): array => Category::query()->orderBy('name')->pluck('name', 'id')->all()],
                            ['name' => 'name', 'label' => 'Nomi', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'rules' => fn (?Model $record): array => ['required', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($record?->getKey())]],
                            ['name' => 'sku', 'label' => 'SKU', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'short_description', 'label' => 'Qisqa tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 3, 'column_span' => 2],
                            ['name' => 'full_description', 'label' => 'Toʻliq tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2],
                            ['name' => 'product_story', 'label' => 'Mahsulot hikoyasi', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2],
                        ],
                    ],
                    [
                        'title' => 'Sotuv parametrlari',
                        'fields' => [
                            ['name' => 'material', 'label' => 'Material', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'size', 'label' => 'Oʻlcham', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'color', 'label' => 'Rang', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'craftsmanship_method', 'label' => 'Hunar usuli', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'production_time', 'label' => 'Tayyorlash vaqti', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'price', 'label' => 'Narx', 'type' => 'number', 'rules' => ['required', 'numeric', 'min:0'], 'step' => '0.01'],
                            ['name' => 'old_price', 'label' => 'Eski narx', 'type' => 'number', 'rules' => ['nullable', 'numeric', 'min:0'], 'step' => '0.01'],
                            ['name' => 'stock_quantity', 'label' => 'Soni', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0']],
                            ['name' => 'stock_status', 'label' => 'Zaxira holati', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(Product::stockOptions()))], 'options' => [Product::class, 'stockOptions']],
                            ['name' => 'availability_mode', 'label' => 'Mavjudlik rejimi', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(Product::availabilityOptions()))], 'options' => [Product::class, 'availabilityOptions']],
                            ['name' => 'main_image', 'label' => 'Asosiy rasm', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048']],
                            ['name' => 'gallery', 'label' => 'Galereya', 'type' => 'array_lines', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2, 'help' => 'Har bir qatorda bitta rasm yoʻli yoki URL kiriting.'],
                            ['name' => 'is_made_to_order', 'label' => 'Buyurtma asosida tayyorlanadi', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'custom_order_available', 'label' => 'Custom order ochiq', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'delivery_available', 'label' => 'Yetkazib berish mavjud', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'is_active', 'label' => 'Faol', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'is_featured', 'label' => 'Tavsiya etilgan', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                        ],
                    ],
                ],
            ]),
            'categories' => self::resource('categories', [
                'group' => 'Katalog',
                'label' => 'Kategoriyalar',
                'singular' => 'Kategoriya',
                'description' => 'Mahsulot bo‘limlarini tartiblang.',
                'model' => Category::class,
                'search' => ['name', 'slug', 'description'],
                'default_sort' => ['column' => 'sort_order', 'direction' => 'asc'],
                'columns' => [
                    ['key' => 'name', 'label' => 'Nomi'],
                    ['key' => 'slug', 'label' => 'Slug'],
                    ['key' => 'sort_order', 'label' => 'Tartib', 'type' => 'number'],
                    ['key' => 'is_active', 'label' => 'Faol', 'type' => 'boolean'],
                ],
                'filters' => [
                    ['name' => 'is_active', 'label' => 'Faollik', 'type' => 'select', 'options' => self::booleanOptions()],
                ],
                'sections' => [
                    [
                        'title' => 'Kategoriya maʼlumoti',
                        'fields' => [
                            ['name' => 'name', 'label' => 'Nomi', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'rules' => fn (?Model $record): array => ['required', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($record?->getKey())]],
                            ['name' => 'sort_order', 'label' => 'Tartib', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0']],
                            ['name' => 'is_active', 'label' => 'Faol', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'description', 'label' => 'Tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'content-blocks' => self::resource('content-blocks', [
                'group' => 'Kontent',
                'label' => 'Kontent Bloklari',
                'singular' => 'Kontent Bloki',
                'description' => 'Sahifa bloklari, CTA va statik matnlarni boshqaring.',
                'model' => ContentBlock::class,
                'search' => ['title', 'subtitle', 'key', 'type'],
                'default_sort' => ['column' => 'sort_order', 'direction' => 'asc'],
                'columns' => [
                    ['key' => 'title', 'label' => 'Sarlavha'],
                    ['key' => 'type', 'label' => 'Turi', 'type' => 'badge', 'options' => [ContentBlock::class, 'typeOptions']],
                    ['key' => 'key', 'label' => 'Kalit'],
                    ['key' => 'sort_order', 'label' => 'Tartib', 'type' => 'number'],
                    ['key' => 'is_active', 'label' => 'Faol', 'type' => 'boolean'],
                ],
                'filters' => [
                    ['name' => 'type', 'label' => 'Turi', 'type' => 'select', 'options' => [ContentBlock::class, 'typeOptions']],
                    ['name' => 'is_active', 'label' => 'Faollik', 'type' => 'select', 'options' => self::booleanOptions()],
                ],
                'sections' => [
                    [
                        'title' => 'Blok tarkibi',
                        'fields' => [
                            ['name' => 'type', 'label' => 'Turi', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(ContentBlock::typeOptions()))], 'options' => [ContentBlock::class, 'typeOptions']],
                            ['name' => 'key', 'label' => 'Kalit', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'title', 'label' => 'Sarlavha', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'image', 'label' => 'Rasm', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048']],
                            ['name' => 'link', 'label' => 'Link', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048']],
                            ['name' => 'sort_order', 'label' => 'Tartib', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0']],
                            ['name' => 'is_active', 'label' => 'Faol', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'content', 'label' => 'Matn', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2],
                            ['name' => 'meta', 'label' => 'Meta JSON', 'type' => 'json', 'rules' => ['nullable', 'json'], 'rows' => 6, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'banners' => self::resource('banners', [
                'group' => 'Kontent',
                'label' => 'Bannerlar',
                'singular' => 'Banner',
                'description' => 'Bosh sahifadagi banner vitrinasi.',
                'model' => ContentBlock::class,
                'scope' => fn (Builder $query): Builder => $query->where('type', ContentBlock::TYPE_BANNER),
                'search' => ['title', 'subtitle', 'key'],
                'default_sort' => ['column' => 'sort_order', 'direction' => 'asc'],
                'defaults' => [
                    'type' => ContentBlock::TYPE_BANNER,
                    'is_active' => true,
                ],
                'columns' => [
                    ['key' => 'title', 'label' => 'Banner'],
                    ['key' => 'key', 'label' => 'Kalit'],
                    ['key' => 'link', 'label' => 'Link'],
                    ['key' => 'sort_order', 'label' => 'Tartib', 'type' => 'number'],
                    ['key' => 'is_active', 'label' => 'Faol', 'type' => 'boolean'],
                ],
                'filters' => [
                    ['name' => 'is_active', 'label' => 'Faollik', 'type' => 'select', 'options' => self::booleanOptions()],
                ],
                'mutate_before_save' => function (array $data): array {
                    $data['type'] = ContentBlock::TYPE_BANNER;

                    return $data;
                },
                'sections' => [
                    [
                        'title' => 'Banner sahnasi',
                        'fields' => [
                            ['name' => 'type', 'label' => 'Turi', 'type' => 'hidden', 'rules' => ['nullable', 'string']],
                            ['name' => 'key', 'label' => 'Kalit', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'title', 'label' => 'Sarlavha', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'link', 'label' => 'Link', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048']],
                            ['name' => 'image', 'label' => 'Rasm', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048']],
                            ['name' => 'sort_order', 'label' => 'Tartib', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0']],
                            ['name' => 'is_active', 'label' => 'Faol', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'content', 'label' => 'Qisqa matn', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 4, 'column_span' => 2],
                            ['name' => 'meta', 'label' => 'Meta JSON', 'type' => 'json', 'rules' => ['nullable', 'json'], 'rows' => 6, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'portfolio-items' => self::resource('portfolio-items', [
                'group' => 'Kontent',
                'label' => 'Portfolio',
                'singular' => 'Portfolio elementi',
                'description' => 'Atelye ishlari va loyihalar vitrinasini yuriting.',
                'model' => PortfolioItem::class,
                'search' => ['title', 'slug', 'project_type', 'excerpt'],
                'default_sort' => ['column' => 'sort_order', 'direction' => 'asc'],
                'columns' => [
                    ['key' => 'title', 'label' => 'Loyiha'],
                    ['key' => 'project_type', 'label' => 'Turi'],
                    ['key' => 'sort_order', 'label' => 'Tartib', 'type' => 'number'],
                    ['key' => 'is_featured', 'label' => 'Featured', 'type' => 'boolean'],
                    ['key' => 'is_active', 'label' => 'Faol', 'type' => 'boolean'],
                ],
                'filters' => [
                    ['name' => 'is_active', 'label' => 'Faollik', 'type' => 'select', 'options' => self::booleanOptions()],
                    ['name' => 'is_featured', 'label' => 'Featured', 'type' => 'select', 'options' => self::booleanOptions()],
                ],
                'sections' => [
                    [
                        'title' => 'Portfolio karta',
                        'fields' => [
                            ['name' => 'title', 'label' => 'Sarlavha', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'rules' => fn (?Model $record): array => ['required', 'string', 'max:255', Rule::unique('portfolio_items', 'slug')->ignore($record?->getKey())]],
                            ['name' => 'project_type', 'label' => 'Loyiha turi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'cover_image', 'label' => 'Muqova rasmi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048']],
                            ['name' => 'sort_order', 'label' => 'Tartib', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0']],
                            ['name' => 'is_featured', 'label' => 'Featured', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'is_active', 'label' => 'Faol', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'excerpt', 'label' => 'Qisqa tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 3, 'column_span' => 2],
                            ['name' => 'description', 'label' => 'Toʻliq tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 6, 'column_span' => 2],
                            ['name' => 'gallery', 'label' => 'Galereya', 'type' => 'array_lines', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2, 'help' => 'Har bir qatorda bitta rasm yoʻli yoki URL kiriting.'],
                        ],
                    ],
                ],
            ]),
            'feedback' => self::resource('feedback', [
                'group' => 'Kontent',
                'label' => 'Fikrlar',
                'singular' => 'Fikr',
                'description' => 'Mijoz sharhlari va moderatsiya oynasi.',
                'model' => Feedback::class,
                'search' => ['customer_name', 'city', 'phone', 'content'],
                'default_sort' => ['column' => 'created_at', 'direction' => 'desc'],
                'create' => false,
                'columns' => [
                    ['key' => 'customer_name', 'label' => 'Mijoz'],
                    ['key' => 'city', 'label' => 'Shahar'],
                    ['key' => 'rating', 'label' => 'Reyting', 'type' => 'number'],
                    ['key' => 'is_approved', 'label' => 'Tasdiq', 'type' => 'boolean'],
                    ['key' => 'is_featured', 'label' => 'Featured', 'type' => 'boolean'],
                    ['key' => 'published_at', 'label' => 'Nashr', 'type' => 'datetime'],
                ],
                'filters' => [
                    ['name' => 'is_approved', 'label' => 'Tasdiq', 'type' => 'select', 'options' => self::booleanOptions()],
                    ['name' => 'is_featured', 'label' => 'Featured', 'type' => 'select', 'options' => self::booleanOptions()],
                ],
                'sections' => [
                    [
                        'title' => 'Sharh boshqaruvi',
                        'fields' => [
                            ['name' => 'customer_name', 'label' => 'Mijoz', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'phone', 'label' => 'Telefon', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'city', 'label' => 'Shahar', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'rating', 'label' => 'Reyting', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:1', 'max:5']],
                            ['name' => 'published_at', 'label' => 'Nashr vaqti', 'type' => 'datetime-local', 'rules' => ['nullable', 'date']],
                            ['name' => 'is_approved', 'label' => 'Tasdiqlangan', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'is_featured', 'label' => 'Featured', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'content', 'label' => 'Fikr', 'type' => 'textarea', 'rules' => ['required', 'string'], 'rows' => 5, 'column_span' => 2],
                            ['name' => 'admin_notes', 'label' => 'Admin qaydi', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 4, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'notification-logs' => self::resource('notification-logs', [
                'group' => 'Tizim',
                'label' => 'Bildirishnomalar',
                'singular' => 'Bildirishnoma',
                'description' => 'Joʻnatmalar jurnali va ichki xabarlar markazi.',
                'model' => NotificationLog::class,
                'search' => ['title', 'message', 'recipient', 'channel'],
                'default_sort' => ['column' => 'created_at', 'direction' => 'desc'],
                'columns' => [
                    ['key' => 'title', 'label' => 'Sarlavha'],
                    ['key' => 'channel', 'label' => 'Kanal', 'type' => 'badge', 'options' => [NotificationLog::class, 'channelOptions']],
                    ['key' => 'status', 'label' => 'Holat', 'type' => 'badge', 'options' => [NotificationLog::class, 'statusOptions']],
                    ['key' => 'recipient', 'label' => 'Qabul qiluvchi'],
                    ['key' => 'sent_at', 'label' => 'Joʻnatilgan', 'type' => 'datetime'],
                ],
                'filters' => [
                    ['name' => 'channel', 'label' => 'Kanal', 'type' => 'select', 'options' => [NotificationLog::class, 'channelOptions']],
                    ['name' => 'status', 'label' => 'Holat', 'type' => 'select', 'options' => [NotificationLog::class, 'statusOptions']],
                ],
                'sections' => [
                    [
                        'title' => 'Xabar',
                        'fields' => [
                            ['name' => 'title', 'label' => 'Sarlavha', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'channel', 'label' => 'Kanal', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(NotificationLog::channelOptions()))], 'options' => [NotificationLog::class, 'channelOptions']],
                            ['name' => 'status', 'label' => 'Holat', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(NotificationLog::statusOptions()))], 'options' => [NotificationLog::class, 'statusOptions']],
                            ['name' => 'recipient', 'label' => 'Qabul qiluvchi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'sent_at', 'label' => 'Joʻnatilgan vaqti', 'type' => 'datetime-local', 'rules' => ['nullable', 'date']],
                            ['name' => 'message', 'label' => 'Xabar matni', 'type' => 'textarea', 'rules' => ['required', 'string'], 'rows' => 6, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'site-settings' => self::resource('site-settings', [
                'group' => 'Tizim',
                'label' => 'Sozlamalar',
                'singular' => 'Sozlama',
                'description' => 'Sayt bo‘ylab ishlatiladigan konfiguratsiya yozuvlari.',
                'model' => SiteSetting::class,
                'search' => ['group', 'key', 'label', 'value'],
                'default_sort' => ['column' => 'group', 'direction' => 'asc'],
                'columns' => [
                    ['key' => 'label', 'label' => 'Label'],
                    ['key' => 'group', 'label' => 'Guruh'],
                    ['key' => 'key', 'label' => 'Kalit'],
                    ['key' => 'type', 'label' => 'Tip', 'type' => 'badge', 'options' => [SiteSetting::class, 'typeOptions']],
                    ['key' => 'is_public', 'label' => 'Public', 'type' => 'boolean'],
                ],
                'filters' => [
                    ['name' => 'group', 'label' => 'Guruh', 'type' => 'text'],
                    ['name' => 'type', 'label' => 'Tip', 'type' => 'select', 'options' => [SiteSetting::class, 'typeOptions']],
                ],
                'sections' => [
                    [
                        'title' => 'Sozlama yozuvi',
                        'fields' => [
                            ['name' => 'group', 'label' => 'Guruh', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'key', 'label' => 'Kalit', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'label', 'label' => 'Label', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'type', 'label' => 'Tip', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(SiteSetting::typeOptions()))], 'options' => [SiteSetting::class, 'typeOptions']],
                            ['name' => 'is_public', 'label' => 'Public', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'value', 'label' => 'Qiymat', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 6, 'column_span' => 2],
                        ],
                    ],
                ],
            ]),
            'users' => self::resource('users', [
                'group' => 'Tizim',
                'label' => 'Foydalanuvchilar',
                'singular' => 'Foydalanuvchi',
                'description' => 'Admin akkauntlari va rollarni boshqaring.',
                'model' => User::class,
                'search' => ['name', 'login', 'email'],
                'default_sort' => ['column' => 'created_at', 'direction' => 'desc'],
                'columns' => [
                    ['key' => 'name', 'label' => 'Ism'],
                    ['key' => 'login', 'label' => 'Login'],
                    ['key' => 'email', 'label' => 'Email'],
                    ['key' => 'created_at', 'label' => 'Qoʻshilgan', 'type' => 'date'],
                ],
                'prepare_form_data' => function (?Model $record, array $data): array {
                    if ($record instanceof User) {
                        $data['role'] = $record->roles()->pluck('name')->first();
                    }

                    return $data;
                },
                'after_save' => function (User $record, array $data): void {
                    if (! empty($data['role'])) {
                        $record->syncRoles([$data['role']]);
                    }
                },
                'sections' => [
                    [
                        'title' => 'Admin akkaunti',
                        'fields' => [
                            ['name' => 'name', 'label' => 'Ism', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'login', 'label' => 'Login', 'type' => 'text', 'rules' => fn (?Model $record): array => ['required', 'string', 'max:255', Rule::unique('users', 'login')->ignore($record?->getKey())]],
                            ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'rules' => fn (?Model $record): array => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($record?->getKey())]],
                            ['name' => 'role', 'label' => 'Rol', 'type' => 'select', 'rules' => ['required', 'string', 'max:255'], 'options' => fn (): array => Role::query()->orderBy('name')->pluck('name', 'name')->all()],
                            ['name' => 'password', 'label' => 'Parol', 'type' => 'password', 'rules' => fn (?Model $record): array => [$record ? 'nullable' : 'required', 'string', 'min:8']],
                        ],
                    ],
                ],
            ]),
        ];
    }

    public static function grouped(): array
    {
        return collect(self::all())
            ->groupBy('group')
            ->map(fn (Collection $resources): array => $resources->values()->all())
            ->all();
    }

    public static function find(string $key): array
    {
        $resource = self::all()[$key] ?? null;

        abort_if($resource === null, 404);

        return $resource;
    }

    private static function resource(string $key, array $definition): array
    {
        return array_merge([
            'key' => $key,
            'create' => true,
            'delete' => true,
            'defaults' => [],
            'columns' => [],
            'filters' => [],
            'sections' => [],
            'with' => [],
            'search' => [],
        ], $definition);
    }

    private static function booleanOptions(): array
    {
        return [
            '1' => 'Ha',
            '0' => 'Yoʻq',
        ];
    }

    public static function fields(array $resource): array
    {
        return collect($resource['sections'])
            ->flatMap(fn (array $section): array => $section['fields'] ?? [])
            ->values()
            ->all();
    }

    public static function fieldNames(array $resource): array
    {
        return collect(self::fields($resource))
            ->pluck('name')
            ->filter()
            ->values()
            ->all();
    }

    public static function options(array $definition): array
    {
        $options = $definition['options'] ?? [];

        if (is_callable($options)) {
            $options = $options();
        }

        return Arr::wrap($options);
    }
}
