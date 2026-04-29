<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Yog\'och mahsulotlar', 'slug' => 'yogoch-buyumlar', 'sort_order' => 1, 'ru' => 'Деревянные изделия', 'en' => 'Wooden pieces'],
            ['name' => 'Milliy suvenirlar', 'slug' => 'milliy-suvenirlar', 'sort_order' => 2, 'ru' => 'Национальные сувениры', 'en' => 'National souvenirs'],
            ['name' => 'Qo\'l mehnati bezaklari', 'slug' => 'qol-mehnati-bezaklari', 'sort_order' => 3, 'ru' => 'Декор ручной работы', 'en' => 'Handmade decor'],
            ['name' => 'Idishlar', 'slug' => 'idishlar', 'sort_order' => 4, 'ru' => 'Посуда', 'en' => 'Tableware'],
            ['name' => 'Sovg\'abop mahsulotlar', 'slug' => 'sovgabop-mahsulotlar', 'sort_order' => 5, 'ru' => 'Подарочные товары', 'en' => 'Gift products'],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['name'] . ' kategoriyasi uchun mahsulotlar admin orqali biriktiriladi.',
                    'translations' => [
                        'ru' => [
                            'name' => $category['ru'],
                            'description' => 'Товары категории '.$category['ru'].' привязываются через админ-панель.',
                        ],
                        'en' => [
                            'name' => $category['en'],
                            'description' => $category['en'].' are assigned through the admin panel.',
                        ],
                    ],
                    'is_active' => true,
                    'sort_order' => $category['sort_order'],
                ],
            );
        }
    }
}
