<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'yostiq' => Category::query()->updateOrCreate(
                ['slug' => 'yostiq'],
                [
                    'name' => 'Yostiq',
                    'description' => "Suzani uslubidagi dekor yostiqlar va premium cushion to'plamlari.",
                    'translations' => [
                        'ru' => ['name' => 'Подушки', 'description' => 'Декоративные подушки в стиле сузани и премиальные cushion-наборы.'],
                        'en' => ['name' => 'Cushions', 'description' => 'Suzani-style decorative cushions and premium cushion sets.'],
                    ],
                    'is_active' => true,
                    'sort_order' => 1,
                ],
            ),
            'sumka' => Category::query()->updateOrCreate(
                ['slug' => 'sumka'],
                [
                    'name' => 'Suzani Sumka',
                    'description' => "Suzani naqshi bilan ishlangan kundalik va sovg'abop sumkalar.",
                    'translations' => [
                        'ru' => ['name' => 'Сумки сузани', 'description' => 'Повседневные и подарочные сумки с узором сузани.'],
                        'en' => ['name' => 'Suzani Bags', 'description' => 'Everyday and gift-ready bags made with Suzani patterns.'],
                    ],
                    'is_active' => true,
                    'sort_order' => 4,
                ],
            ),
            'suzani' => Category::query()->updateOrCreate(
                ['slug' => 'suzani'],
                [
                    'name' => 'Suzani',
                    'description' => "Suzani, kichik suzani va katta suzani kolleksiyalarini birlashtirgan asosiy devor tekstili kategoriyasi.",
                    'translations' => [
                        'ru' => ['name' => 'Сузани', 'description' => 'Основная категория настенного текстиля: малые, большие и классические сузани.'],
                        'en' => ['name' => 'Suzani', 'description' => 'The main wall textile category combining small, large, and classic Suzani pieces.'],
                    ],
                    'is_active' => true,
                    'sort_order' => 2,
                ],
            ),
            'naqsh' => Category::query()->updateOrCreate(
                ['slug' => 'naqsh'],
                [
                    'name' => 'Naqsh Panel',
                    'description' => "Pattern va ornament markaziga qurilgan badiiy suzani panellar.",
                    'translations' => [
                        'ru' => ['name' => 'Панели с орнаментом', 'description' => 'Художественные панели сузани, построенные вокруг узора и орнамента.'],
                        'en' => ['name' => 'Pattern Panels', 'description' => 'Artistic Suzani panels centered on pattern and ornament.'],
                    ],
                    'is_active' => true,
                    'sort_order' => 3,
                ],
            ),
        ];

        $products = [
            [
                'category' => 'yostiq',
                'name' => 'Blue Pomegranate Cushion',
                'slug' => 'blue-pomegranate-cushion',
                'sku' => 'SZ-CUS-001',
                'short_description' => "Moviy anor kashtasi bilan ishlangan mayin dekor yostiq, yotoqxona va lounge interyerlar uchun mos.",
                'full_description' => "Yengil rang palitrasi va qo'lda ishlangan anor naqshi bu modelni sokin interyerlar uchun ideal qiladi. Yakka yoki juft kompozitsiyada ishlatilganda nafasi yanada ochiladi.",
                'product_story' => "Anor naqshi sharqona bezaklarda baraka va to'kinlik timsoli bo'lib, bu yostiqda u zamonaviy ranglar bilan talqin qilingan.",
                'material' => "Paxta asos, dekor kashta, yumshoq ichki to'ldirma",
                'size' => '45 x 45 sm',
                'color' => "Krem, moviy va kulrang",
                'craftsmanship_method' => "Qo'lda kashta va tikuv",
                'production_time' => '2-3 ish kuni',
                'price' => 395000,
                'old_price' => 430000,
                'stock_quantity' => 5,
                'stock_status' => Product::STOCK_IN,
                'availability_mode' => Product::AVAILABILITY_AVAILABLE,
                'is_made_to_order' => false,
                'custom_order_available' => true,
                'delivery_available' => true,
                'is_active' => true,
                'is_featured' => true,
                'view_count' => 148,
                'main_image' => '/images/home/items/photo_2026-03-18_16-31-39.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-31-39.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-11.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-14.jpg',
                ],
            ],
            [
                'category' => 'yostiq',
                'name' => 'Heritage Velvet Pillow Set',
                'slug' => 'heritage-velvet-pillow-set',
                'sku' => 'SZ-CUS-002',
                'short_description' => "Qizil, qora va oltin kayfiyatidagi premium suzani yostiqlar interyerga darhol boy aksent beradi.",
                'full_description' => "Bu to'plamda turli rang kayfiyatidagi bir nechta yostiq variantlari bitta kolleksiya sifatida jamlangan. Mehmonxona, boutique yotoqxona yoki premium salon dekorida ayniqsa chiroyli ko'rinadi.",
                'product_story' => "Kolleksiya klassik suzani markaziy medalyonlaridan ilhom olib, yostiq formatiga moslab qayta ishlangan.",
                'material' => "Baxmal, paxta, kashta ip va yumshoq plomba",
                'size' => '50 x 35 sm va 45 x 45 sm aralash set',
                'color' => "Qizil, qora, sariq va krem",
                'craftsmanship_method' => "Qo'lda kashta",
                'production_time' => '3-5 ish kuni',
                'price' => 620000,
                'old_price' => null,
                'stock_quantity' => 3,
                'stock_status' => Product::STOCK_LOW,
                'availability_mode' => Product::AVAILABILITY_AVAILABLE,
                'is_made_to_order' => false,
                'custom_order_available' => true,
                'delivery_available' => true,
                'is_active' => true,
                'is_featured' => true,
                'view_count' => 172,
                'main_image' => '/images/home/items/photo_2026-03-18_16-31-56.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-31-56.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-52.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-59.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-02.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-05.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-08.jpg',
                ],
            ],
            [
                'category' => 'sumka',
                'name' => 'Suzani Carry Tote',
                'slug' => 'suzani-carry-tote',
                'sku' => 'SZ-BAG-001',
                'short_description' => "Kundalik yurishlar, sovg'a va shopping uchun qulay, milliy ruhdagi kashtali tote sumka.",
                'full_description' => "Mustahkam tutqich, keng sig'im va ko'zga tashlanadigan suzani naqshi bilan tayyorlangan amaliy model. Klassik kiyinishga ham, casual uslubga ham mos tushadi.",
                'product_story' => "Bu sumka amaliy foydalanish va hunarmandchilik ruhini bir predmetda birlashtirish uchun ishlab chiqilgan.",
                'material' => "Paxta mato, ichki astar, mustahkam tutqich",
                'size' => '39 x 35 x 10 sm',
                'color' => "Fil suyagi, qizil, ko'k va yashil",
                'craftsmanship_method' => "Kashta va qo'lda yig'ish",
                'production_time' => '2-4 ish kuni',
                'price' => 455000,
                'old_price' => null,
                'stock_quantity' => 4,
                'stock_status' => Product::STOCK_IN,
                'availability_mode' => Product::AVAILABILITY_AVAILABLE,
                'is_made_to_order' => false,
                'custom_order_available' => true,
                'delivery_available' => true,
                'is_active' => true,
                'is_featured' => false,
                'view_count' => 132,
                'main_image' => '/images/home/items/photo_2026-03-18_16-31-30.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-31-30.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-05.jpg',
                ],
            ],
            [
                'category' => 'suzani',
                'name' => 'Tovus Garden Suzani',
                'slug' => 'tovus-garden-suzani',
                'sku' => 'SZ-PNL-001',
                'short_description' => "Tovus va anor daraxti kompozitsiyasiga qurilgan badiiy suzani panel, interyer markazida ishlatish uchun ideal.",
                'full_description' => "Kvadratga yaqin format va zich kashta maydoni sabab bu model mehmonxona, kutish zonasi yoki maxsus dekor devorlarida kuchli markaziy aksent beradi.",
                'product_story' => "Tovus obrazi sharq bezak san'atida nafosat va salobat belgisi sifatida ko'p ishlatiladi; bu panel ham shu ruhi bilan yaratilgan.",
                'material' => 'Atlas asos, paxta, kashta ip',
                'size' => '170 x 170 sm',
                'color' => "Krem, ko'k, yashil",
                'craftsmanship_method' => "Qo'lda kashta",
                'production_time' => '6-8 ish kuni',
                'price' => 1680000,
                'old_price' => null,
                'stock_quantity' => 1,
                'stock_status' => Product::STOCK_LOW,
                'availability_mode' => Product::AVAILABILITY_MADE_TO_ORDER,
                'is_made_to_order' => true,
                'custom_order_available' => true,
                'delivery_available' => true,
                'is_active' => true,
                'is_featured' => true,
                'view_count' => 214,
                'main_image' => '/images/home/items/photo_2026-03-18_16-31-42.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-31-42.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-34.jpg',
                ],
            ],
            [
                'category' => 'naqsh',
                'name' => 'Islimiy Naqsh Panel',
                'slug' => 'islimiy-naqsh-panel',
                'sku' => 'SZ-ORN-001',
                'short_description' => "Markaziy ornament va mayda pattern ritmiga urg'u berilgan badiiy naqsh paneli.",
                'full_description' => "Bu mahsulot to'liq kompozitsiyadan ko'ra naqsh va pattern qatlamini oldinga chiqaradi. Dekoratorlar, butik interyerlar va styling loyihalari uchun ayniqsa mos.",
                'product_story' => "Naqsh panel kolleksiyasi suzani san'atidagi islimiy va medalyon kompozitsiyalarini yaqinroq his qilish uchun yaratilgan.",
                'material' => 'Paxta mato, atlas asos, dekor kashta',
                'size' => '150 x 100 sm',
                'color' => 'Krem, qizil, moviy va kulrang',
                'craftsmanship_method' => "Qo'lda kashta",
                'production_time' => '5-7 ish kuni',
                'price' => 910000,
                'old_price' => null,
                'stock_quantity' => 2,
                'stock_status' => Product::STOCK_IN,
                'availability_mode' => Product::AVAILABILITY_MADE_TO_ORDER,
                'is_made_to_order' => true,
                'custom_order_available' => true,
                'delivery_available' => true,
                'is_active' => true,
                'is_featured' => false,
                'view_count' => 104,
                'main_image' => '/images/home/items/photo_2026-03-18_16-32-37.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-32-37.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-43.jpg',
                ],
            ],
            [
                'category' => 'suzani',
                'name' => 'Karvon Runner Suzani',
                'slug' => 'karvon-runner-suzani',
                'sku' => 'SZ-SML-001',
                'short_description' => "Uzun va ixcham formatdagi suzani runner yo'lakcha, konsol yoki tor devor kompozitsiyasi uchun qulay.",
                'full_description' => 'Ot va karvon motivlari, floral runner kompozitsiyasi hamda dumaloq matolik elementlari bitta kichik suzani kolleksiyasida jamlangan. Tor joylar uchun ayni muddao.',
                'product_story' => "Karvon mavzusi bu modelga safar, hikoya va an'anaviy sharq yo'llari kayfiyatini olib kiradi.",
                'material' => 'Paxta mato, atlas detal, kashta',
                'size' => '120 x 35 sm, runner va panel formatlar',
                'color' => "Krem, qizil, ko'k",
                'craftsmanship_method' => "Qo'lda kashta",
                'production_time' => '4-6 ish kuni',
                'price' => 735000,
                'old_price' => null,
                'stock_quantity' => 2,
                'stock_status' => Product::STOCK_LOW,
                'availability_mode' => Product::AVAILABILITY_MADE_TO_ORDER,
                'is_made_to_order' => true,
                'custom_order_available' => true,
                'delivery_available' => true,
                'is_active' => true,
                'is_featured' => false,
                'view_count' => 119,
                'main_image' => '/images/home/items/photo_2026-03-18_16-32-30.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-32-30.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-27.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-46.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-49.jpg',
                    '/images/home/items/il_794xN.6819611559_ozk7.jpg',
                    '/images/home/items/il_794xN.6819663333_8um2.jpg',
                ],
            ],
            [
                'category' => 'suzani',
                'name' => 'Grand Bukhara Suzani',
                'slug' => 'grand-bukhara-suzani',
                'sku' => 'SZ-LRG-001',
                'short_description' => "Katta hajmli premium suzani va gilam-matolik kolleksiyasi mehmonxona yoki salon devori uchun mo'ljallangan.",
                'full_description' => 'Bu kolleksiya ichiga bir nechta yirik formatdagi devor suzanilari, gilam-matolik va close-up naqsh kadrlari birlashtirilgan. Premium interyer loyihalarida asosiy dekor sifatida ishlaydi.',
                'product_story' => "Buxoro va Samarqand ruhidagi katta kompozitsiyalar bu modelda birlashtirilib, keng maydonli interyerlar uchun zamonaviy vitrina ko'rinishida taklif qilinadi.",
                'material' => 'Zich paxta, atlas asos, kashta ip',
                'size' => '230 x 150 sm dan 250 x 170 sm gacha',
                'color' => "Krem, qizil, ko'k, osmon rang",
                'craftsmanship_method' => "Qo'lda kashta",
                'production_time' => '7-10 ish kuni',
                'price' => 1980000,
                'old_price' => 2150000,
                'stock_quantity' => 1,
                'stock_status' => Product::STOCK_LOW,
                'availability_mode' => Product::AVAILABILITY_MADE_TO_ORDER,
                'is_made_to_order' => true,
                'custom_order_available' => true,
                'delivery_available' => true,
                'is_active' => true,
                'is_featured' => true,
                'view_count' => 241,
                'main_image' => '/images/home/items/photo_2026-03-18_16-32-34.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-32-34.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-41.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-47.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-50.jpg',
                ],
            ],
        ];

        $seedSlugs = array_column($products, 'slug');
        $legacySeedSlugs = [
            'anor-yostiq',
            'qizil-suzani-yostiq',
            'qora-naqsh-yostiq',
            'suzani-tote-sumka',
            'otli-kichik-suzani',
            'uzun-floral-suzani',
            'dumaloq-suzani-matolik',
            'tovus-katta-suzani',
            'festival-katta-suzani',
            'romblar-suzani-gilam',
            'anor-suzani-gilam',
        ];

        Product::query()
            ->whereIn('slug', array_diff($legacySeedSlugs, $seedSlugs))
            ->update([
                'is_active' => false,
                'is_featured' => false,
            ]);

        Category::query()
            ->whereIn('slug', ['yostiq-classic', 'yostiq-premium', 'kichik-suzani', 'katta-suzani'])
            ->update([
                'is_active' => false,
            ]);

        foreach ($products as $product) {
            $category = $categories[$product['category']];
            unset($product['category']);

            Product::query()->updateOrCreate(
                ['slug' => $product['slug']],
                array_merge($product, [
                    'category_id' => $category->id,
                ]),
            );
        }
    }
}
