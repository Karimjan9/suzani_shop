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
                'title' => 'Qo\'lda yasalgan noyob buyumlar',
                'subtitle' => 'Hunarmand ustaxonasidan',
                'content' => 'Suzani Shop interyer uchun nafis, sokin va qadrli buyumlar yaratadi. Har bir mahsulotda qo\'l mehnati, iliq ranglar va sifatli materiallar orqali uyga hissiyot olib kiradigan ruh bor.',
                'image' => '/images/home/hero/hero-main.jpg',
                'sort_order' => 1,
                'meta' => [
                    'hero_main_badge' => 'Asosiy kolleksiya',
                    'hero_main_title' => 'Anor Suzani',
                    'hero_main_caption' => 'Katta format, mayin ranglar va qo\'lda ishlangan nafis naqshlar.',
                    'hero_detail_image' => '/images/home/hero/hero-detail.jpg',
                    'hero_detail_badge' => 'Detail',
                    'hero_detail_title' => 'Kashta teksturasi',
                    'hero_material_image' => '/images/home/hero/hero-material.jpg',
                    'hero_material_badge' => 'Material',
                    'hero_material_title' => 'Ustaxona jarayoni va tabiiy mato',
                ],
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
                'title' => 'Buyurtma yoki hamkorlik uchun biz bilan bog\'laning',
                'subtitle' => 'Aloqa',
                'content' => 'Instagram, Telegram yoki telefon orqali murojaat qiling. Sizga mahsulot tanlash, rang moslashtirish va buyurtmani rasmiylashtirishda yordam beramiz.',
                'sort_order' => 3,
                'meta' => [
                    'phone_label' => 'Telefon',
                    'phone_value' => '+998 90 123 45 67',
                    'telegram_label' => 'Telegram',
                    'telegram_value' => '@suzanishop',
                    'telegram_url' => 'https://t.me/suzanishop',
                    'instagram_label' => 'Instagram',
                    'instagram_value' => '@suzanishop',
                    'instagram_url' => 'https://instagram.com/suzanishop',
                    'address_label' => 'Manzil',
                    'address_value' => 'Toshkent shahri, hunarmandlar ko\'chasi',
                    'hours_label' => 'Ish vaqti',
                    'hours_value' => 'Dushanba - Shanba, 09:00 - 19:00',
                    'map_label' => 'Xarita',
                    'map_title' => 'Ustaxona joylashuvi',
                    'map_latitude' => 41.311081,
                    'map_longitude' => 69.240562,
                    'map_zoom' => 13,
                    'form_label' => 'Forma',
                    'form_title' => 'Tezkor so\'rov yuboring',
                    'form_name_label' => 'Ismingiz',
                    'form_name_placeholder' => 'Ismingizni kiriting',
                    'form_phone_label' => 'Telefon',
                    'form_phone_placeholder' => '91 310 32 98',
                    'form_social_label' => 'Instagram yoki Telegram',
                    'form_social_placeholder' => '@username yoki profil havolasi',
                    'form_message_label' => 'Xabar',
                    'form_message_placeholder' => 'Qanday mahsulot yoki xizmat kerakligini yozing',
                    'form_success_note' => 'So\'rovingiz qabul qilindi. Tez orada siz bilan bog\'lanamiz.',
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
                    'image' => $block['image'] ?? null,
                    'meta' => $block['meta'] ?? [],
                    'is_active' => true,
                    'sort_order' => $block['sort_order'],
                ],
            );
        }
    }
}
