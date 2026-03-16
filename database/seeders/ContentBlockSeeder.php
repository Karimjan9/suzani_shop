<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use Illuminate\Database\Seeder;

class ContentBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blocks = [
            [
                'key' => 'home-hero',
                'type' => ContentBlock::TYPE_BANNER,
                'title' => 'Bosh sahifa banneri',
                'subtitle' => 'Hero blok',
                'content' => 'Qo\'lda ishlangan mahsulotlar va milliy ruhni asosiy bannerda shu blok orqali boshqarasiz.',
                'sort_order' => 1,
            ],
            [
                'key' => 'about-master',
                'type' => ContentBlock::TYPE_ABOUT,
                'title' => 'Biz haqimizda',
                'subtitle' => 'Hunarmand tarixi',
                'content' => 'Hunarmand tarixi, tajriba, ustaxona va qo\'lda ishlash jarayoni bo\'yicha matnlar shu yerda saqlanadi.',
                'sort_order' => 2,
            ],
            [
                'key' => 'contact-main',
                'type' => ContentBlock::TYPE_CONTACT,
                'title' => 'Kontaktlar',
                'subtitle' => 'Aloqa',
                'content' => 'Telefon, Telegram, Instagram va manzil bloklarini shu kontent orqali yangilaysiz.',
                'sort_order' => 3,
                'meta' => [
                    'phone' => '+998 90 123 45 67',
                    'telegram' => '@suzanishop',
                    'instagram' => '@suzanishop',
                ],
            ],
        ];

        foreach ($blocks as $block) {
            ContentBlock::query()->updateOrCreate(
                ['key' => $block['key']],
                [
                    'type' => $block['type'],
                    'title' => $block['title'],
                    'subtitle' => $block['subtitle'],
                    'content' => $block['content'],
                    'meta' => $block['meta'] ?? [],
                    'is_active' => true,
                    'sort_order' => $block['sort_order'],
                ],
            );
        }
    }
}
