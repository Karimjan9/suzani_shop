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
            ['name' => 'Yog\'och buyumlar', 'slug' => 'yogoch-buyumlar', 'sort_order' => 1],
            ['name' => 'Milliy suvenirlar', 'slug' => 'milliy-suvenirlar', 'sort_order' => 2],
            ['name' => 'Qo\'l mehnati bezaklari', 'slug' => 'qol-mehnati-bezaklari', 'sort_order' => 3],
            ['name' => 'Idishlar', 'slug' => 'idishlar', 'sort_order' => 4],
            ['name' => 'Sovg\'abop mahsulotlar', 'slug' => 'sovgabop-mahsulotlar', 'sort_order' => 5],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'description' => $category['name'] . ' kategoriyasi uchun mahsulotlar admin orqali biriktiriladi.',
                    'is_active' => true,
                    'sort_order' => $category['sort_order'],
                ],
            );
        }
    }
}
