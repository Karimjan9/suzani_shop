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
                'title' => 'Qo\'l mehnatida yaralgan san\'at asarlari',
                'subtitle' => 'Hunarmand ustaxonasidan',
                'content' => 'Suzani Shop interyer uchun nafis, sokin va qadrli mahsulotlar yaratadi. Har bir mahsulotda qo\'l mehnati, iliq ranglar va sifatli materiallar orqali uyga hissiyot olib kiradigan ruh bor.',
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
                'translations' => [
                    'ru' => [
                        'title' => 'Произведения искусства, созданные вручную',
                        'subtitle' => 'Из ремесленной мастерской',
                        'content' => 'Suzani Shop создает изящные и ценные предметы для интерьера. В каждом изделии соединены ручной труд, теплые оттенки и качественные материалы.',
                        'meta' => [
                            'hero_main_badge' => 'Основная коллекция',
                            'hero_main_title' => 'Гранатовая сузани',
                            'hero_main_caption' => 'Крупный формат, мягкие цвета и тонкие узоры ручной работы.',
                            'hero_detail_badge' => 'Деталь',
                            'hero_detail_title' => 'Фактура вышивки',
                            'hero_material_badge' => 'Материал',
                            'hero_material_title' => 'Процесс мастерской и натуральная ткань',
                        ],
                    ],
                    'en' => [
                        'title' => 'Works of Art Created by Hand',
                        'subtitle' => 'From the artisan workshop',
                        'content' => 'Suzani Shop creates refined, calm, and meaningful interior pieces. Every product carries handwork, warm color, and quality material.',
                        'meta' => [
                            'hero_main_badge' => 'Main collection',
                            'hero_main_title' => 'Pomegranate Suzani',
                            'hero_main_caption' => 'Large format, soft colors, and delicate handmade patterns.',
                            'hero_detail_badge' => 'Detail',
                            'hero_detail_title' => 'Embroidery texture',
                            'hero_material_badge' => 'Material',
                            'hero_material_title' => 'Workshop process and natural fabric',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'about-master',
                'type' => ContentBlock::TYPE_ABOUT,
                'title' => 'Biz haqimizda',
                'subtitle' => 'Hunarmand tarixi',
                'content' => 'Hunarmand tarixi, tajriba, ustaxona va qo\'lda ishlash jarayoni bo\'yicha matnlar shu yerda saqlanadi.',
                'sort_order' => 2,
                'translations' => [
                    'ru' => [
                        'title' => 'О нас',
                        'subtitle' => 'История мастера',
                        'content' => 'Здесь хранятся тексты об истории мастера, опыте, мастерской и процессе ручной работы.',
                    ],
                    'en' => [
                        'title' => 'About us',
                        'subtitle' => 'Artisan story',
                        'content' => 'Texts about the artisan story, experience, workshop, and handmade process are stored here.',
                    ],
                ],
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
                'translations' => [
                    'ru' => [
                        'title' => 'Свяжитесь с нами для заказа или сотрудничества',
                        'subtitle' => 'Контакты',
                        'content' => 'Напишите в Instagram, Telegram или позвоните. Мы поможем выбрать изделие, подобрать цвет и оформить заказ.',
                        'meta' => [
                            'address_label' => 'Адрес',
                            'address_value' => 'Шафирканский район',
                            'hours_label' => 'Время работы',
                            'hours_value' => 'Понедельник - Суббота, 09:00 - 19:00',
                            'map_label' => 'Карта',
                            'map_title' => 'Центр Шафиркана',
                            'form_label' => 'Форма',
                            'form_title' => 'Отправьте быстрый запрос',
                            'form_name_label' => 'Ваше имя',
                            'form_name_placeholder' => 'Введите ваше имя',
                            'form_phone_label' => 'Телефон',
                            'form_social_label' => 'Instagram или Telegram',
                            'form_social_placeholder' => '@username или ссылка на профиль',
                            'form_message_label' => 'Сообщение',
                            'form_message_placeholder' => 'Напишите, какой товар или услуга вам нужна',
                            'form_success_note' => 'Ваш запрос принят. Мы скоро свяжемся с вами.',
                        ],
                    ],
                    'en' => [
                        'title' => 'Contact us for orders or collaboration',
                        'subtitle' => 'Contact',
                        'content' => 'Reach out through Instagram, Telegram, or phone. We will help you choose a product, match colors, and place the order.',
                        'meta' => [
                            'address_label' => 'Address',
                            'address_value' => 'Shofirkon district',
                            'hours_label' => 'Working hours',
                            'hours_value' => 'Monday - Saturday, 09:00 - 19:00',
                            'map_label' => 'Map',
                            'map_title' => 'Shofirkon center',
                            'form_label' => 'Form',
                            'form_title' => 'Send a quick request',
                            'form_name_label' => 'Your name',
                            'form_name_placeholder' => 'Enter your name',
                            'form_phone_label' => 'Phone',
                            'form_social_label' => 'Instagram or Telegram',
                            'form_social_placeholder' => '@username or profile link',
                            'form_message_label' => 'Message',
                            'form_message_placeholder' => 'Write what product or service you need',
                            'form_success_note' => 'Your request has been received. We will contact you soon.',
                        ],
                    ],
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
                    'translations' => $block['translations'] ?? [],
                    'is_active' => true,
                    'sort_order' => $block['sort_order'],
                ],
            );
        }
    }
}
