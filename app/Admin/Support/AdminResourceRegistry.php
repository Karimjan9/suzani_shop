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
                'nav_note' => 'Bosh sahifadagi tovar kartochkalari shu bo‘limga bog‘langan.',
                'nav_meta' => 'Live',
                'editor_tip' => 'Bu yerda saqlangan faol mahsulotlar bosh sahifadagi top mahsulotlar va katalog kartalarida ko‘rinadi. `Asosiy rasm` hamda `Galereya` maydonlari kartochka ichidagi suratlarni to‘g‘ridan-to‘g‘ri boshqaradi.',
                'page_map' => [
                    [
                        'title' => 'Top mahsulotlar bloki',
                        'description' => '`Tavsiya etilgan` va faol mahsulotlar bosh sahifaning yuqori product bo‘limiga chiqadi.',
                        'path' => '/#products',
                        'state' => 'live',
                    ],
                    [
                        'title' => 'Katalog bo‘limi',
                        'description' => 'Faol mahsulotlar qidiruv, filter va galereya bilan umumiy katalogda ko‘rinadi.',
                        'path' => '/#catalog',
                        'state' => 'live',
                    ],
                ],
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
                            self::translationField([
                                ['name' => 'name', 'label' => 'Nomi'],
                                ['name' => 'short_description', 'label' => 'Qisqa tavsif', 'type' => 'textarea', 'rows' => 3],
                                ['name' => 'full_description', 'label' => 'To‘liq tavsif', 'type' => 'textarea', 'rows' => 4],
                                ['name' => 'product_story', 'label' => 'Mahsulot hikoyasi', 'type' => 'textarea', 'rows' => 4],
                                ['name' => 'material', 'label' => 'Material'],
                                ['name' => 'size', 'label' => 'O‘lcham'],
                                ['name' => 'color', 'label' => 'Rang'],
                                ['name' => 'craftsmanship_method', 'label' => 'Hunar usuli'],
                                ['name' => 'production_time', 'label' => 'Tayyorlash vaqti'],
                            ]),
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
                            ['name' => 'main_image', 'label' => 'Asosiy rasm', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:5120'], 'column_span' => 2, 'help' => 'Kompyuterdan rasm tanlang. JPG, PNG yoki WEBP bo‘lishi mumkin.'],
                            ['name' => 'gallery', 'label' => 'Galereya', 'type' => 'images', 'rules' => ['nullable', 'array'], 'file_rules' => ['image', 'max:5120'], 'column_span' => 2, 'help' => 'Bir nechta rasm tanlashingiz mumkin. Yangi fayllar tanlansa, eski galereya yangilanadi.'],
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
                            self::translationField([
                                ['name' => 'name', 'label' => 'Nomi'],
                                ['name' => 'description', 'label' => 'Tavsif', 'type' => 'textarea', 'rows' => 4],
                            ]),
                        ],
                    ],
                ],
            ]),
            'content-blocks' => self::resource('content-blocks', [
                'group' => 'Kontent',
                'label' => 'Matn bloklari',
                'singular' => 'Matn bloki',
                'description' => 'Mayda matnli qismlar: biz haqimizda, CTA, kontakt va boshqa yordamchi yozuvlar.',
                'nav_note' => 'Mayda matn qismlari va yordamchi bloklar.',
                'nav_meta' => 'Matn',
                'editor_tip' => 'Bu bo‘lim kichik matn bloklarini tartiblaydi. Hozircha ularning bir qismi draft holatda saqlanadi va keyingi ulanishlar uchun tayyor turadi.',
                'form_columns' => 1,
                'page_map' => [
                    [
                        'title' => 'Matnli yordamchi bloklar',
                        'description' => 'Biz haqimizda, CTA, kontakt kabi bo‘limlar uchun tayyor matnlar shu yerda saqlanadi.',
                        'state' => 'draft',
                    ],
                ],
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
                        'title' => '1. Qayerda ishlatiladi',
                        'description' => 'Avval blokning turini va tartibini belgilang.',
                        'fields' => [
                            ['name' => 'type', 'label' => 'Blok turi', 'type' => 'select', 'rules' => ['required', Rule::in(array_keys(ContentBlock::typeOptions()))], 'options' => [ContentBlock::class, 'typeOptions'], 'help' => 'Masalan: Biz haqimizda, CTA yoki Kontakt.'],
                            ['name' => 'key', 'label' => 'Ichki kalit', 'type' => 'text', 'rules' => ['required', 'string', 'max:255'], 'help' => 'Texnik nom. Bir xil bo‘lmasin.'],
                            ['name' => 'sort_order', 'label' => 'Tartib raqami', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0'], 'help' => 'Kichik raqam oldin chiqadi.'],
                            ['name' => 'is_active', 'label' => 'Faol blok', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                        ],
                    ],
                    [
                        'title' => '2. Ko‘rinadigan matn',
                        'description' => 'Foydalanuvchi ko‘radigan sarlavha va matn shu yerda yoziladi.',
                        'fields' => [
                            ['name' => 'title', 'label' => 'Sarlavha', 'type' => 'text', 'rules' => ['required', 'string', 'max:255'], 'help' => 'Katta ko‘rinadigan asosiy matn.'],
                            ['name' => 'subtitle', 'label' => 'Kichik izoh', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'help' => 'Sarlavha ustida yoki tagida chiqadigan qisqa yozuv.'],
                            ['name' => 'content', 'label' => 'Asosiy matn', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 5, 'column_span' => 2, 'help' => 'Bo‘limning asosiy matni yoki tavsifi.'],
                            ['name' => 'link', 'label' => 'Tugma yoki yo‘naltirish linki', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048'], 'column_span' => 2, 'help' => 'Kerak bo‘lsa `/#contact` yoki tashqi URL yozing.'],
                            self::translationField([
                                ['name' => 'title', 'label' => 'Sarlavha'],
                                ['name' => 'subtitle', 'label' => 'Kichik izoh'],
                                ['name' => 'content', 'label' => 'Asosiy matn', 'type' => 'textarea', 'rows' => 4],
                            ], [
                                ['name' => 'hero_main_badge', 'label' => 'Hero asosiy badge'],
                                ['name' => 'hero_main_title', 'label' => 'Hero asosiy nom'],
                                ['name' => 'hero_main_caption', 'label' => 'Hero asosiy izoh', 'type' => 'textarea', 'rows' => 2],
                                ['name' => 'hero_detail_badge', 'label' => 'Hero detal badge'],
                                ['name' => 'hero_detail_title', 'label' => 'Hero detal nom'],
                                ['name' => 'hero_material_badge', 'label' => 'Hero material badge'],
                                ['name' => 'hero_material_title', 'label' => 'Hero material nom'],
                                ['name' => 'phone_label', 'label' => 'Telefon label'],
                                ['name' => 'address_label', 'label' => 'Manzil label'],
                                ['name' => 'address_value', 'label' => 'Manzil qiymati'],
                                ['name' => 'hours_label', 'label' => 'Ish vaqti label'],
                                ['name' => 'hours_value', 'label' => 'Ish vaqti qiymati'],
                                ['name' => 'map_label', 'label' => 'Xarita label'],
                                ['name' => 'map_title', 'label' => 'Xarita sarlavhasi'],
                                ['name' => 'form_label', 'label' => 'Forma label'],
                                ['name' => 'form_title', 'label' => 'Forma sarlavhasi'],
                                ['name' => 'form_name_label', 'label' => 'Ism label'],
                                ['name' => 'form_name_placeholder', 'label' => 'Ism placeholder'],
                                ['name' => 'form_phone_label', 'label' => 'Telefon form label'],
                                ['name' => 'form_social_label', 'label' => 'Social label'],
                                ['name' => 'form_social_placeholder', 'label' => 'Social placeholder'],
                                ['name' => 'form_message_label', 'label' => 'Xabar label'],
                                ['name' => 'form_message_placeholder', 'label' => 'Xabar placeholder'],
                                ['name' => 'form_success_note', 'label' => 'Success matni', 'type' => 'textarea', 'rows' => 2],
                            ]),
                        ],
                    ],
                    [
                        'title' => '3. Media va qo‘shimcha',
                        'description' => 'Qo‘shimcha rasm yoki texnik JSON shu yerda saqlanadi.',
                        'fields' => [
                            ['name' => 'image', 'label' => 'Rasm', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:5120'], 'column_span' => 2, 'help' => 'Blok uchun bitta rasm yuklang.'],
                            ['name' => 'meta', 'label' => 'Qo‘shimcha JSON', 'type' => 'json', 'rules' => ['nullable', 'json'], 'rows' => 6, 'column_span' => 2, 'help' => 'Faqat kerak bo‘lsa to‘ldiring. Oddiy foydalanuvchi uchun shart emas.'],
                        ],
                    ],
                ],
            ]),
            'contact-settings' => self::resource('contact-settings', [
                'group' => 'Kontent',
                'label' => 'Aloqa sozlamalari',
                'singular' => 'Aloqa sozlamalari',
                'description' => 'Aloqa bo‘limi, footer kontaktlari va xarita markerini bitta joydan boshqaring.',
                'nav_note' => 'Telefon, manzil, ish vaqti va xarita.',
                'nav_meta' => 'Aloqa',
                'editor_tip' => 'Bu yerda o‘zgargan ma’lumotlar aloqa bo‘limi, footer kontaktlari va xaritadagi markerga ta’sir qiladi.',
                'form_columns' => 1,
                'page_map' => [
                    [
                        'title' => 'Aloqa bo‘limi',
                        'description' => 'Asosiy sahifadagi kontaktlar, xarita va tezkor aloqa formasi shu joydan boshqariladi.',
                        'path' => '/#contact',
                        'state' => 'live',
                    ],
                ],
                'model' => ContentBlock::class,
                'scope' => fn (Builder $query): Builder => $query
                    ->where('type', ContentBlock::TYPE_CONTACT)
                    ->where('key', 'contact-main'),
                'search' => ['title', 'subtitle', 'key'],
                'default_sort' => ['column' => 'sort_order', 'direction' => 'asc'],
                'defaults' => [
                    'type' => ContentBlock::TYPE_CONTACT,
                    'key' => 'contact-main',
                    'is_active' => true,
                    'sort_order' => 1,
                ],
                'columns' => [
                    ['key' => 'title', 'label' => 'Sarlavha'],
                    ['key' => 'subtitle', 'label' => 'Bo‘lim nomi'],
                    ['key' => 'key', 'label' => 'Kalit'],
                    ['key' => 'is_active', 'label' => 'Faol', 'type' => 'boolean'],
                ],
                'filters' => [
                    ['name' => 'is_active', 'label' => 'Faollik', 'type' => 'select', 'options' => self::booleanOptions()],
                ],
                'prepare_form_data' => fn (?Model $record, array $data): array => self::prepareContactFormData($record, $data),
                'mutate_before_save' => fn (array $data, ?Model $record): array => self::mutateContactPayload($data, $record),
                'sections' => [
                    [
                        'title' => '1. Asosiy bo‘lim',
                        'description' => 'Aloqa section tepasida ko‘rinadigan sarlavha va kirish matni.',
                        'fields' => [
                            ['name' => 'type', 'label' => 'Turi', 'type' => 'hidden', 'rules' => ['nullable', 'string']],
                            ['name' => 'key', 'label' => 'Kalit', 'type' => 'hidden', 'rules' => ['nullable', 'string']],
                            ['name' => 'sort_order', 'label' => 'Tartib', 'type' => 'hidden', 'rules' => ['nullable', 'integer']],
                            ['name' => 'subtitle', 'label' => 'Kichik label', 'type' => 'text', 'rules' => ['required', 'string', 'max:255'], 'help' => 'Masalan: Aloqa'],
                            ['name' => 'title', 'label' => 'Katta sarlavha', 'type' => 'text', 'rules' => ['required', 'string', 'max:255'], 'column_span' => 2],
                            ['name' => 'content', 'label' => 'Kirish matni', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 4, 'column_span' => 2],
                            ['name' => 'is_active', 'label' => 'Aloqa bo‘limi faol', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                        ],
                    ],
                    [
                        'title' => '2. Kontakt kanallari',
                        'description' => 'Telefon, Telegram va Instagram ko‘rinishi hamda linklari.',
                        'fields' => [
                            ['name' => 'phone_label', 'label' => 'Telefon label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'phone_value', 'label' => 'Telefon', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'telegram_label', 'label' => 'Telegram label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'telegram_value', 'label' => 'Telegram yozuvi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'help' => 'Masalan: @suzanishop'],
                            ['name' => 'telegram_url', 'label' => 'Telegram linki', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048'], 'column_span' => 2, 'help' => 'Bo‘sh qoldirilsa `@username` dan avtomatik link yasaladi.'],
                            ['name' => 'instagram_label', 'label' => 'Instagram label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'instagram_value', 'label' => 'Instagram yozuvi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'help' => 'Masalan: @suzanishop'],
                            ['name' => 'instagram_url', 'label' => 'Instagram linki', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048'], 'column_span' => 2],
                        ],
                    ],
                    [
                        'title' => '3. Manzil va ish vaqti',
                        'description' => 'Manzil kartasi va footer ichida ishlatiladigan ma’lumotlar.',
                        'fields' => [
                            ['name' => 'address_label', 'label' => 'Manzil label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'address_value', 'label' => 'Manzil', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 3, 'column_span' => 2],
                            ['name' => 'hours_label', 'label' => 'Ish vaqti label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'hours_value', 'label' => 'Ish vaqti', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'column_span' => 2],
                        ],
                    ],
                    [
                        'title' => '4. Xarita va marker',
                        'description' => 'Xarita tepasidagi yozuvlar va marker koordinatalari.',
                        'fields' => [
                            ['name' => 'map_label', 'label' => 'Xarita label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'map_title', 'label' => 'Xarita sarlavhasi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'map_latitude', 'label' => 'Latitude', 'type' => 'number', 'rules' => ['nullable', 'numeric', 'between:-90,90'], 'step' => '0.000001'],
                            ['name' => 'map_longitude', 'label' => 'Longitude', 'type' => 'number', 'rules' => ['nullable', 'numeric', 'between:-180,180'], 'step' => '0.000001'],
                            ['name' => 'map_zoom', 'label' => 'Zoom', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:8', 'max:18'], 'help' => 'Kattaroq raqam bo‘lsa, xarita yaqinroq ko‘rinadi.'],
                        ],
                    ],
                    [
                        'title' => '5. Tezkor forma',
                        'description' => 'Aloqa formasi ichidagi barcha yozuvlar.',
                        'fields' => [
                            ['name' => 'form_label', 'label' => 'Forma label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'form_title', 'label' => 'Forma sarlavhasi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'column_span' => 2],
                            ['name' => 'form_name_label', 'label' => 'Ism maydoni label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'form_name_placeholder', 'label' => 'Ism placeholder', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'form_phone_label', 'label' => 'Telefon maydoni label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'form_phone_placeholder', 'label' => 'Telefon placeholder', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'form_social_label', 'label' => 'Ijtimoiy tarmoq maydoni label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'form_social_placeholder', 'label' => 'Ijtimoiy tarmoq placeholder', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'column_span' => 2],
                            ['name' => 'form_message_label', 'label' => 'Xabar maydoni label', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'form_message_placeholder', 'label' => 'Xabar placeholder', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 3, 'column_span' => 2],
                            ['name' => 'form_success_note', 'label' => 'Muvaffaqiyat xabari', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 3, 'column_span' => 2],
                        ],
                    ],
                    [
                        'title' => '6. Tarjimalar',
                        'description' => 'Rus va ingliz tillari uchun aloqa bo‘limi matnlari.',
                        'fields' => [
                            self::translationField([
                                ['name' => 'title', 'label' => 'Katta sarlavha'],
                                ['name' => 'subtitle', 'label' => 'Kichik label'],
                                ['name' => 'content', 'label' => 'Kirish matni', 'type' => 'textarea', 'rows' => 4],
                            ], [
                                ['name' => 'phone_label', 'label' => 'Telefon label'],
                                ['name' => 'address_label', 'label' => 'Manzil label'],
                                ['name' => 'address_value', 'label' => 'Manzil qiymati'],
                                ['name' => 'hours_label', 'label' => 'Ish vaqti label'],
                                ['name' => 'hours_value', 'label' => 'Ish vaqti qiymati'],
                                ['name' => 'map_label', 'label' => 'Xarita label'],
                                ['name' => 'map_title', 'label' => 'Xarita sarlavhasi'],
                                ['name' => 'form_label', 'label' => 'Forma label'],
                                ['name' => 'form_title', 'label' => 'Forma sarlavhasi'],
                                ['name' => 'form_name_label', 'label' => 'Ism label'],
                                ['name' => 'form_name_placeholder', 'label' => 'Ism placeholder'],
                                ['name' => 'form_phone_label', 'label' => 'Telefon form label'],
                                ['name' => 'form_social_label', 'label' => 'Social label'],
                                ['name' => 'form_social_placeholder', 'label' => 'Social placeholder'],
                                ['name' => 'form_message_label', 'label' => 'Xabar label'],
                                ['name' => 'form_message_placeholder', 'label' => 'Xabar placeholder'],
                                ['name' => 'form_success_note', 'label' => 'Success matni', 'type' => 'textarea', 'rows' => 2],
                            ]),
                        ],
                    ],
                ],
            ]),
            'banners' => self::resource('banners', [
                'group' => 'Kontent',
                'label' => 'Hero banner',
                'singular' => 'Hero banner',
                'description' => 'Bosh sahifaning eng yuqori qismidagi katta sarlavha va kirish matni.',
                'nav_note' => 'Bosh sahifaning birinchi ko‘rinadigan qismi.',
                'nav_meta' => 'Hero',
                'editor_tip' => 'Bu yerda yozilgan sarlavha va matn bosh sahifaning yuqori qismida ko‘rinadi.',
                'form_columns' => 1,
                'page_map' => [
                    [
                        'title' => 'Bosh sahifa hero qismi',
                        'description' => 'Katta sarlavha va kirish matni shu bo‘limdan boshqariladi.',
                        'path' => '/',
                        'state' => 'live',
                    ],
                ],
                'model' => ContentBlock::class,
                'scope' => fn (Builder $query): Builder => $query->where('type', ContentBlock::TYPE_BANNER),
                'search' => ['title', 'subtitle', 'key'],
                'default_sort' => ['column' => 'sort_order', 'direction' => 'asc'],
                'defaults' => [
                    'type' => ContentBlock::TYPE_BANNER,
                    'is_active' => true,
                ],
                'prepare_form_data' => fn (?Model $record, array $data): array => self::prepareBannerFormData($record, $data),
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
                'mutate_before_save' => fn (array $data, ?Model $record): array => self::mutateBannerPayload($data, $record),
                'sections' => [
                    [
                        'title' => '1. Qayerda chiqadi',
                        'description' => 'Hero banner tartibi va aktiv holatini shu yerda belgilang.',
                        'fields' => [
                            ['name' => 'type', 'label' => 'Turi', 'type' => 'hidden', 'rules' => ['nullable', 'string']],
                            ['name' => 'key', 'label' => 'Ichki kalit', 'type' => 'text', 'rules' => ['required', 'string', 'max:255'], 'help' => 'Masalan: hero-main'],
                            ['name' => 'sort_order', 'label' => 'Tartib raqami', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0'], 'help' => 'Bir nechta banner bo‘lsa, kichik raqam birinchi bo‘ladi.'],
                            ['name' => 'is_active', 'label' => 'Faol', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                        ],
                    ],
                    [
                        'title' => '2. Ko‘rinadigan matn',
                        'description' => 'Bosh sahifada ko‘rinadigan yozuvlar shu yerda turadi.',
                        'fields' => [
                            ['name' => 'title', 'label' => 'Katta sarlavha', 'type' => 'text', 'rules' => ['required', 'string', 'max:255'], 'column_span' => 2],
                            ['name' => 'subtitle', 'label' => 'Kichik yozuv', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'column_span' => 2, 'help' => 'Sarlavha ustidagi yoki yonidagi qisqa izoh.'],
                            ['name' => 'content', 'label' => 'Kirish matni', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 4, 'column_span' => 2],
                            ['name' => 'link', 'label' => 'Yo‘naltirish linki', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:2048'], 'column_span' => 2, 'help' => 'Masalan: `/#catalog` yoki tashqi URL.'],
                            self::translationField([
                                ['name' => 'title', 'label' => 'Katta sarlavha'],
                                ['name' => 'subtitle', 'label' => 'Kichik yozuv'],
                                ['name' => 'content', 'label' => 'Kirish matni', 'type' => 'textarea', 'rows' => 4],
                            ], [
                                ['name' => 'hero_main_badge', 'label' => 'Asosiy badge'],
                                ['name' => 'hero_main_title', 'label' => 'Asosiy karta sarlavhasi'],
                                ['name' => 'hero_main_caption', 'label' => 'Asosiy karta izohi', 'type' => 'textarea', 'rows' => 3],
                                ['name' => 'hero_detail_badge', 'label' => 'Detail badge'],
                                ['name' => 'hero_detail_title', 'label' => 'Detail karta matni'],
                                ['name' => 'hero_material_badge', 'label' => 'Material badge'],
                                ['name' => 'hero_material_title', 'label' => 'Material karta matni'],
                            ]),
                        ],
                    ],
                    [
                        'title' => '3. Qo‘shimcha media',
                        'description' => 'Rasm va texnik ma’lumotlar keyingi bezaklar uchun saqlanadi.',
                        'fields' => [
                            ['name' => 'image', 'label' => 'Asosiy hero rasmi', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:10240'], 'column_span' => 2, 'help' => 'Chapdagi katta karta rasmi.'],
                            ['name' => 'hero_main_badge', 'label' => 'Asosiy badge', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'hero_main_title', 'label' => 'Asosiy karta sarlavhasi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'hero_main_caption', 'label' => 'Asosiy karta izohi', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 3, 'column_span' => 2],
                            ['name' => 'hero_detail_image', 'label' => 'Detail rasmi', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:10240'], 'column_span' => 2, 'help' => 'O\'ng yuqoridagi detail karta rasmi.'],
                            ['name' => 'hero_detail_badge', 'label' => 'Detail badge', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'hero_detail_title', 'label' => 'Detail karta matni', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'hero_material_image', 'label' => 'Material rasmi', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:10240'], 'column_span' => 2, 'help' => 'O\'ng pastdagi material karta rasmi.'],
                            ['name' => 'hero_material_badge', 'label' => 'Material badge', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'hero_material_title', 'label' => 'Material karta matni', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'meta', 'label' => 'Meta JSON', 'type' => 'json', 'rules' => ['nullable', 'json'], 'rows' => 6, 'column_span' => 2, 'help' => 'Texnik sozlama uchun. Odatda yuqoridagi maydonlar kifoya qiladi.'],
                        ],
                    ],
                ],
            ]),
            'portfolio-items' => self::resource('portfolio-items', [
                'group' => 'Kontent',
                'label' => 'Portfolio kartalari',
                'singular' => 'Portfolio kartasi',
                'description' => 'Bosh sahifadagi portfolio bo‘limida chiqadigan real ishlar kartalari.',
                'nav_note' => 'Bajarilgan ishlar va loyiha kartalari.',
                'nav_meta' => 'Portfo',
                'editor_tip' => 'Bu kartalar bosh sahifadagi Portfolio bo‘limida to‘g‘ridan-to‘g‘ri ko‘rinadi.',
                'form_columns' => 1,
                'page_map' => [
                    [
                        'title' => 'Portfolio bo‘limi',
                        'description' => 'Asosiy sahifadagi “Portfolio / Galereya” kartalari shu yerda boshqariladi.',
                        'path' => '/#portfolio',
                        'state' => 'live',
                    ],
                ],
                'model' => PortfolioItem::class,
                'search' => ['title', 'slug', 'project_type', 'highlight_value', 'excerpt'],
                'default_sort' => ['column' => 'sort_order', 'direction' => 'asc'],
                'columns' => [
                    ['key' => 'title', 'label' => 'Loyiha'],
                    ['key' => 'project_type', 'label' => 'Turi'],
                    ['key' => 'highlight_value', 'label' => 'Highlight'],
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
                        'title' => '1. Karta asoslari',
                        'description' => 'Kartani aniqlab beradigan asosiy maydonlar.',
                        'fields' => [
                            ['name' => 'title', 'label' => 'Karta sarlavhasi', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'rules' => fn (?Model $record): array => ['required', 'string', 'max:255', Rule::unique('portfolio_items', 'slug')->ignore($record?->getKey())]],
                            ['name' => 'project_type', 'label' => 'Kichik tur yozuvi', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'help' => 'Masalan: Premium interyer yoki Shaxsiy buyurtma.'],
                            ['name' => 'highlight_value', 'label' => 'Karta ustidagi katta yozuv', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255'], 'help' => 'Masalan: 260 x 190 sm yoki Custom set.'],
                            ['name' => 'cover_image', 'label' => 'Muqova rasmi', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:5120'], 'column_span' => 2, 'help' => 'Portfolio kartasining asosiy rasmini yuklang.'],
                            ['name' => 'sort_order', 'label' => 'Tartib raqami', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0']],
                            ['name' => 'is_featured', 'label' => 'Muhim karta', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'is_active', 'label' => 'Asosiy pageda ko‘rinsin', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'excerpt', 'label' => 'Qisqa tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 3, 'column_span' => 2],
                            self::translationField([
                                ['name' => 'title', 'label' => 'Karta sarlavhasi'],
                                ['name' => 'project_type', 'label' => 'Kichik tur yozuvi'],
                                ['name' => 'highlight_value', 'label' => 'Karta ustidagi katta yozuv'],
                                ['name' => 'excerpt', 'label' => 'Qisqa tavsif', 'type' => 'textarea', 'rows' => 3],
                                ['name' => 'description', 'label' => 'To‘liq tavsif', 'type' => 'textarea', 'rows' => 4],
                            ]),
                            ['name' => 'description', 'label' => 'Toʻliq tavsif', 'type' => 'textarea', 'rules' => ['nullable', 'string'], 'rows' => 6, 'column_span' => 2],
                            ['name' => 'gallery', 'label' => 'Galereya', 'type' => 'images', 'rules' => ['nullable', 'array'], 'file_rules' => ['image', 'max:5120'], 'column_span' => 2, 'help' => 'Bir nechta rasm tanlashingiz mumkin. Yangi fayllar tanlansa, eski galereya yangilanadi.'],
                        ],
                    ],
                ],
            ]),
            'feedback' => self::resource('feedback', [
                'group' => 'Kontent',
                'label' => 'Mijoz fikrlari',
                'singular' => 'Mijoz fikri',
                'description' => 'Bosh sahifadagi sharhlar bo‘limi uchun oddiy va tushunarli fikrlar boshqaruvi.',
                'nav_note' => 'Asosiy sahifadagi testimonial kartalar.',
                'nav_meta' => 'Fikr',
                'editor_tip' => 'Tasdiqlangan fikrlar bosh sahifadagi “Mijoz fikrlari” bo‘limida ko‘rinadi.',
                'form_columns' => 1,
                'page_map' => [
                    [
                        'title' => 'Mijoz fikrlari bo‘limi',
                        'description' => 'Pastki qismdagi testimonial kartalar shu yerda boshqariladi.',
                        'path' => '/#testimonials',
                        'state' => 'live',
                    ],
                ],
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
                        'title' => 'Mijoz fikri',
                        'description' => 'Mijoz ma’lumoti, fikr matni va ko‘rinish holatini shu yerda boshqaring.',
                        'fields' => [
                            ['name' => 'customer_name', 'label' => 'Mijoz', 'type' => 'text', 'rules' => ['required', 'string', 'max:255']],
                            ['name' => 'phone', 'label' => 'Telefon', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'city', 'label' => 'Shahar', 'type' => 'text', 'rules' => ['nullable', 'string', 'max:255']],
                            ['name' => 'rating', 'label' => 'Reyting', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:1', 'max:5']],
                            ['name' => 'published_at', 'label' => 'Nashr vaqti', 'type' => 'datetime-local', 'rules' => ['nullable', 'date']],
                            ['name' => 'is_approved', 'label' => 'Asosiy pageda ko‘rinsin', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'is_featured', 'label' => 'Muhim fikr sifatida belgilash', 'type' => 'checkbox', 'rules' => ['nullable', 'boolean']],
                            ['name' => 'content', 'label' => 'Fikr matni', 'type' => 'textarea', 'rules' => ['required', 'string'], 'rows' => 5, 'column_span' => 2],
                            self::translationField([
                                ['name' => 'customer_name', 'label' => 'Mijoz'],
                                ['name' => 'city', 'label' => 'Shahar'],
                                ['name' => 'content', 'label' => 'Fikr matni', 'type' => 'textarea', 'rows' => 4],
                            ]),
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
            'nav_note' => null,
            'nav_meta' => null,
            'editor_tip' => null,
            'page_map' => [],
            'form_columns' => 2,
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

    private static function translationField(array $fields, array $metaFields = []): array
    {
        return [
            'name' => 'translations',
            'label' => 'Tarjimalar',
            'type' => 'translations',
            'rules' => ['nullable', 'array'],
            'fields' => $fields,
            'meta_fields' => $metaFields,
            'column_span' => 2,
            'help' => 'UZ matn asosiy maydonlarda saqlanadi. RU va EN matnlar shu panelda kiritiladi; bo‘sh qolsa, sayt UZ variantini ko‘rsatadi.',
        ];
    }

    private static function bannerMetaDefaults(array $meta = []): array
    {
        return array_merge([
            'hero_main_badge' => 'Asosiy kolleksiya',
            'hero_main_title' => 'Anor Suzani',
            'hero_main_caption' => 'Katta format, mayin ranglar va qo\'lda ishlangan nafis naqshlar.',
            'hero_detail_image' => '/images/home/hero/hero-detail.jpg',
            'hero_detail_badge' => 'Detail',
            'hero_detail_title' => 'Kashta teksturasi',
            'hero_material_image' => '/images/home/hero/suzani1.jpg',
            'hero_material_badge' => 'Material',
            'hero_material_title' => 'Ustaxona jarayoni va tabiiy mato',
        ], $meta);
    }

    private static function prepareBannerFormData(?Model $record, array $data): array
    {
        $meta = self::bannerMetaDefaults(Arr::wrap($record?->meta));

        foreach ($meta as $key => $value) {
            $data[$key] = $value;
        }

        $data['type'] = ContentBlock::TYPE_BANNER;
        $data['key'] = $record?->key ?? ($data['key'] ?? 'home-hero');
        $data['sort_order'] = $record?->sort_order ?? ($data['sort_order'] ?? 1);
        $data['subtitle'] = $record?->subtitle ?? ($data['subtitle'] ?? 'Hunarmand ustaxonasidan');
        $data['title'] = $record?->title ?? ($data['title'] ?? 'Qo\'l mehnatida yaralgan san\'at asarlari');
        $data['content'] = $record?->content ?? ($data['content'] ?? 'Suzani Shop interyer uchun nafis, sokin va qadrli mahsulotlar yaratadi. Har bir mahsulotda qo\'l mehnati, iliq ranglar va sifatli materiallar orqali uyga hissiyot olib kiradigan ruh bor.');
        $data['image'] = $record?->image ?? ($data['image'] ?? '/images/home/hero/hero-main.jpg');

        return $data;
    }

    private static function mutateBannerPayload(array $data, ?Model $record): array
    {
        $existingMeta = self::bannerMetaDefaults(Arr::wrap($record?->meta));
        $metaKeys = array_keys(self::bannerMetaDefaults());
        $nextMeta = [];

        foreach ($metaKeys as $metaKey) {
            $nextMeta[$metaKey] = $data[$metaKey] ?? $existingMeta[$metaKey] ?? null;
            unset($data[$metaKey]);
        }

        $data['type'] = ContentBlock::TYPE_BANNER;
        $data['key'] = $data['key'] ?? $record?->key ?? 'home-hero';
        $data['sort_order'] = $data['sort_order'] ?? $record?->sort_order ?? 1;
        $data['meta'] = array_merge($existingMeta, Arr::wrap($data['meta'] ?? []), $nextMeta);

        return $data;
    }

    private static function contactMetaDefaults(array $meta = []): array
    {
        return array_merge([
            'phone_label' => 'Telefon',
            'phone_value' => '+99894 5450110',
            'telegram_label' => 'Telegram',
            'telegram_value' => '@mohitobon_art',
            'telegram_url' => 'https://t.me/mohitobon_art',
            'instagram_label' => 'Instagram',
            'instagram_value' => '@HANDMADE_BY_MUSHARRAF',
            'instagram_url' => 'https://www.instagram.com/handmade_by_musharraf?igsh=eWVtdHNia2s2M2Mz',
            'address_label' => 'Manzil',
            'address_value' => 'Shofirkon tumani',
            'hours_label' => 'Ish vaqti',
            'hours_value' => 'Dushanba - Shanba, 09:00 - 19:00',
            'map_label' => 'Xarita',
            'map_title' => 'Shofirkon markazi',
            'map_latitude' => 40.120000,
            'map_longitude' => 64.501400,
            'map_zoom' => 15,
            'form_label' => 'Forma',
            'form_title' => 'Tezkor so\'rov yuboring',
            'form_name_label' => 'Ismingiz',
            'form_name_placeholder' => 'Ismingizni kiriting',
            'form_phone_label' => 'Telefon',
            'form_phone_placeholder' => '+99894 5450110',
            'form_social_label' => 'Instagram yoki Telegram',
            'form_social_placeholder' => '@username yoki profil havolasi',
            'form_message_label' => 'Xabar',
            'form_message_placeholder' => 'Qanday mahsulot yoki xizmat kerakligini yozing',
            'form_success_note' => 'So\'rovingiz qabul qilindi. Tez orada siz bilan bog\'lanamiz.',
        ], $meta);
    }

    private static function prepareContactFormData(?Model $record, array $data): array
    {
        $rawMeta = Arr::wrap($record?->meta);
        $meta = self::contactMetaDefaults($rawMeta);
        $meta['phone_value'] = $rawMeta['phone_value'] ?? $rawMeta['phone'] ?? $meta['phone_value'];
        $meta['telegram_value'] = $rawMeta['telegram_value'] ?? $rawMeta['telegram'] ?? $meta['telegram_value'];
        $meta['instagram_value'] = $rawMeta['instagram_value'] ?? $rawMeta['instagram'] ?? $meta['instagram_value'];

        foreach ($meta as $key => $value) {
            $data[$key] = $value;
        }

        $data['type'] = ContentBlock::TYPE_CONTACT;
        $data['key'] = 'contact-main';
        $data['sort_order'] = $record?->sort_order ?? ($data['sort_order'] ?? 1);
        $data['subtitle'] = $record?->subtitle ?? ($data['subtitle'] ?? 'Aloqa');
        $data['title'] = $record?->title ?? ($data['title'] ?? 'Buyurtma yoki hamkorlik uchun biz bilan bog\'laning');
        $data['content'] = $record?->content ?? ($data['content'] ?? 'Instagram, Telegram yoki telefon orqali murojaat qiling. Sizga mahsulot tanlash, rang moslashtirish va buyurtmani rasmiylashtirishda yordam beramiz.');

        return $data;
    }

    private static function mutateContactPayload(array $data, ?Model $record): array
    {
        $existingMeta = self::contactMetaDefaults(Arr::wrap($record?->meta));
        $metaKeys = array_keys(self::contactMetaDefaults());
        $nextMeta = [];

        foreach ($metaKeys as $metaKey) {
            $nextMeta[$metaKey] = $data[$metaKey] ?? $existingMeta[$metaKey] ?? null;
            unset($data[$metaKey]);
        }

        $data['type'] = ContentBlock::TYPE_CONTACT;
        $data['key'] = 'contact-main';
        $data['sort_order'] = $data['sort_order'] ?? $record?->sort_order ?? 1;
        $data['meta'] = $nextMeta;

        return $data;
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
