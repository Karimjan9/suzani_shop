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
                    'hero_material_image' => '/images/home/hero/suzani1.jpg',
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
