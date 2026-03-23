<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;

class PortfolioItemSeeder extends Seeder
{
    /**
     * Seed the application's portfolio items.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Anor medalyon devor paneli',
                'slug' => 'anor-medalyon-devor-paneli',
                'project_type' => 'Premium interyer',
                'highlight_value' => '260 x 190 sm',
                'excerpt' => 'Katta mehmonxona yoki salon interyeri uchun chuqur bordo va tabiiy oltin ohanglarda tikilgan markaziy suzani kompozitsiyasi.',
                'description' => 'Mazkur loyiha premium mehmonxona devori uchun ishlab chiqilgan bo\'lib, markaziy medalyon kompozitsiyasi xona rang palitrasi bilan uyg\'unlashtirildi. Qo\'lda ishlangan kashta qatlamlari interyerga iliqlik, status va milliy ruh beradi.',
                'cover_image' => '/images/home/items/photo_2026-03-18_16-32-50.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-32-47.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-42.jpg',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'title' => 'Kelin salom suzani jamlanmasi',
                'slug' => 'kelin-salom-suzani-jamlanmasi',
                'project_type' => 'Shaxsiy buyurtma',
                'highlight_value' => 'Custom set',
                'excerpt' => 'Yangi oila uchun yostiq, suzani va mayda tekstil aksentlardan tuzilgan, interyerga moslashtirilgan maxsus buyurtma seti.',
                'description' => 'Buyurtmachi interyeridagi iliq ranglar va oilaviy marosim kayfiyatidan kelib chiqib tayyorlangan ushbu jamlanma to\'y sovg\'asi va kundalik dekor vazifasini birlashtiradi. Har bir element alohida o\'lcham va rang balansiga ko\'ra tanlangan.',
                'cover_image' => '/images/home/items/photo_2026-03-18_16-31-52.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-31-56.jpg',
                    '/images/home/items/photo_2026-03-18_16-31-59.jpg',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 20,
            ],
            [
                'title' => 'Silk Road stol runner kolleksiyasi',
                'slug' => 'silk-road-stol-runner-kolleksiyasi',
                'project_type' => 'HoReCa loyiha',
                'highlight_value' => '16 ta to\'plam',
                'excerpt' => 'Milliy restoran va mehmon uylari uchun tikilgan runner hamda salfetka to\'plami, ko\'p martalik xizmatga mos zich matoda ishlangan.',
                'description' => 'HoReCa segmenti uchun tayyorlangan ushbu kolleksiya stol bezagini bir xil uslubda ushlab turadi va tez-tez foydalanish uchun amaliy materiallardan foydalanadi. Naqsh markazi mehmon kutish zonasi va servis estetikasi bilan moslashtirilgan.',
                'cover_image' => '/images/home/items/photo_2026-03-18_16-31-46.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-32-34.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-37.jpg',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 30,
            ],
            [
                'title' => 'Boutique suite textile styling',
                'slug' => 'boutique-suite-textile-styling',
                'project_type' => 'Interyer styling',
                'highlight_value' => '4 element',
                'excerpt' => 'Yotoqxona uchun yostiq, panel va yumshoq dekor uyg\'unligida ishlab chiqilgan, pastel-baxmal ohangli kompozitsiya.',
                'description' => 'Ushbu styling yechimi boutique mehmonxona yoki premium yotoqxona uchun ko\'zda tutilgan. Yumshoq baxmal, nafis kashta va ritmik rang takrori xonada sokin, ammo boy kayfiyat yaratadi.',
                'cover_image' => '/images/home/items/photo_2026-03-18_16-32-08.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-32-05.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-11.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-14.jpg',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 40,
            ],
            [
                'title' => 'Reception zone naqsh paneli',
                'slug' => 'reception-zone-naqsh-paneli',
                'project_type' => 'Corporate decor',
                'highlight_value' => '220 x 150 sm',
                'excerpt' => 'Kutish zonasi va vakillik ofisi uchun brend kayfiyatiga moslashtirilgan, naqsh markazi kuchli dekorativ panel.',
                'description' => 'Korxona kutish hududi uchun mo\'ljallangan bu panel milliy identitetni zamonaviy ofis muhitiga ehtiyotkorlik bilan olib kiradi. Ranglar sokin, kompozitsiya esa uzoqdan ham aniq ko\'rinadigan qilib tanlangan.',
                'cover_image' => '/images/home/items/photo_2026-03-18_16-31-34.jpg',
                'gallery' => [
                    '/images/home/items/photo_2026-03-18_16-32-41.jpg',
                    '/images/home/items/photo_2026-03-18_16-32-43.jpg',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 50,
            ],
            [
                'title' => 'Navro\'z ko\'rgazma kompozitsiyasi',
                'slug' => 'navroz-korgazma-kompozitsiyasi',
                'project_type' => 'Ko\'rgazma namunasi',
                'highlight_value' => '210 x 140 sm',
                'excerpt' => 'Hunarmandchilik ko\'rgazmasi va showroom namoyishi uchun tayyorlangan, yaqin masofada kashta sifatini ko\'rsatadigan markaziy ish.',
                'description' => 'Ko\'rgazma uchun tayyorlangan ushbu kompozitsiya tomoshabinga kashta zichligi, ranglarning o\'tishi va qo\'l mehnati aniqligini yaqin masofadan ko\'rsatish vazifasini bajaradi. Showroom va mavsumiy ekspozitsiyalar uchun ayni muddao.',
                'cover_image' => '/images/home/items/il_794xN.6819611559_ozk7.jpg',
                'gallery' => [
                    '/images/home/items/il_794xN.6819663333_8um2.jpg',
                    '/images/home/about/photo_2026-03-18_16-32-23.jpg',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 60,
            ],
        ];

        foreach ($items as $item) {
            PortfolioItem::query()->updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }

        PortfolioItem::query()
            ->whereNotIn('slug', array_column($items, 'slug'))
            ->update(['is_active' => false]);
    }
}
