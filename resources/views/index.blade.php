<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="atelier">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Suzani Shop') }}</title>
        <meta
            name="description"
            content="Suzani Shop uchun milliy ruhdagi zamonaviy bosh sahifa: banner, mahsulotlar, kategoriyalar, mijoz fikrlari va aloqa bo'limlari bilan."
        >
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#f5efe6">
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <script>
            (() => {
                const storageKey = 'suzani-shop-theme';
                let theme = 'atelier';

                try {
                    if (window.localStorage.getItem(storageKey) === 'nocturne') {
                        theme = 'nocturne';
                    }
                } catch {}

                document.documentElement.setAttribute('data-theme', theme);
                document.documentElement.style.colorScheme = theme === 'nocturne' ? 'dark' : 'light';
            })();
        </script>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            @include('partials.home-inline-styles')
        @endif
        <style>
            .sr-only {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                white-space: nowrap;
                border: 0;
            }

            .topbar-actions {
                gap: 0.75rem;
            }

            .theme-toggle {
                position: relative;
                isolation: isolate;
                display: inline-grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                align-items: center;
                min-width: 12rem;
                padding: 0.32rem;
                appearance: none;
                border: 1px solid rgba(122, 74, 48, 0.12);
                border-radius: 999px;
                background: linear-gradient(135deg, rgba(255, 252, 247, 0.98) 0%, rgba(244, 235, 224, 0.92) 100%);
                color: inherit;
                font: inherit;
                cursor: pointer;
                box-shadow:
                    0 12px 28px rgba(59, 36, 24, 0.08),
                    inset 0 1px 0 rgba(255, 255, 255, 0.92);
                transition:
                    transform 180ms ease,
                    border-color 180ms ease,
                    box-shadow 180ms ease,
                    background-color 180ms ease;
            }

            .theme-toggle::before {
                position: absolute;
                top: 0.28rem;
                left: 0.28rem;
                width: calc(50% - 0.28rem);
                height: calc(100% - 0.56rem);
                border-radius: 999px;
                background: linear-gradient(135deg, rgba(122, 74, 48, 0.12) 0%, rgba(183, 138, 82, 0.22) 100%);
                box-shadow:
                    0 10px 22px rgba(59, 36, 24, 0.08),
                    inset 0 1px 0 rgba(255, 255, 255, 0.46);
                content: '';
                transition:
                    transform 240ms ease,
                    background 240ms ease,
                    box-shadow 240ms ease;
            }

            .theme-toggle:hover {
                transform: translateY(-1px);
            }

            .theme-toggle:focus-visible {
                outline: 2px solid rgba(122, 74, 48, 0.34);
                outline-offset: 4px;
            }

            .theme-toggle-label {
                position: relative;
                z-index: 1;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 2.55rem;
                font-size: 0.72rem;
                font-weight: 800;
                letter-spacing: 0.16em;
                text-transform: uppercase;
                color: rgba(110, 92, 80, 0.84);
                transition: color 180ms ease;
            }

            html[data-theme='atelier'] .theme-toggle-label-light,
            html[data-theme='nocturne'] .theme-toggle-label-dark {
                color: var(--primary-deep);
            }

            html[data-theme='nocturne'] {
                --bg: #1f1817;
                --surface: rgba(49, 37, 34, 0.82);
                --surface-strong: #332724;
                --text: #f2e7db;
                --muted: #cbb9ad;
                --line: rgba(240, 223, 210, 0.12);
                --primary: #c98d5f;
                --primary-deep: #f6debf;
                --gold: #d9ad6a;
                --teal: #4f968f;
                --shadow: 0 28px 80px rgba(8, 5, 5, 0.28);
            }

            html[data-theme='nocturne'] body.site-shell {
                background:
                    radial-gradient(circle at top left, rgba(201, 141, 95, 0.18), transparent 28%),
                    radial-gradient(circle at 85% 12%, rgba(79, 150, 143, 0.14), transparent 22%),
                    linear-gradient(180deg, #191413 0%, #231a18 45%, #2a201d 100%);
            }

            html[data-theme='nocturne'] body.site-shell::before {
                background-image:
                    linear-gradient(rgba(255, 232, 214, 0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255, 232, 214, 0.03) 1px, transparent 1px);
            }

            html[data-theme='nocturne'] .site-ribbon {
                filter: saturate(0.82) brightness(0.78);
                box-shadow:
                    0 0 0 1px rgba(240, 223, 210, 0.1),
                    0 26px 52px rgba(0, 0, 0, 0.26);
            }

            html[data-theme='nocturne'] .site-ribbon::before {
                opacity: 0.48;
            }

            html[data-theme='nocturne'] .site-ribbon::after {
                border-color: rgba(244, 223, 190, 0.16);
                box-shadow:
                    inset 0 0 0 1px rgba(245, 223, 190, 0.08),
                    inset 0 0 0 12px rgba(244, 223, 190, 0.03);
            }

            html[data-theme='nocturne'] .contact-map-surface {
                background:
                    radial-gradient(circle at 24% 24%, rgba(79, 150, 143, 0.18), transparent 18%),
                    radial-gradient(circle at 78% 74%, rgba(201, 141, 95, 0.2), transparent 24%),
                    linear-gradient(135deg, rgba(51, 39, 36, 0.96) 0%, rgba(31, 24, 23, 0.98) 100%);
            }

            html[data-theme='nocturne'] .contact-map-surface::before {
                opacity: 0.58;
            }

            html[data-theme='nocturne'] .contact-map-surface::after {
                border-color: rgba(240, 223, 210, 0.08);
                box-shadow: inset 0 0 0 1px rgba(255, 243, 234, 0.04);
            }

            html[data-theme='nocturne'] .contact-map-details {
                border-color: rgba(240, 223, 210, 0.08);
                background: rgba(38, 29, 27, 0.82);
                box-shadow: 0 24px 54px rgba(8, 5, 5, 0.24);
            }

            html[data-theme='nocturne'] .contact-map-meta {
                border-top-color: rgba(240, 223, 210, 0.08);
            }

            html[data-theme='nocturne'] .topbar,
            html[data-theme='nocturne'] .theme-toggle,
            html[data-theme='nocturne'] .topbar-admin-link,
            html[data-theme='nocturne'] .button-secondary,
            html[data-theme='nocturne'] .hero-stats div,
            html[data-theme='nocturne'] .hero-feature,
            html[data-theme='nocturne'] .about-stat-card,
            html[data-theme='nocturne'] .about-card,
            html[data-theme='nocturne'] .contact-card,
            html[data-theme='nocturne'] .product-card,
            html[data-theme='nocturne'] .step-card,
            html[data-theme='nocturne'] .testimonial-card,
            html[data-theme='nocturne'] .category-card,
            html[data-theme='nocturne'] .portfolio-card,
            html[data-theme='nocturne'] .catalog-toolbar,
            html[data-theme='nocturne'] .catalog-toolbar-block,
            html[data-theme='nocturne'] .catalog-search,
            html[data-theme='nocturne'] .catalog-sort,
            html[data-theme='nocturne'] .collection-active-card,
            html[data-theme='nocturne'] .cart-head-note,
            html[data-theme='nocturne'] .cart-item,
            html[data-theme='nocturne'] .cart-empty,
            html[data-theme='nocturne'] .cart-quantity,
            html[data-theme='nocturne'] .contact-field input,
            html[data-theme='nocturne'] .contact-field textarea,
            html[data-theme='nocturne'] .admin-entry-card,
            html[data-theme='nocturne'] .site-footer,
            html[data-theme='nocturne'] .gallery-lightbox-info,
            html[data-theme='nocturne'] .gallery-lightbox-close,
            html[data-theme='nocturne'] .product-gallery-nav,
            html[data-theme='nocturne'] .gallery-lightbox-arrow {
                border-color: rgba(240, 223, 210, 0.1);
                box-shadow:
                    0 24px 56px rgba(8, 5, 5, 0.22),
                    inset 0 1px 0 rgba(255, 243, 234, 0.05);
                transition:
                    background 220ms ease,
                    border-color 220ms ease,
                    color 220ms ease,
                    box-shadow 220ms ease;
            }

            html[data-theme='nocturne'] .topbar {
                background: linear-gradient(135deg, rgba(49, 37, 34, 0.96) 0%, rgba(31, 24, 23, 0.94) 100%);
            }

            html[data-theme='nocturne'] .topbar::after {
                box-shadow: inset 0 0 0 1px rgba(255, 243, 234, 0.06);
            }

            html[data-theme='nocturne'] .topbar-actions {
                border-left-color: rgba(240, 223, 210, 0.1);
            }

            html[data-theme='nocturne'] .theme-toggle {
                background: linear-gradient(135deg, rgba(58, 43, 40, 0.98) 0%, rgba(35, 28, 27, 0.92) 100%);
            }

            html[data-theme='nocturne'] .theme-toggle::before {
                transform: translateX(100%);
                background: linear-gradient(135deg, rgba(201, 141, 95, 0.92) 0%, rgba(106, 74, 53, 0.84) 100%);
                box-shadow:
                    0 12px 22px rgba(0, 0, 0, 0.2),
                    inset 0 1px 0 rgba(255, 243, 234, 0.18);
            }

            html[data-theme='nocturne'] .theme-toggle-label {
                color: rgba(227, 208, 194, 0.72);
            }

            html[data-theme='nocturne'] .theme-toggle-label-dark {
                color: #fff6ec;
            }

            html[data-theme='nocturne'] .topbar-admin-link {
                background: linear-gradient(135deg, rgba(67, 49, 44, 0.96) 0%, rgba(45, 34, 31, 0.94) 100%);
            }

            html[data-theme='nocturne'] .topbar-admin-overline {
                color: rgba(242, 219, 198, 0.72);
            }

            html[data-theme='nocturne'] .topbar-admin-title,
            html[data-theme='nocturne'] .brand-mark,
            html[data-theme='nocturne'] .footer-brand .brand-mark,
            html[data-theme='nocturne'] .footer-links h3,
            html[data-theme='nocturne'] .cart-item-price strong,
            html[data-theme='nocturne'] .cart-card-head h3 {
                color: #fff2e6;
            }

            html[data-theme='nocturne'] .topbar-admin-knot {
                border-color: rgba(242, 219, 198, 0.78);
                box-shadow: 0 0 0 4px rgba(201, 141, 95, 0.18);
            }

            html[data-theme='nocturne'] .section-soft {
                background: linear-gradient(180deg, rgba(39, 29, 27, 0.9), rgba(33, 25, 24, 0.96));
            }

            html[data-theme='nocturne'] .section-deep {
                background:
                    radial-gradient(circle at top right, rgba(217, 173, 106, 0.16), transparent 24%),
                    linear-gradient(135deg, #3b1815 0%, #503128 48%, #1f4946 100%);
            }

            html[data-theme='nocturne'] .catalog-toolbar {
                background:
                    radial-gradient(circle at top left, rgba(201, 141, 95, 0.16), transparent 34%),
                    linear-gradient(135deg, rgba(53, 40, 37, 0.98) 0%, rgba(36, 28, 27, 0.94) 100%);
            }

            html[data-theme='nocturne'] .button-secondary,
            html[data-theme='nocturne'] .hero-stats div,
            html[data-theme='nocturne'] .hero-feature,
            html[data-theme='nocturne'] .about-stat-card,
            html[data-theme='nocturne'] .about-card,
            html[data-theme='nocturne'] .contact-card,
            html[data-theme='nocturne'] .product-card,
            html[data-theme='nocturne'] .step-card,
            html[data-theme='nocturne'] .testimonial-card,
            html[data-theme='nocturne'] .category-card,
            html[data-theme='nocturne'] .portfolio-card,
            html[data-theme='nocturne'] .catalog-toolbar-block,
            html[data-theme='nocturne'] .collection-active-card,
            html[data-theme='nocturne'] .cart-head-note,
            html[data-theme='nocturne'] .cart-item,
            html[data-theme='nocturne'] .cart-empty,
            html[data-theme='nocturne'] .cart-quantity,
            html[data-theme='nocturne'] .contact-field input,
            html[data-theme='nocturne'] .contact-field textarea,
            html[data-theme='nocturne'] .catalog-search,
            html[data-theme='nocturne'] .catalog-sort,
            html[data-theme='nocturne'] .site-footer,
            html[data-theme='nocturne'] .admin-entry-card {
                background: rgba(49, 37, 34, 0.82);
            }

            html[data-theme='nocturne'] .catalog-search,
            html[data-theme='nocturne'] .catalog-sort,
            html[data-theme='nocturne'] .contact-field input,
            html[data-theme='nocturne'] .contact-field textarea {
                color: var(--text);
            }

            html[data-theme='nocturne'] .catalog-search::placeholder,
            html[data-theme='nocturne'] .contact-field input::placeholder,
            html[data-theme='nocturne'] .contact-field textarea::placeholder {
                color: rgba(203, 185, 173, 0.64);
            }

            html[data-theme='nocturne'] .portfolio-body,
            html[data-theme='nocturne'] .portfolio-card {
                background-color: rgba(44, 33, 31, 0.88);
            }

            html[data-theme='nocturne'] .cta-shell {
                border-color: rgba(240, 223, 210, 0.12);
                background:
                    radial-gradient(circle at top left, rgba(201, 141, 95, 0.14), transparent 32%),
                    linear-gradient(135deg, rgba(45, 34, 31, 0.98) 0%, rgba(34, 27, 26, 0.96) 100%);
                box-shadow:
                    0 28px 60px rgba(8, 5, 5, 0.24),
                    inset 0 1px 0 rgba(255, 243, 234, 0.05);
            }

            html[data-theme='nocturne'] .cta-copy p:last-child,
            html[data-theme='nocturne'] .cta-point span {
                color: var(--muted);
            }

            html[data-theme='nocturne'] .cta-point {
                border-color: rgba(240, 223, 210, 0.08);
                background: rgba(49, 37, 34, 0.78);
            }

            html[data-theme='nocturne'] .cta-point strong {
                color: #fff2e6;
            }

            html[data-theme='nocturne'] .site-footer {
                background:
                    linear-gradient(180deg, rgba(39, 29, 27, 0.96), rgba(29, 23, 22, 0.98));
            }

            html[data-theme='nocturne'] .footer-meta {
                border-top-color: rgba(240, 223, 210, 0.1);
            }

            html[data-theme='nocturne'] .footer-link-list a:hover,
            html[data-theme='nocturne'] .topbar-links a:hover,
            html[data-theme='nocturne'] .text-link:hover {
                color: #ffd7b1;
            }

            @media (max-width: 720px) {
                .theme-toggle {
                    width: 100%;
                    min-width: 0;
                }
            }
        </style>
    </head>
    <body class="site-shell">
        <div class="site-ribbons" aria-hidden="true">
            <span class="site-ribbon site-ribbon--left"></span>
            <span class="site-ribbon site-ribbon--right"></span>
        </div>
        @php
            $allProducts = [
                [
                    'title' => 'Anor Suzani',
                    'price' => 1250000,
                    'formatted_price' => '1 250 000 so\'m',
                    'tag' => 'Qo\'lda tikilgan',
                    'short_description' => 'Uy ichiga iliqlik olib kiradigan, qizil va oltin naqshli premium suzani.',
                    'full_description' => 'Anor Suzani katta devor kompozitsiyasi uchun mo\'ljallangan bo\'lib, markaziy gul naqshi va qo\'lda bajarilgan mayda tikuvlar bilan ajralib turadi. Mehmonxona, kutubxona yoki mehmon kutish xonasiga boy kayfiyat beradi.',
                    'material' => 'Tabiiy paxta, ipak ip va atlas astar',
                    'size' => '220 x 160 sm',
                    'color' => 'Anor qizil, oltin va fil suyagi',
                    'availability' => 'Buyurtma asosida mavjud',
                    'lead_time' => '5-7 ish kuni',
                    'category' => 'suzani',
                    'category_label' => 'Devor uchun suzani',
                    'popularity' => 98,
                    'new_rank' => 8,
                    'tone' => 'rose',
                    'images' => ['Asosiy rasm', 'Naqsh detali', 'Interyer ko\'rinishi'],
                ],
                [
                    'title' => 'Samarqand Naqshi',
                    'price' => 980000,
                    'formatted_price' => '980 000 so\'m',
                    'tag' => 'Cheklangan to\'plam',
                    'short_description' => 'Sharqona kompozitsiya va zamonaviy ranglar uyg\'unlashgan dekor to\'plami.',
                    'full_description' => 'Samarqand Naqshi o\'zida tarixiy naqshlar va soddalashtirilgan kompozitsiyani jamlaydi. Ichki makonda milliy aksent yaratish uchun juda qulay va osish uchun tayyor holatda beriladi.',
                    'material' => 'Adras mato, paxta asos, ipak kashta',
                    'size' => '180 x 130 sm',
                    'color' => 'Ko\'k, terrakota va oq',
                    'availability' => 'Omborda bor',
                    'lead_time' => '1-2 ish kuni',
                    'category' => 'suzani',
                    'category_label' => 'Devor uchun suzani',
                    'popularity' => 94,
                    'new_rank' => 7,
                    'tone' => 'ink',
                    'images' => ['Old ko\'rinish', 'Burchak detali', 'Devorda namuna'],
                ],
                [
                    'title' => 'Baxmal Yostiq',
                    'price' => 320000,
                    'formatted_price' => '320 000 so\'m',
                    'tag' => 'Top sotuv',
                    'short_description' => 'Suzani elementlari ishlangan baxmal yostiq uyga boy aksent beradi.',
                    'full_description' => 'Baxmal Yostiq yumshoq tekstura va nafis kashta bilan ishlab chiqilgan. Divan, kreslo yoki yotoqxona uchun oson moslashadi va juft holda buyurtma qilish mumkin.',
                    'material' => 'Baxmal, paxta to\'ldirma, kashta ip',
                    'size' => '45 x 45 sm',
                    'color' => 'Zumrad yashil va krem',
                    'availability' => 'Omborda bor',
                    'lead_time' => '24 soat ichida jo\'natiladi',
                    'category' => 'textile',
                    'category_label' => 'Yostiq va tekstil',
                    'popularity' => 99,
                    'new_rank' => 6,
                    'tone' => 'teal',
                    'images' => ['Old ko\'rinish', 'Orqa mato', 'Juft kompozitsiya'],
                ],
                [
                    'title' => 'Atlas Stol Yugurigi',
                    'price' => 410000,
                    'formatted_price' => '410 000 so\'m',
                    'tag' => 'Yangi',
                    'short_description' => 'Bayram dasturxoni va kundalik foydalanish uchun kashtali stol bezagi.',
                    'full_description' => 'Atlas Stol Yugurigi uzun stol uchun mo\'ljallangan bo\'lib, markaziy bezak sifatida interyerga jon bag\'ishlaydi. Salfetka to\'plami bilan uyg\'un kombinatsiya hosil qiladi.',
                    'material' => 'Atlas, paxta asos, dekor ip',
                    'size' => '150 x 40 sm',
                    'color' => 'Asal sariq va oq',
                    'availability' => 'Buyurtma asosida mavjud',
                    'lead_time' => '3-4 ish kuni',
                    'category' => 'table',
                    'category_label' => 'Stol bezaklari',
                    'popularity' => 89,
                    'new_rank' => 9,
                    'tone' => 'gold',
                    'images' => ['Stolda ko\'rinishi', 'Kashta yaqin', 'Qadoq bilan'],
                ],
                [
                    'title' => 'Buxoro Paneli',
                    'price' => 1560000,
                    'formatted_price' => '1 560 000 so\'m',
                    'tag' => 'Premium',
                    'short_description' => 'Katta formatli suzani panel mehmonxona yoki ofis devori uchun mos.',
                    'full_description' => 'Buxoro Paneli yirik formatdagi dekor mahsulot bo\'lib, maxsus buyurtma asosida qo\'lda tayyorlanadi. Restoran, butik mehmonxona yoki premium uy interyerlari uchun tavsiya etiladi.',
                    'material' => 'Zich paxta, ipak ip, yog\'och osma asos',
                    'size' => '250 x 180 sm',
                    'color' => 'Burgundi, qum rang va oltin',
                    'availability' => 'Oldindan buyurtma qilinadi',
                    'lead_time' => '7-10 ish kuni',
                    'category' => 'suzani',
                    'category_label' => 'Devor uchun suzani',
                    'popularity' => 91,
                    'new_rank' => 5,
                    'tone' => 'clay',
                    'images' => ['Katta format', 'Naqsh markazi', 'Premium interyer'],
                ],
                [
                    'title' => 'Ipak Sovg\'a Box',
                    'price' => 690000,
                    'formatted_price' => '690 000 so\'m',
                    'tag' => 'Sovg\'a',
                    'short_description' => 'Suzani detal va tekstil mahsulotlari jamlangan chiroyli sovg\'a to\'plami.',
                    'full_description' => 'Ipak Sovg\'a Box ichida mini tekstil buyumlar, bezak elementlari va maxsus qadoq mavjud. To\'y, mehmondorchilik yoki korporativ sovg\'alar uchun mos variant.',
                    'material' => 'Ipak detal, paxta tekstil, qattiq qadoq',
                    'size' => '35 x 28 sm quti',
                    'color' => 'Pushti, krem va oltin',
                    'availability' => 'Omborda bor',
                    'lead_time' => '1 ish kuni',
                    'category' => 'gift',
                    'category_label' => 'Sovg\'a to\'plamlari',
                    'popularity' => 87,
                    'new_rank' => 4,
                    'tone' => 'rose',
                    'images' => ['Quti ko\'rinishi', 'Ichki to\'plam', 'Sovg\'a lenta'],
                ],
                [
                    'title' => 'Kashta Runner Set',
                    'price' => 540000,
                    'formatted_price' => '540 000 so\'m',
                    'tag' => 'Mashhur',
                    'short_description' => 'Stol uchun runner va salfetka to\'plami zamonaviy interyerga juda mos.',
                    'full_description' => 'Kashta Runner Set oilaviy dasturxon, restoran yoki mehmon kutish stollari uchun qulay yechim. Minimal kompozitsiya va milliy bezak o\'rtasida yaxshi muvozanat yaratadi.',
                    'material' => 'Paxta mato, atlas qirra, dekor kashta',
                    'size' => 'Runner 160 x 42 sm, 4 dona salfetka',
                    'color' => 'Terrakota va bej',
                    'availability' => 'Omborda bor',
                    'lead_time' => '24-48 soat',
                    'category' => 'table',
                    'category_label' => 'Stol bezaklari',
                    'popularity' => 96,
                    'new_rank' => 3,
                    'tone' => 'clay',
                    'images' => ['Set ko\'rinishi', 'Salfetka detali', 'Stol styling'],
                ],
                [
                    'title' => 'Nafis Cushion Duo',
                    'price' => 470000,
                    'formatted_price' => '470 000 so\'m',
                    'tag' => 'Chegirma',
                    'short_description' => 'Ikki dona yostiq jildi to\'plami, yumshoq rang va kashta aksenti bilan.',
                    'full_description' => 'Nafis Cushion Duo yengil ranglar bilan ishlangan bo\'lib, skandinavcha yoki klassik interyerga oson moslashadi. Juft kombinatsiya divan va yotoqxona bezagi sifatida ishlatiladi.',
                    'material' => 'Paxta va baxmal aralash mato',
                    'size' => '2 x 45 x 45 sm',
                    'color' => 'Sutli oq va osmon ko\'k',
                    'availability' => 'Omborda bor',
                    'lead_time' => '1-2 ish kuni',
                    'category' => 'textile',
                    'category_label' => 'Yostiq va tekstil',
                    'popularity' => 90,
                    'new_rank' => 2,
                    'tone' => 'sky',
                    'images' => ['Juft ko\'rinish', 'Kashta yaqin', 'Divanda namuna'],
                ],
                [
                    'title' => 'Navro\'z Gift Set',
                    'price' => 880000,
                    'formatted_price' => '880 000 so\'m',
                    'tag' => 'Yangi',
                    'short_description' => 'Maxsus tadbir va mehmonlar uchun tayyorlangan milliy sovg\'a to\'plami.',
                    'full_description' => 'Navro\'z Gift Set tantanali kunlar, mehmonlar va yaqinlarga sovg\'a qilish uchun tayyorlangan premium to\'plam. Ichida dekor buyum, tekstil element va maxsus tabrik kartasi mavjud.',
                    'material' => 'Aralash tekstil, ipak detal, premium qadoq',
                    'size' => '40 x 30 sm quti',
                    'color' => 'Yashil, oltin va oq',
                    'availability' => 'Buyurtma asosida mavjud',
                    'lead_time' => '3 ish kuni',
                    'category' => 'gift',
                    'category_label' => 'Sovg\'a to\'plamlari',
                    'popularity' => 93,
                    'new_rank' => 10,
                    'tone' => 'teal',
                    'images' => ['Qadoq', 'Ichki tarkib', 'Bayram taqdimoti'],
                ],
            ];

            $homeImage = static fn (string $path): string => asset('images/home/'.$path);

            $aboutGallery = [
                [
                    'src' => $homeImage('about/photo_2026-03-18_16-32-23.jpg'),
                    'label' => 'Ustaxona muhiti',
                    'alt' => 'Suzani Shop ustaxonasining ichki ko\'rinishi',
                ],
                [
                    'src' => $homeImage('items/photo_2026-03-18_16-32-05.jpg'),
                    'label' => 'Kashta detali',
                    'alt' => 'Kashta naqshi yaqin planda',
                ],
                [
                    'src' => $homeImage('items/photo_2026-03-18_16-32-08.jpg'),
                    'label' => 'Tayyor buyum',
                    'alt' => 'Suzani Shop tayyor mahsuloti',
                ],
                [
                    'src' => $homeImage('items/photo_2026-03-18_16-32-11.jpg'),
                    'label' => 'Material tanlovi',
                    'alt' => 'Suzani Shop mahsuloti uchun tanlangan materiallar',
                ],
                [
                    'src' => $homeImage('items/photo_2026-03-18_16-32-14.jpg'),
                    'label' => 'Yakuniy bezak',
                    'alt' => 'Suzani Shop mahsulotining yakuniy bezagi',
                ],
            ];

            $productGalleryMap = [
                'Anor Suzani' => [
                    ['src' => $homeImage('items/il_794xN.6819611559_ozk7.jpg'), 'label' => 'Asosiy kompozitsiya', 'alt' => 'Anor Suzani asosiy ko\'rinishi'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-05.jpg'), 'label' => 'Naqsh detali', 'alt' => 'Anor Suzani naqsh detali'],
                ],
                'Samarqand Naqshi' => [
                    ['src' => $homeImage('items/il_794xN.6819663333_8um2.jpg'), 'label' => 'Old ko\'rinish', 'alt' => 'Samarqand Naqshi mahsuloti'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-30.jpg'), 'label' => 'Burchak detali', 'alt' => 'Samarqand Naqshi burchak detali'],
                ],
                'Baxmal Yostiq' => [
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-39.jpg'), 'label' => 'Asosiy ko\'rinish', 'alt' => 'Baxmal Yostiq asosiy ko\'rinishi'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-42.jpg'), 'label' => 'Tekstura yaqindan', 'alt' => 'Baxmal Yostiq teksturasi yaqin planda'],
                ],
                'Atlas Stol Yugurigi' => [
                    ['src' => $homeImage('items/photo_2026-03-18_16-32-34.jpg'), 'label' => 'Stol ustidagi ko\'rinish', 'alt' => 'Atlas Stol Yugurigi stol ustida'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-32-37.jpg'), 'label' => 'Kashta markazi', 'alt' => 'Atlas Stol Yugurigi kashta markazi'],
                ],
                'Buxoro Paneli' => [
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-34.jpg'), 'label' => 'Katta format', 'alt' => 'Buxoro Paneli katta formatda'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-46.jpg'), 'label' => 'Interyer ichida', 'alt' => 'Buxoro Paneli interyer ichida'],
                ],
                'Ipak Sovg\'a Box' => [
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-52.jpg'), 'label' => 'Qadoq ko\'rinishi', 'alt' => 'Ipak Sovg\'a Box qadoq ko\'rinishi'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-56.jpg'), 'label' => 'Ichki jamlanma', 'alt' => 'Ipak Sovg\'a Box ichki jamlanmasi'],
                ],
                'Kashta Runner Set' => [
                    ['src' => $homeImage('items/photo_2026-03-18_16-32-41.jpg'), 'label' => 'Set ko\'rinishi', 'alt' => 'Kashta Runner Set to\'plami'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-32-43.jpg'), 'label' => 'Stol styling', 'alt' => 'Kashta Runner Set stol stylingi'],
                ],
                'Nafis Cushion Duo' => [
                    ['src' => $homeImage('items/photo_2026-03-18_16-32-47.jpg'), 'label' => 'Juft kompozitsiya', 'alt' => 'Nafis Cushion Duo juft kompozitsiyasi'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-32-50.jpg'), 'label' => 'Yumshoq aktsent', 'alt' => 'Nafis Cushion Duo interyer aktsenti'],
                ],
                'Navro\'z Gift Set' => [
                    ['src' => $homeImage('items/photo_2026-03-18_16-31-59.jpg'), 'label' => 'Bayram taqdimoti', 'alt' => 'Navro\'z Gift Set bayram taqdimoti'],
                    ['src' => $homeImage('items/photo_2026-03-18_16-32-02.jpg'), 'label' => 'Tarkib ko\'rinishi', 'alt' => 'Navro\'z Gift Set tarkibi'],
                ],
            ];

            $allProducts = array_map(function (array $product) use ($productGalleryMap): array {
                $gallery = $productGalleryMap[$product['title']] ?? [];

                $product['id'] = \Illuminate\Support\Str::slug($product['title']);
                $product['gallery'] = $gallery;
                $product['images'] = array_map(static fn (array $image): string => $image['label'], $gallery);
                $product['product_story'] = $product['product_story'] ?? ($product['title'] . ' ustaxonaning qo\'lda ishlangan kolleksiyasida an\'anaviy naqsh va zamonaviy interyer ehtiyojlarini birlashtirish uchun yaratilgan. Har bir nusxa mayda detal va rang muvozanati bilan alohida ishlanadi.');

                return $product;
            }, $allProducts);

            $topProducts = array_slice($allProducts, 0, 3);

            $productFilters = [
                ['value' => 'all', 'label' => 'Barchasi'],
                ['value' => 'suzani', 'label' => 'Suzani'],
                ['value' => 'table', 'label' => 'Stol bezaklari'],
                ['value' => 'textile', 'label' => 'Tekstil'],
                ['value' => 'gift', 'label' => 'Sovg\'alar'],
            ];

            $craftStats = [
                ['label' => 'Tajriba', 'value' => '12 yil'],
                ['label' => 'Qo\'lda yaratilgan ishlar', 'value' => '800+'],
                ['label' => 'Ustaxona jamoasi', 'value' => '6 nafar usta'],
            ];

            $craftHighlights = [
                [
                    'title' => 'Hunarmand tarixi',
                    'text' => 'Ustamiz oilaviy kashtachilik an\'anasida ulg\'aygan. Birinchi ishlarini onasi va buvisidan o\'rganib, keyinchalik zamonaviy interyer uchun suzani yaratishga ixtisoslashgan.',
                ],
                [
                    'title' => 'Tajriba',
                    'text' => 'Ko\'p yillik amaliy tajriba tufayli naqsh tanlash, rang muvozanati va mato sifatini bir joyga jamlay oladigan uslub shakllangan.',
                ],
                [
                    'title' => 'Ustaxona',
                    'text' => 'Mahsulotlar kichik, lekin puxta tashkil etilgan ustaxonada tayyorlanadi. Har bir buyum kesish, tikish, kashta va yakuniy tekshiruv bosqichidan o\'tadi.',
                ],
            ];

            $craftProcess = [
                ['step' => '01', 'title' => 'Naqsh tanlash', 'text' => 'Har mahsulot uchun interyerga mos kompozitsiya va rang palitrasi tanlanadi.'],
                ['step' => '02', 'title' => 'Mato tayyorlash', 'text' => 'Asosiy mato, astar va iplar sifat bo\'yicha ajratilib, qo\'lda ishlashga tayyorlanadi.'],
                ['step' => '03', 'title' => 'Qo\'lda kashta', 'text' => 'Asosiy bezaklar ustoz va jamoa tomonidan qo\'lda, mayda detaligacha nazorat bilan ishlanadi.'],
                ['step' => '04', 'title' => 'Yakuniy bezak', 'text' => 'Mahsulot tozalanadi, tekshiriladi va mijozga yuborish uchun ehtiyotkor qadoqlanadi.'],
            ];

            $whyChoose = [
                'Har bir ish qo\'lda bajariladi va nusxa ko\'chirilgan ommaviy mahsulot emas.',
                'Material va ranglar mijoz interyeriga moslab tanlanishi mumkin.',
                'Usta bilan to\'g\'ridan-to\'g\'ri ishlash sababli buyurtma jarayoni aniq va ishonchli.',
                'Yakuniy mahsulot jo\'natishdan oldin sifat bo\'yicha alohida tekshiruvdan o\'tadi.',
            ];

            $defaultPortfolioItems = [
                [
                    'title' => 'Anor medalyon devor paneli',
                    'type' => 'Premium interyer',
                    'text' => 'Katta mehmonxona yoki salon interyeri uchun chuqur bordo va tabiiy oltin ohanglarda tayyorlangan markaziy suzani kompozitsiyasi.',
                    'tone' => 'clay',
                    'highlight' => '260 x 190 sm',
                    'image' => '/images/home/items/photo_2026-03-18_16-32-50.jpg',
                ],
                [
                    'title' => 'Kelin salom suzani jamlanmasi',
                    'type' => 'Shaxsiy buyurtma',
                    'text' => 'Yangi oila uchun yostiq, suzani va mayda tekstil aksentlardan tuzilgan, interyerga moslashtirilgan maxsus buyurtma seti.',
                    'tone' => 'rose',
                    'highlight' => 'Custom set',
                    'image' => '/images/home/items/photo_2026-03-18_16-31-52.jpg',
                ],
                [
                    'title' => 'Silk Road stol runner kolleksiyasi',
                    'type' => 'HoReCa loyiha',
                    'text' => 'Milliy restoran va mehmon uylari uchun tikilgan runner hamda salfetka to\'plami, ko\'p martalik xizmatga mos zich matoda ishlangan.',
                    'tone' => 'gold',
                    'highlight' => '16 ta to\'plam',
                    'image' => '/images/home/items/photo_2026-03-18_16-31-46.jpg',
                ],
                [
                    'title' => 'Boutique suite textile styling',
                    'type' => 'Interyer styling',
                    'text' => 'Yotoqxona uchun yostiq, panel va yumshoq dekor uyg\'unligida ishlab chiqilgan, pastel-baxmal ohangli kompozitsiya.',
                    'tone' => 'sky',
                    'highlight' => '4 element',
                    'image' => '/images/home/items/photo_2026-03-18_16-32-08.jpg',
                ],
                [
                    'title' => 'Reception zone naqsh paneli',
                    'type' => 'Corporate decor',
                    'text' => 'Kutish zonasi va vakillik ofisi uchun brend kayfiyatiga moslashtirilgan, naqsh markazi kuchli dekorativ panel.',
                    'tone' => 'ink',
                    'highlight' => '220 x 150 sm',
                    'image' => '/images/home/items/photo_2026-03-18_16-31-34.jpg',
                ],
                [
                    'title' => 'Navro\'z ko\'rgazma kompozitsiyasi',
                    'type' => 'Ko\'rgazma namunasi',
                    'text' => 'Hunarmandchilik ko\'rgazmasi va showroom namoyishi uchun tayyorlangan, yaqin masofada kashta sifatini ko\'rsatadigan markaziy ish.',
                    'tone' => 'teal',
                    'highlight' => '210 x 140 sm',
                    'image' => '/images/home/items/il_794xN.6819611559_ozk7.jpg',
                ],
            ];

            $portfolioItems = \App\Models\PortfolioItem::query()
                ->where('is_active', true)
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->limit(6)
                ->get()
                ->values()
                ->map(function (\App\Models\PortfolioItem $item, int $index): array {
                    $tones = ['clay', 'rose', 'gold', 'sky', 'ink', 'teal'];

                    return [
                        'title' => $item->title,
                        'type' => $item->project_type ?: 'Portfolio loyiha',
                        'text' => $item->excerpt ?: $item->description ?: 'Portfolio tavsifi keyinroq to\'ldiriladi.',
                        'tone' => $tones[$index % count($tones)],
                        'highlight' => $item->highlight_value ?: ($item->is_featured ? 'Featured loyiha' : 'Portfolio karta'),
                        'image' => $item->cover_image,
                    ];
                })
                ->all();

            if ($portfolioItems === []) {
                $portfolioItems = $defaultPortfolioItems;
            }

            $categories = [
                [
                    'name' => 'Devor uchun suzani',
                    'count' => '24 mahsulot',
                    'tone' => 'rose',
                    'filter' => 'suzani',
                    'copy' => 'Katta devor kompozitsiyasi va premium interyerlar uchun qo\'lda tikilgan markaziy ishlar.',
                ],
                [
                    'name' => 'Stol bezaklari',
                    'count' => '18 mahsulot',
                    'tone' => 'gold',
                    'filter' => 'table',
                    'copy' => 'Bayram dasturxoni va kundalik stol styling uchun nafis runner hamda bezaklar.',
                ],
                [
                    'name' => 'Yostiq va tekstil',
                    'count' => '31 mahsulot',
                    'tone' => 'teal',
                    'filter' => 'textile',
                    'copy' => 'Yumshoq tekstura, sokin rang va kashta aksenti bilan interyerga iliqlik beradigan kolleksiya.',
                ],
                [
                    'name' => 'Sovg\'a to\'plamlari',
                    'count' => '12 mahsulot',
                    'tone' => 'ink',
                    'filter' => 'gift',
                    'copy' => 'To\'y, mehmondorchilik va maxsus kunlar uchun tayyorlangan sovg\'abop premium setlar.',
                ],
            ];

            $mediaUrl = static fn (?string $path): ?string => \App\Support\UploadedMedia::url($path);
            $galleryLabels = ['Asosiy ko\'rinish', 'Detaldan ko\'rinish', 'Qo\'shimcha ko\'rinish', 'Material yaqindan', 'Interyer ko\'rinishi'];
            $galleryFallbackPool = [
                $homeImage('items/photo_2026-03-18_16-31-05.jpg'),
                $homeImage('items/photo_2026-03-18_16-31-34.jpg'),
                $homeImage('items/photo_2026-03-18_16-31-39.jpg'),
                $homeImage('items/photo_2026-03-18_16-32-34.jpg'),
                $homeImage('items/photo_2026-03-18_16-32-47.jpg'),
            ];
            $buildDbGallery = static function (string $title, ?string $mainImage, array $galleryPaths, int $index) use ($mediaUrl, $galleryLabels, $galleryFallbackPool): array {
                $paths = collect([$mainImage, ...$galleryPaths])
                    ->filter(fn (mixed $path): bool => filled($path))
                    ->unique()
                    ->values();

                $gallery = $paths
                    ->map(function (string $path, int $imageIndex) use ($title, $mediaUrl, $galleryLabels): ?array {
                        $src = $mediaUrl($path);

                        if (blank($src)) {
                            return null;
                        }

                        $label = $galleryLabels[$imageIndex] ?? ('Rasm '.($imageIndex + 1));

                        return [
                            'src' => $src,
                            'label' => $label,
                            'alt' => $title.' - '.$label,
                        ];
                    })
                    ->filter()
                    ->values()
                    ->all();

                if ($gallery !== []) {
                    return $gallery;
                }

                $fallbackSrc = $galleryFallbackPool[$index % count($galleryFallbackPool)];

                return [[
                    'src' => $fallbackSrc,
                    'label' => $galleryLabels[0],
                    'alt' => $title.' - '.$galleryLabels[0],
                ]];
            };

            $dbProducts = \App\Models\Product::query()
                ->with('category')
                ->where('is_active', true)
                ->orderByDesc('is_featured')
                ->orderByDesc('updated_at')
                ->get();

            if ($dbProducts->isNotEmpty()) {
                $tones = ['rose', 'ink', 'teal', 'gold', 'clay', 'sky'];

                $allProducts = $dbProducts
                    ->values()
                    ->map(function (\App\Models\Product $product, int $index) use ($tones, $buildDbGallery): array {
                        $categoryName = $product->category?->name ?: 'Kategoriyasiz';
                        $categoryFilter = $product->category?->slug ?: \Illuminate\Support\Str::slug($categoryName);
                        $gallery = $buildDbGallery(
                            $product->name,
                            $product->main_image,
                            \Illuminate\Support\Arr::wrap($product->gallery),
                            $index,
                        );

                        $availability = match ($product->availability_mode) {
                            \App\Models\Product::AVAILABILITY_MADE_TO_ORDER => 'Buyurtma asosida mavjud',
                            default => 'Omborda bor',
                        };

                        $tag = match (true) {
                            (bool) $product->is_featured => 'Tavsiya etiladi',
                            filled($product->old_price) && (int) $product->old_price > (int) $product->price => 'Chegirma',
                            $product->availability_mode === \App\Models\Product::AVAILABILITY_MADE_TO_ORDER => 'Buyurtma asosida',
                            $product->stock_status === \App\Models\Product::STOCK_LOW => 'Kam qoldi',
                            $product->stock_status === \App\Models\Product::STOCK_OUT => 'Tugagan',
                            default => 'Katalogda',
                        };

                        return [
                            'id' => $product->slug ?: \Illuminate\Support\Str::slug($product->name),
                            'title' => $product->name,
                            'price' => (int) $product->price,
                            'formatted_price' => number_format((float) $product->price, 0, '.', ' ').' so\'m',
                            'tag' => $tag,
                            'short_description' => $product->short_description ?: 'Mahsulot tavsifi admin paneldan to\'ldiriladi.',
                            'full_description' => $product->full_description ?: ($product->short_description ?: 'Mahsulot tavsifi keyinroq to\'ldiriladi.'),
                            'product_story' => $product->product_story ?: ($product->name.' ustaxonaning qo\'lda ishlangan kolleksiyasida an\'anaviy naqsh va zamonaviy interyer ehtiyojlarini birlashtirish uchun yaratilgan.'),
                            'material' => $product->material ?: 'Admin paneldan to\'ldiriladi',
                            'size' => $product->size ?: 'Kelishiladi',
                            'color' => $product->color ?: 'Individual tanlov',
                            'availability' => $availability,
                            'lead_time' => $product->production_time ?: 'Kelishiladi',
                            'category' => $categoryFilter,
                            'category_label' => $categoryName,
                            'category_description' => $product->category?->description ?: ($categoryName.' mahsulotlari admin paneldan boshqariladi.'),
                            'popularity' => max((int) $product->view_count, 0),
                            'new_rank' => $product->updated_at?->getTimestamp() ?? (time() - $index),
                            'tone' => $tones[$index % count($tones)],
                            'gallery' => $gallery,
                            'images' => array_map(static fn (array $image): string => $image['label'], $gallery),
                            'is_featured' => (bool) $product->is_featured,
                        ];
                    })
                    ->all();

                $featuredProducts = array_values(array_filter($allProducts, static fn (array $product): bool => (bool) ($product['is_featured'] ?? false)));
                $topProducts = array_slice($featuredProducts !== [] ? $featuredProducts : $allProducts, 0, 3);

                $groupedCategories = collect($allProducts)->groupBy('category');

                $productFilters = array_merge(
                    [['value' => 'all', 'label' => 'Barchasi']],
                    $groupedCategories
                        ->map(static fn (\Illuminate\Support\Collection $items): array => [
                            'value' => $items->first()['category'],
                            'label' => $items->first()['category_label'],
                        ])
                        ->values()
                        ->all(),
                );

                $categories = $groupedCategories
                    ->values()
                    ->map(function (\Illuminate\Support\Collection $items, int $index) use ($tones): array {
                        $first = $items->first();

                        return [
                            'name' => $first['category_label'],
                            'count' => $items->count().' mahsulot',
                            'tone' => $tones[$index % count($tones)],
                            'filter' => $first['category'],
                            'copy' => $first['category_description'],
                        ];
                    })
                    ->all();
            }

            $steps = [
                ['number' => '01', 'title' => 'Mahsulotni tanlang', 'text' => 'Sizga yoqqan suzani yoki tekstil mahsulotini katalogdan tanlaysiz.'],
                ['number' => '02', 'title' => 'Buyurtma qoldiring', 'text' => 'Telefon, Telegram yoki sayt formasi orqali bog\'lanib buyurtmani tasdiqlaysiz.'],
                ['number' => '03', 'title' => 'Tayyorlash va qadoqlash', 'text' => 'Mahsulot tekshiriladi, ehtiyotkor qadoqlanadi va jo\'natishga tayyorlanadi.'],
                ['number' => '04', 'title' => 'Yetkazib berish', 'text' => 'Buyurtmangiz O\'zbekiston bo\'ylab ishonchli yetkazib berish xizmati bilan yuboriladi.'],
            ];

            $defaultTestimonials = [
                [
                    'name' => 'Dilnoza M.',
                    'role' => 'Toshkent',
                    'quote' => 'Mahsulot rasmdagidan ham chiroyli ekan. Qadoqlanishi va mato sifati juda yoqdi.',
                ],
                [
                    'name' => 'Aziza R.',
                    'role' => 'Samarqand',
                    'quote' => 'Mehmonxona uchun olgan suzanim butun interyerga yangi kayfiyat berdi. Juda nafis ishlangan.',
                ],
                [
                    'name' => 'Javohir K.',
                    'role' => 'Buxoro',
                    'quote' => 'Onamga sovg\'a qilgandim, juda xursand bo\'ldilar. Tez yetib keldi va xizmat ham yaxshi.',
                ],
            ];

            $testimonials = \App\Models\Feedback::query()
                ->where('is_approved', true)
                ->orderByDesc('is_featured')
                ->orderByDesc('published_at')
                ->orderByDesc('created_at')
                ->limit(3)
                ->get()
                ->map(function (\App\Models\Feedback $item): array {
                    return [
                        'name' => $item->customer_name,
                        'role' => $item->city ?: 'Mijoz',
                        'quote' => $item->content,
                    ];
                })
                ->all();

            if ($testimonials === []) {
                $testimonials = $defaultTestimonials;
            }

            $heroPromises = [
                [
                    'title' => 'Buyurtma asosida',
                    'text' => 'Har bir buyum interyer, rang va istakka moslab tayyorlanadi.',
                ],
                [
                    'title' => 'Sifatli material',
                    'text' => 'Tabiiy mato, puxta ishlov va uzoq xizmat qiladigan detallarga e\'tibor beriladi.',
                ],
                [
                    'title' => 'Butun O\'zbekiston bo\'ylab yuborish',
                    'text' => 'Toshkentdan viloyatlarga ehtiyotkor qadoq va ishonchli yetkazib berish bilan jo\'natiladi.',
                ],
            ];

            $heroBanner = \App\Models\ContentBlock::query()
                ->where('type', \App\Models\ContentBlock::TYPE_BANNER)
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->first();

            $heroEyebrow = filled($heroBanner?->subtitle) ? $heroBanner->subtitle : 'Hunarmand ustaxonasidan';
            $heroTitle = filled($heroBanner?->title) ? $heroBanner->title : 'Qo\'lda yasalgan noyob buyumlar';
            $heroText = filled($heroBanner?->content)
                ? $heroBanner->content
                : 'Suzani Shop interyer uchun nafis, sokin va qadrli buyumlar yaratadi. Har bir mahsulotda qo\'l mehnati, iliq ranglar va sifatli materiallar orqali uyga hissiyot olib kiradigan ruh bor.';
            $heroPrimaryLink = filled($heroBanner?->link) ? $heroBanner->link : '#catalog';
            $heroPrimaryLabel = filled($heroBanner?->link) ? 'Ko\'rish' : 'Kolleksiyani ko\'rish';
            $heroMeta = array_merge([
                'hero_main_badge' => 'Asosiy kolleksiya',
                'hero_main_title' => 'Anor Suzani',
                'hero_main_caption' => 'Katta format, mayin ranglar va qo\'lda ishlangan nafis naqshlar.',
                'hero_detail_image' => '/images/home/hero/hero-detail.jpg',
                'hero_detail_badge' => 'Detail',
                'hero_detail_title' => 'Kashta teksturasi',
                'hero_material_image' => '/images/home/hero/hero-material.jpg',
                'hero_material_badge' => 'Material',
                'hero_material_title' => 'Ustaxona jarayoni va tabiiy mato',
            ], \Illuminate\Support\Arr::wrap($heroBanner?->meta));
            $heroMainImage = $mediaUrl($heroBanner?->image) ?? asset('images/home/hero/hero-main.jpg');
            $heroDetailImage = $mediaUrl($heroMeta['hero_detail_image'] ?? null) ?? asset('images/home/hero/hero-detail.jpg');
            $heroMaterialImage = $mediaUrl($heroMeta['hero_material_image'] ?? null) ?? asset('images/home/hero/hero-material.jpg');

            $contactBlock = \App\Models\ContentBlock::query()
                ->where('type', \App\Models\ContentBlock::TYPE_CONTACT)
                ->where('key', 'contact-main')
                ->where('is_active', true)
                ->first();

            $contactMeta = array_merge([
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
            ], \Illuminate\Support\Arr::wrap($contactBlock?->meta));

            $contactMeta['phone_value'] = $contactMeta['phone_value'] ?? ($contactMeta['phone'] ?? '+998 90 123 45 67');
            $contactMeta['telegram_value'] = $contactMeta['telegram_value'] ?? ($contactMeta['telegram'] ?? '@suzanishop');
            $contactMeta['instagram_value'] = $contactMeta['instagram_value'] ?? ($contactMeta['instagram'] ?? '@suzanishop');

            $normalizeExternalLink = function (?string $value, ?string $explicitUrl, string $platform): ?string {
                $explicitUrl = filled($explicitUrl) ? trim($explicitUrl) : null;

                if ($explicitUrl) {
                    return $explicitUrl;
                }

                if (blank($value)) {
                    return null;
                }

                $value = trim((string) $value);

                if (\Illuminate\Support\Str::startsWith($value, ['http://', 'https://'])) {
                    return $value;
                }

                return match ($platform) {
                    'telegram' => 'https://t.me/'.ltrim($value, '@'),
                    'instagram' => 'https://instagram.com/'.ltrim($value, '@'),
                    default => null,
                };
            };

            $contactPhone = $contactMeta['phone_value'];
            $contactPhoneHref = filled($contactPhone) ? 'tel:'.preg_replace('/[^+\d]/', '', (string) $contactPhone) : null;
            $contactTelegramUrl = $normalizeExternalLink($contactMeta['telegram_value'] ?? null, $contactMeta['telegram_url'] ?? null, 'telegram');
            $contactInstagramUrl = $normalizeExternalLink($contactMeta['instagram_value'] ?? null, $contactMeta['instagram_url'] ?? null, 'instagram');
            $contactSectionLabel = filled($contactBlock?->subtitle) ? $contactBlock->subtitle : 'Aloqa';
            $contactSectionTitle = filled($contactBlock?->title) ? $contactBlock->title : 'Buyurtma yoki hamkorlik uchun biz bilan bog\'laning';
            $contactSectionCopy = filled($contactBlock?->content)
                ? $contactBlock->content
                : 'Instagram, Telegram yoki telefon orqali murojaat qiling. Sizga mahsulot tanlash, rang moslashtirish va buyurtmani rasmiylashtirishda yordam beramiz.';

            $contactMapLatitude = (float) ($contactMeta['map_latitude'] ?? 41.311081);
            $contactMapLongitude = (float) ($contactMeta['map_longitude'] ?? 69.240562);
            $contactMapZoom = max(8, min(18, (int) ($contactMeta['map_zoom'] ?? 13)));
            $contactMapCoordinates = number_format($contactMapLatitude, 5, '.', '').', '.number_format($contactMapLongitude, 5, '.', '');
            $contactMapHint = 'Offline ko\'rinish. Yetib borish uchun manzil va koordinatadan foydalaning.';
        @endphp

        <header class="hero-section">
            <div class="hero-noise"></div>
            <nav class="topbar container" data-site-header>
                <a href="/" class="brand-mark">
                    <span class="brand-knot"></span>
                    <span>Suzani Shop</span>
                </a>

                <div class="topbar-links">
                    <a href="#about">Biz haqimizda</a>
                    <a href="#catalog">Mahsulotlar</a>
                    <a href="#cart" class="cart-link">
                        Savatcha
                        <span class="cart-badge" data-cart-count>0</span>
                    </a>
                    <a href="#contact">Aloqa</a>
                </div>

                <div class="topbar-actions">
                    <button
                        type="button"
                        class="theme-toggle"
                        data-theme-toggle
                        data-active-theme="atelier"
                        aria-label="Rang rejimini almashtirish"
                        aria-pressed="false"
                    >
                        <span class="theme-toggle-label theme-toggle-label-light">Atelier</span>
                        <span class="theme-toggle-label theme-toggle-label-dark">Nocturne</span>
                        <span class="sr-only" data-theme-toggle-status>Atelier rejimi yoqilgan</span>
                    </button>
                    <a href="{{ route('login') }}" class="topbar-admin-link">
                        <span class="topbar-admin-copy">
                            <span class="topbar-admin-overline">Admin zona</span>
                            <span class="topbar-admin-title">Login</span>
                        </span>
                        <span class="topbar-admin-knot" aria-hidden="true"></span>
                    </a>
                </div>
            </nav>

            <div class="container hero-grid">
                <div class="hero-copy">
                    <p class="eyebrow">{{ $heroEyebrow }}</p>
                    <h1>{{ $heroTitle }}</h1>
                    <p class="hero-text">{{ $heroText }}</p>

                    <div class="hero-actions">
                        <a href="{{ $heroPrimaryLink }}" class="button button-primary">{{ $heroPrimaryLabel }}</a>
                        <a href="#contact" class="button button-secondary">Buyurtma berish</a>
                    </div>

                    <p class="hero-trust-note">
                        Minimalistik ko'rinish, premium ishlov va hunarmand ruhini saqlagan maxsus kolleksiyalar.
                    </p>

                    <div class="hero-stats">
                        <div>
                            <strong>12 yil</strong>
                            <span>Amaliy tajriba</span>
                        </div>
                        <div>
                            <strong>800+</strong>
                            <span>Qo'lda yaratilgan ish</span>
                        </div>
                        <div>
                            <strong>Premium</strong>
                            <span>Issiq va nafis kolleksiya</span>
                        </div>
                    </div>
                </div>

                <div class="hero-art">
                    <div class="hero-visual-stage">
                        <div class="hero-visual-main">
                            <img src="{{ $heroMainImage }}" alt="{{ $heroMeta['hero_main_title'] }}" class="hero-visual-image hero-visual-image-main">
                            <div class="hero-visual-label">
                                <span>{{ $heroMeta['hero_main_badge'] }}</span>
                                <strong>{{ $heroMeta['hero_main_title'] }}</strong>
                            </div>
                            <div class="hero-visual-caption">
                                {{ $heroMeta['hero_main_caption'] }}
                            </div>
                        </div>

                        <div class="hero-visual-stack">
                            <div class="hero-visual-detail hero-visual-detail-top">
                                <img src="{{ $heroDetailImage }}" alt="{{ $heroMeta['hero_detail_title'] }}" class="hero-visual-image hero-visual-image-detail">
                                <span>{{ $heroMeta['hero_detail_badge'] }}</span>
                                <strong>{{ $heroMeta['hero_detail_title'] }}</strong>
                            </div>

                            <div class="hero-visual-detail hero-visual-detail-bottom">
                                <img src="{{ $heroMaterialImage }}" alt="{{ $heroMeta['hero_material_title'] }}" class="hero-visual-image hero-visual-image-material">
                                <span>{{ $heroMeta['hero_material_badge'] }}</span>
                                <strong>{{ $heroMeta['hero_material_title'] }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container hero-feature-bar">
                @foreach ($heroPromises as $promise)
                    <article class="hero-feature">
                        <strong>{{ $promise['title'] }}</strong>
                        <p>{{ $promise['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </header>

        <main>
            <section id="about" class="section">
                <div class="container">
                    <div class="about-hero">
                        <div>
                            <p class="section-label">Biz haqimizda</p>
                            <h2 class="section-title">Hunarmand tarixi, ustaxona ruhi va qo'lda yaratilgan har bir naqsh ortidagi mehnat</h2>
                            <p class="about-lead">
                                Suzani Shop faqat mahsulot sotmaydi. Biz har bir buyum orqali ustaning tajribasi, oilaviy hunarmandchilik
                                yo'li va qo'lda ishlashga bo'lgan hurmatni yetkazamiz.
                            </p>
                        </div>

                        <div class="about-stat-row">
                            @foreach ($craftStats as $stat)
                                <div class="about-stat-card">
                                    <strong>{{ $stat['value'] }}</strong>
                                    <span>{{ $stat['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="about-story-grid">
                        @foreach ($craftHighlights as $highlight)
                            <article class="about-card about-story-card">
                                <h3>{{ $highlight['title'] }}</h3>
                                <p>{{ $highlight['text'] }}</p>
                            </article>
                        @endforeach
                    </div>

                    <div class="about-grid about-gallery-grid">
                        <article class="about-card about-gallery-card">
                            <div class="section-head about-gallery-head">
                                <div>
                                    <p class="section-label">Ustaxona galereyasi</p>
                                    <h3>Jarayon, material va tayyor buyumlarning haqiqiy kadrlari</h3>
                                </div>
                                <span class="about-gallery-caption">Yuklangan rasmlar asosida</span>
                            </div>

                            <div
                                class="product-showcase-gallery about-showcase-gallery"
                                data-gallery
                                data-gallery-tone="clay"
                                data-gallery-title="Suzani Shop ustaxonasi"
                                data-gallery-description="Bu galereyada ustaxona ruhi, mato tanlovi va tayyor buyumlarning haqiqiy kadrlari jamlangan."
                            >
                                <div class="product-gallery-stage product-tone-clay about-gallery-stage">
                                    <span class="product-gallery-badge">Galereya</span>
                                    <div class="product-gallery-nav-wrap">
                                        <button type="button" class="product-gallery-nav" data-gallery-prev aria-label="Oldingi rasm">&#8249;</button>
                                        <button type="button" class="product-gallery-visual" data-gallery-open aria-label="Rasmni kattalashtirib ko'rish">
                                            <span class="product-gallery-visual-art" aria-hidden="true">
                                                <img
                                                    src="{{ $aboutGallery[0]['src'] }}"
                                                    alt="{{ $aboutGallery[0]['alt'] }}"
                                                    class="product-gallery-image"
                                                    data-gallery-active-image
                                                >
                                            </span>
                                            <span class="product-gallery-visual-copy">
                                                <strong data-gallery-active-label>{{ $aboutGallery[0]['label'] }}</strong>
                                                <span class="product-gallery-visual-subtitle">Suzani Shop</span>
                                            </span>
                                        </button>
                                        <button type="button" class="product-gallery-nav" data-gallery-next aria-label="Keyingi rasm">&#8250;</button>
                                    </div>
                                    <div class="product-gallery-meta">
                                        <span class="product-gallery-hint">Kattalashtirib ko'rish</span>
                                        <div class="product-gallery-counter" data-gallery-counter>1 / {{ count($aboutGallery) }}</div>
                                    </div>
                                </div>
                                <div class="product-gallery-data" hidden>
                                    @foreach ($aboutGallery as $image)
                                        <button
                                            type="button"
                                            class="product-gallery-item{{ $loop->first ? ' is-active' : '' }}"
                                            data-gallery-item
                                            data-gallery-label="{{ $image['label'] }}"
                                            data-gallery-src="{{ $image['src'] }}"
                                            data-gallery-alt="{{ $image['alt'] }}"
                                            aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                        >
                                            {{ $image['label'] }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </article>

                        <article class="about-card about-gallery-note">
                            <p class="section-label">Mazmunli tanlov</p>
                            <h3>Mahsulot kartalariga ham shu yuklangan rasmlarning mos qismi biriktirildi</h3>
                            <p>
                                Har bir kartochkada mahsulot turiga yaqin ko'rinishlar ko'rsatildi: devor suzanisi, stol bezagi,
                                tekstil va sovg'a to'plamlari alohida guruhlandi.
                            </p>
                            <div class="about-gallery-points">
                                <div>
                                    <strong>Real kadrlar</strong>
                                    <span>Placeholder o'rniga haqiqiy yuklangan suratlar ishlatiladi.</span>
                                </div>
                                <div>
                                    <strong>Bir xil uslub</strong>
                                    <span>About va product gallery bir xil vizual til bilan ishlaydi.</span>
                                </div>
                                <div>
                                    <strong>Kattalashtirish</strong>
                                    <span>Har bir rasmni modal oynada to'liq ko'rish mumkin.</span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="about-grid about-deep-grid">
                        <article class="about-card about-process-card">
                            <p class="section-label">Qo'lda ishlash jarayoni</p>
                            <h3>Har bir mahsulot bir necha puxta bosqichdan o'tadi</h3>
                            <div class="craft-process-list">
                                @foreach ($craftProcess as $item)
                                    <div class="craft-process-item">
                                        <span>{{ $item['step'] }}</span>
                                        <div>
                                            <strong>{{ $item['title'] }}</strong>
                                            <p>{{ $item['text'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </article>

                        <article class="about-card about-why-card">
                            <p class="section-label">Nega aynan shu usta</p>
                            <h3>Ishonch, sifat va individual yondashuv sabab mijozlar yana qaytadi</h3>
                            <ul class="why-choose-list">
                                @foreach ($whyChoose as $reason)
                                    <li>{{ $reason }}</li>
                                @endforeach
                            </ul>
                        </article>
                    </div>
                </div>
            </section>

            <section id="portfolio" class="section section-soft">
                <div class="container">
                    <div class="section-head">
                        <div>
                            <p class="section-label">Portfolio / Galereya</p>
                            <h2 class="section-title">Real ishlar ishonch beradi, shu sabab bajarilgan loyihalarni ochiq ko'rsatamiz</h2>
                        </div>
                        <a href="#contact" class="text-link">Shunga o'xshash buyurtma berish</a>
                    </div>

                    <div class="portfolio-intro">
                        <p>
                            Katalog mahsulotni ko'rsatadi, portfolio esa ustaning haqiqiy darajasini. Bu yerda turli interyerlar,
                            maxsus buyurtmalar va tayyorlangan real ishlar uslubini ko'rishingiz mumkin.
                        </p>
                    </div>

                    <div class="portfolio-grid">
                        @foreach ($portfolioItems as $item)
                            @php
                                $portfolioImage = $mediaUrl($item['image'] ?? null);
                            @endphp
                            <article class="portfolio-card portfolio-card-{{ $item['tone'] }}">
                                <div class="portfolio-visual{{ $portfolioImage ? ' has-image' : '' }}">
                                    @if ($portfolioImage)
                                        <img
                                            src="{{ $portfolioImage }}"
                                            alt="{{ $item['title'] }}"
                                            class="portfolio-visual-image"
                                            loading="lazy"
                                        >
                                    @endif
                                    <div class="portfolio-visual-copy">
                                        <span>{{ $item['type'] }}</span>
                                        <strong>{{ $item['highlight'] }}</strong>
                                    </div>
                                </div>
                                <div class="portfolio-body">
                                    <h3>{{ $item['title'] }}</h3>
                                    <p>{{ $item['text'] }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="products" class="section section-soft">
                <div class="container">
                    <div class="section-head">
                        <div>
                            <p class="section-label">Top mahsulotlar</p>
                            <h2 class="section-title">Eng ko'p tanlanayotgan mahsulotlar</h2>
                        </div>
                        <a href="#contact" class="text-link">Buyurtma berish</a>
                    </div>

                    <div class="product-grid">
                        @foreach ($topProducts as $product)
                            @php
                                $productPayload = [
                                    'id' => $product['id'],
                                    'title' => $product['title'],
                                    'price' => $product['price'],
                                    'formatted_price' => $product['formatted_price'],
                                    'category_label' => $product['category_label'],
                                    'short_description' => $product['short_description'],
                                    'full_description' => $product['full_description'],
                                    'product_story' => $product['product_story'],
                                    'material' => $product['material'],
                                    'size' => $product['size'],
                                    'color' => $product['color'],
                                    'availability' => $product['availability'],
                                    'lead_time' => $product['lead_time'],
                                    'image_src' => $product['gallery'][0]['src'] ?? null,
                                    'image_label' => $product['images'][0] ?? null,
                                    'images' => $product['images'],
                                ];
                            @endphp
                            <article class="product-card">
                                <div
                                    class="product-showcase-gallery"
                                    data-gallery
                                    data-gallery-tone="{{ $product['tone'] }}"
                                    data-gallery-title="{{ $product['title'] }}"
                                    data-gallery-price="{{ $product['formatted_price'] }}"
                                    data-gallery-category="{{ $product['category_label'] }}"
                                    data-gallery-material="{{ $product['material'] }}"
                                    data-gallery-size="{{ $product['size'] }}"
                                    data-gallery-description="{{ $product['short_description'] }}"
                                >
                                    <div class="product-gallery-stage product-tone-{{ $product['tone'] }}">
                                        <span class="product-gallery-badge">Ko'rinish</span>
                                        <div class="product-gallery-nav-wrap">
                                            <button type="button" class="product-gallery-nav" data-gallery-prev aria-label="Oldingi rasm">&#8249;</button>
                                            <button type="button" class="product-gallery-visual" data-gallery-open aria-label="Rasmni kattalashtirib ko'rish">
                                                <span class="product-gallery-visual-art" aria-hidden="true">
                                                    <img
                                                        src="{{ $product['gallery'][0]['src'] }}"
                                                        alt="{{ $product['gallery'][0]['alt'] ?? $product['title'] }}"
                                                        class="product-gallery-image"
                                                        data-gallery-active-image
                                                    >
                                                </span>
                                                <span class="product-gallery-visual-copy">
                                                    <strong data-gallery-active-label>{{ $product['gallery'][0]['label'] }}</strong>
                                                    <span class="product-gallery-visual-subtitle">{{ $product['title'] }}</span>
                                                </span>
                                            </button>
                                            <button type="button" class="product-gallery-nav" data-gallery-next aria-label="Keyingi rasm">&#8250;</button>
                                        </div>
                                        <div class="product-gallery-meta">
                                            <span class="product-gallery-hint">Kattalashtirib ko'rish</span>
                                            <div class="product-gallery-counter" data-gallery-counter>1 / {{ count($product['gallery']) }}</div>
                                        </div>
                                    </div>
                                    <div class="product-gallery-data" hidden>
                                        @foreach ($product['gallery'] as $image)
                                            <button
                                                type="button"
                                                class="product-gallery-item{{ $loop->first ? ' is-active' : '' }}"
                                                data-gallery-item
                                                data-gallery-label="{{ $image['label'] }}"
                                                data-gallery-src="{{ $image['src'] }}"
                                                data-gallery-alt="{{ $image['alt'] ?? $product['title'] }}"
                                                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                            >
                                                {{ $image['label'] }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                <span class="pill">{{ $product['tag'] }}</span>
                                <h3>{{ $product['title'] }}</h3>
                                <p>{{ $product['short_description'] }}</p>
                                <div class="product-foot">
                                    <strong>{{ $product['formatted_price'] }}</strong>
                                    <div class="product-actions">
                                        <button
                                            type="button"
                                            class="button button-primary button-compact"
                                            data-add-to-cart="{{ base64_encode(json_encode($productPayload, JSON_UNESCAPED_UNICODE)) }}"
                                        >
                                            Savatchaga qo'shish
                                        </button>
                                        <a href="#cart" class="button button-secondary button-compact">Savatchaga o'tish</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="catalog" class="section">
                <div class="container">
                    <div class="collection-shell">
                        <div class="collection-intro">
                            <p class="section-label">Kategoriyalar / Barcha mahsulotlar</p>
                            <h2 class="section-title" data-collection-title>Har bir xonaga mos kolleksiyalar va qulay tanlov</h2>
                            <p class="collection-copy" data-collection-copy>
                                Kategoriya kartasining o'zini bosing. Sahifa yangilanmaydi, mahsulotlar shu joyning o'zida
                                yumshoq almashadi va siz ortiqcha qadam qilmasdan tanlovni davom ettirasiz.
                            </p>
                        </div>

                        <div class="collection-active-card" data-catalog-panel>
                            <span data-collection-active-label>Barchasi</span>
                            <strong data-collection-active-count>{{ count($allProducts) }} ta mahsulot</strong>
                            <p data-collection-active-copy>
                                Barcha asosiy kolleksiyalar ochiq. Suzani, stol bezagi, tekstil va sovg'alarni bir joyda ko'ring.
                            </p>
                        </div>
                    </div>

                    <div class="category-mixer-grid" aria-label="Kategoriyalar tezkor tanlovi">
                        @foreach ($categories as $category)
                            <button
                                type="button"
                                class="category-card category-{{ $category['tone'] }}"
                                data-category-card
                                data-filter-target="{{ $category['filter'] }}"
                                data-title="{{ $category['name'] }}"
                                data-count="{{ $category['count'] }}"
                                data-copy="{{ $category['copy'] }}"
                            >
                                <span>{{ $category['count'] }}</span>
                                <h3>{{ $category['name'] }}</h3>
                                <strong>Shu kolleksiyani ochish</strong>
                            </button>
                        @endforeach
                    </div>

                    <div class="catalog-toolbar" data-products-toolbar>
                        <div class="catalog-toolbar-block catalog-search-wrap">
                            <div class="catalog-block-head">
                                <label class="catalog-label" for="product-search">Qidiruv</label>
                                <p class="catalog-block-note">Mahsulot nomi, kategoriya yoki tavsif bo'yicha tez qidiring.</p>
                            </div>
                            <input
                                id="product-search"
                                class="catalog-search"
                                type="search"
                                placeholder="Masalan: suzani, yostiq, stol bezagi..."
                                data-search-input
                            >
                        </div>

                        <div class="catalog-toolbar-block catalog-controls">
                            <div class="catalog-block-head">
                                <span class="catalog-label">Kolleksiya</span>
                                <p class="catalog-block-note">Bir teg bilan kerakli toifaga o'ting.</p>
                            </div>
                            <div class="catalog-filter-group" aria-label="Mahsulot filtrlari">
                                @foreach ($productFilters as $filter)
                                    <button
                                        type="button"
                                        class="filter-chip{{ $filter['value'] === 'all' ? ' is-active' : '' }}"
                                        data-filter="{{ $filter['value'] }}"
                                    >
                                        {{ $filter['label'] }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="catalog-toolbar-block catalog-sort-wrap">
                            <div class="catalog-block-head">
                                <label class="catalog-label" for="product-sort">Sort</label>
                                <p class="catalog-block-note">Natijalarni sizga qulay tartibda ko'ring.</p>
                            </div>
                            <select id="product-sort" class="catalog-sort" data-sort-select>
                                <option value="new">Yangi</option>
                                <option value="cheap">Arzon</option>
                                <option value="expensive">Qimmat</option>
                                <option value="popular">Mashhur</option>
                            </select>
                        </div>
                    </div>

                    <div class="catalog-meta" data-catalog-meta>
                        <p class="catalog-result-pill"><span data-results-count>{{ count($allProducts) }}</span> ta mahsulot topildi</p>
                        <p class="catalog-meta-note">Qidiruv va filterlar sahifa yangilanmasdan real vaqtda ishlaydi.</p>
                    </div>

                    <div class="catalog-grid" data-products-grid>
                        @foreach ($allProducts as $product)
                            @php
                                $productPayload = [
                                    'id' => $product['id'],
                                    'title' => $product['title'],
                                    'price' => $product['price'],
                                    'formatted_price' => $product['formatted_price'],
                                    'category_label' => $product['category_label'],
                                    'short_description' => $product['short_description'],
                                    'full_description' => $product['full_description'],
                                    'product_story' => $product['product_story'],
                                    'material' => $product['material'],
                                    'size' => $product['size'],
                                    'color' => $product['color'],
                                    'availability' => $product['availability'],
                                    'lead_time' => $product['lead_time'],
                                    'image_src' => $product['gallery'][0]['src'] ?? null,
                                    'image_label' => $product['images'][0] ?? null,
                                    'images' => $product['images'],
                                ];
                            @endphp
                            <article
                                class="product-card catalog-card"
                                data-product
                                data-product-id="{{ $product['id'] }}"
                                data-category="{{ $product['category'] }}"
                                data-price="{{ $product['price'] }}"
                                data-popularity="{{ $product['popularity'] }}"
                                data-new-rank="{{ $product['new_rank'] }}"
                                data-search="{{ $product['title'] }} {{ $product['short_description'] }} {{ $product['full_description'] }} {{ $product['product_story'] }} {{ $product['material'] }} {{ $product['size'] }} {{ $product['color'] }} {{ $product['category_label'] }}"
                            >
                                <div
                                    class="catalog-gallery product-showcase-gallery"
                                    data-gallery
                                    data-gallery-tone="{{ $product['tone'] }}"
                                    data-gallery-title="{{ $product['title'] }}"
                                    data-gallery-price="{{ $product['formatted_price'] }}"
                                    data-gallery-category="{{ $product['category_label'] }}"
                                    data-gallery-material="{{ $product['material'] }}"
                                    data-gallery-size="{{ $product['size'] }}"
                                    data-gallery-description="{{ $product['short_description'] }}"
                                >
                                    <div class="product-gallery-stage product-tone-{{ $product['tone'] }}">
                                        <span class="product-gallery-badge">Galereya</span>
                                        <div class="product-gallery-nav-wrap">
                                            <button type="button" class="product-gallery-nav" data-gallery-prev aria-label="Oldingi rasm">&#8249;</button>
                                            <button type="button" class="product-gallery-visual" data-gallery-open aria-label="Rasmni kattalashtirib ko'rish">
                                                <span class="product-gallery-visual-art" aria-hidden="true">
                                                    <img
                                                        src="{{ $product['gallery'][0]['src'] }}"
                                                        alt="{{ $product['gallery'][0]['alt'] ?? $product['title'] }}"
                                                        class="product-gallery-image"
                                                        data-gallery-active-image
                                                    >
                                                </span>
                                                <span class="product-gallery-visual-copy">
                                                    <strong data-gallery-active-label>{{ $product['gallery'][0]['label'] }}</strong>
                                                    <span class="product-gallery-visual-subtitle">{{ $product['title'] }}</span>
                                                </span>
                                            </button>
                                            <button type="button" class="product-gallery-nav" data-gallery-next aria-label="Keyingi rasm">&#8250;</button>
                                        </div>
                                        <div class="product-gallery-meta">
                                            <span class="product-gallery-hint">Kattalashtirib ko'rish</span>
                                            <div class="product-gallery-counter" data-gallery-counter>1 / {{ count($product['images']) }}</div>
                                        </div>
                                    </div>
                                    <div class="product-gallery-data" hidden>
                                        @foreach ($product['gallery'] as $image)
                                            <button
                                                type="button"
                                                class="product-gallery-item{{ $loop->first ? ' is-active' : '' }}"
                                                data-gallery-item
                                                data-gallery-label="{{ $image['label'] }}"
                                                data-gallery-src="{{ $image['src'] }}"
                                                data-gallery-alt="{{ $image['alt'] ?? $product['title'] }}"
                                                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                            >
                                                {{ $image['label'] }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="catalog-card-head">
                                    <span class="pill">{{ $product['tag'] }}</span>
                                    <span class="catalog-category">{{ $product['category_label'] }}</span>
                                </div>
                                <h3>{{ $product['title'] }}</h3>
                                <p>{{ $product['short_description'] }}</p>
                                <ul class="product-specs">
                                    <li><span>Material</span><strong>{{ $product['material'] }}</strong></li>
                                    <li><span>O'lcham</span><strong>{{ $product['size'] }}</strong></li>
                                    <li><span>Rang</span><strong>{{ $product['color'] }}</strong></li>
                                    <li><span>Mavjudligi</span><strong>{{ $product['availability'] }}</strong></li>
                                    <li><span>Tayyorlash</span><strong>{{ $product['lead_time'] }}</strong></li>
                                </ul>
                                <details class="product-details">
                                    <summary>To'liq tavsifni ko'rish</summary>
                                    <p>{{ $product['full_description'] }}</p>
                                    <div class="product-story-block">
                                        <span>Mahsulot tarixi</span>
                                        <p>{{ $product['product_story'] }}</p>
                                    </div>
                                </details>
                                <div class="catalog-card-foot">
                                    <strong>{{ $product['formatted_price'] }}</strong>
                                    <div class="product-actions">
                                        <button
                                            type="button"
                                            class="button button-primary button-compact"
                                            data-add-to-cart="{{ base64_encode(json_encode($productPayload, JSON_UNESCAPED_UNICODE)) }}"
                                        >
                                            Savatchaga qo'shish
                                        </button>
                                        <a href="#cart" class="button button-secondary button-compact">Savatcha</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <p class="catalog-empty is-hidden" data-empty-state>
                        Hozircha bu qidiruv yoki filter bo'yicha mahsulot topilmadi. Boshqa filter tanlab ko'ring.
                    </p>
                </div>
            </section>

            <section id="cart" class="section section-soft">
                <div class="container">
                    <div class="section-head">
                        <div>
                            <p class="section-label">Savatcha va buyurtma</p>
                            <h2 class="section-title">Bir nechta mahsulotni qo'shib, bitta umumiy buyurtma yuboring</h2>
                        </div>
                        <div class="cart-head-note">
                            <strong>Qulay jarayon</strong>
                            <p>Buyurtma kelgach, admin uni ko'radi va siz bilan telefon yoki Telegram orqali aloqaga chiqadi.</p>
                        </div>
                    </div>

                    <div class="cart-layout">
                        <article class="cart-card">
                            <div class="cart-card-head">
                                <div>
                                    <p class="section-label">Savatcha</p>
                                    <h3>Tanlangan mahsulotlar</h3>
                                </div>
                                <a href="#catalog" class="text-link">Yana mahsulot qo'shish</a>
                            </div>

                            <p class="cart-empty" data-cart-empty>
                                Hozircha savatcha bo'sh. Katalogdan mahsulot qo'shsangiz, ular shu yerda jamlanadi.
                            </p>

                            <div class="cart-items" data-cart-items></div>

                            <div class="cart-summary">
                                <div>
                                    <span>Jami soni</span>
                                    <strong data-cart-total-qty>0 ta</strong>
                                </div>
                                <div>
                                    <span>Umumiy summa</span>
                                    <strong data-cart-total-price>0 so'm</strong>
                                </div>
                            </div>
                        </article>

                        <form
                            class="cart-card order-form-card"
                            action="{{ route('orders.store') }}"
                            method="POST"
                            data-order-form
                        >
                            @csrf
                            <div class="cart-card-head">
                                <div>
                                    <p class="section-label">Umumiy buyurtma</p>
                                    <h3>Admin bilan bog'lanish uchun ma'lumot qoldiring</h3>
                                </div>
                            </div>

                            <div class="contact-form-grid">
                                <label class="contact-field">
                                    <span>Ismingiz</span>
                                    <input type="text" name="customer_name" placeholder="Ismingizni kiriting" required>
                                </label>
                                <label class="contact-field">
                                    <span>Telefon</span>
                                    <input type="tel" name="phone" placeholder="91 310 32 98" required>
                                </label>
                                <label class="contact-field">
                                    <span>Telegram</span>
                                    <input type="text" name="telegram" placeholder="@username">
                                </label>
                                <label class="contact-field">
                                    <span>Instagram</span>
                                    <input type="text" name="instagram" placeholder="@profil">
                                </label>
                                <label class="contact-field contact-field-full">
                                    <span>Manzil</span>
                                    <input type="text" name="address" placeholder="Shahar yoki yetkazib berish manzili">
                                </label>
                                <label class="contact-field contact-field-full">
                                    <span>Izoh</span>
                                    <textarea name="notes" rows="5" placeholder="Rang, o'lcham yoki qo'shimcha istaklaringizni yozing"></textarea>
                                </label>
                            </div>

                            <button type="submit" class="button button-primary" data-order-submit disabled>
                                Umumiy buyurtma berish
                            </button>

                            <p class="form-note form-note-muted">
                                Buyurtma yuborilgach, admin mahsulotlar bo'yicha siz bilan aloqaga chiqadi va tafsilotlarni tasdiqlaydi.
                            </p>
                            <p class="form-note form-note-error is-hidden" data-order-error></p>
                            <p class="form-note form-note-success is-hidden" data-order-success></p>
                        </form>
                    </div>
                </div>
            </section>

            <section class="section section-deep">
                <div class="container">
                    <div class="section-head split-light">
                        <div>
                            <p class="section-label light">Buyurtma qanday ishlaydi</p>
                            <h2 class="section-title light">Oddiy, tushunarli va qulay jarayon</h2>
                        </div>
                    </div>

                    <div class="steps-grid">
                        @foreach ($steps as $step)
                            <article class="step-card">
                                <span>{{ $step['number'] }}</span>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['text'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="testimonials" class="section">
                <div class="container">
                    <div class="section-head">
                        <div>
                            <p class="section-label">Mijoz fikrlari</p>
                            <h2 class="section-title">Bizni tanlaganlar nima deydi</h2>
                        </div>
                    </div>

                    <div class="testimonial-grid">
                        @foreach ($testimonials as $testimonial)
                            <article class="testimonial-card">
                                <p>"{{ $testimonial['quote'] }}"</p>
                                <div>
                                    <strong>{{ $testimonial['name'] }}</strong>
                                    <span>{{ $testimonial['role'] }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="container">
                    <div class="cta-shell">
                        <div class="cta-copy">
                            <p class="section-label">Buyurtma uchun tayyormisiz</p>
                            <h2 class="section-title">Qo'lda ishlangan mahsulotni tanlang yoki Telegram orqali individual buyurtma yozing</h2>
                            <p>
                                Tayyor kolleksiyadan tanlash, maxsus o'lcham buyurtma qilish yoki ustadan maslahat olish uchun
                                ikki qulay yo'lni ochiq qoldirdik.
                            </p>
                        </div>

                        <div class="cta-actions">
                            <a href="#cart" class="button button-primary">Buyurtma bering</a>
                            @if ($contactTelegramUrl)
                                <a href="{{ $contactTelegramUrl }}" target="_blank" rel="noreferrer" class="button button-secondary">
                                    Telegramda yozing
                                </a>
                            @endif
                        </div>

                        <div class="cta-points">
                            <div class="cta-point">
                                <strong>Individual yondashuv</strong>
                                <span>Rang, o'lcham va kompozitsiya bo'yicha ustadan tavsiya oling.</span>
                            </div>
                            <div class="cta-point">
                                <strong>Tez aloqa</strong>
                                <span>So'rov yuborilgach, admin telefon yoki Telegram orqali bog'lanadi.</span>
                            </div>
                            <div class="cta-point">
                                <strong>Butun O'zbekiston bo'ylab</strong>
                                <span>Tayyor mahsulot va custom buyurtmalar ehtiyotkor jo'natiladi.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact" class="section section-soft">
                <div class="container contact-grid">
                    <div>
                        <p class="section-label">{{ $contactSectionLabel }}</p>
                        <h2 class="section-title">{{ $contactSectionTitle }}</h2>
                        <p class="contact-copy">
                            {{ $contactSectionCopy }}
                        </p>

                        <div class="contact-methods">
                            <article class="contact-method-card">
                                <span>{{ $contactMeta['phone_label'] }}</span>
                                @if ($contactPhoneHref)
                                    <a href="{{ $contactPhoneHref }}">{{ $contactPhone }}</a>
                                @else
                                    <p>{{ $contactPhone }}</p>
                                @endif
                            </article>
                            <article class="contact-method-card">
                                <span>{{ $contactMeta['telegram_label'] }}</span>
                                @if ($contactTelegramUrl)
                                    <a href="{{ $contactTelegramUrl }}" target="_blank" rel="noreferrer">{{ $contactMeta['telegram_value'] }}</a>
                                @else
                                    <p>{{ $contactMeta['telegram_value'] }}</p>
                                @endif
                            </article>
                            <article class="contact-method-card">
                                <span>{{ $contactMeta['instagram_label'] }}</span>
                                @if ($contactInstagramUrl)
                                    <a href="{{ $contactInstagramUrl }}" target="_blank" rel="noreferrer">{{ $contactMeta['instagram_value'] }}</a>
                                @else
                                    <p>{{ $contactMeta['instagram_value'] }}</p>
                                @endif
                            </article>
                        </div>

                        <div class="contact-card contact-address-card">
                            <div>
                                <span>{{ $contactMeta['address_label'] }}</span>
                                <p>{{ $contactMeta['address_value'] }}</p>
                            </div>
                            <div>
                                <span>{{ $contactMeta['hours_label'] }}</span>
                                <p>{{ $contactMeta['hours_value'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-layout">
                        <div class="contact-card contact-map-card">
                            <div class="contact-card-head">
                                <div>
                                    <span>{{ $contactMeta['map_label'] }}</span>
                                    <p>{{ $contactMeta['map_title'] }}</p>
                                </div>
                            </div>
                            <div class="contact-map-frame">
                                <div class="contact-map-surface" role="img" aria-label="{{ $contactMeta['map_title'] }}">
                                    <span class="contact-map-pin" aria-hidden="true"></span>
                                    <div class="contact-map-details">
                                        <span class="contact-map-chip">Offline map</span>
                                        <strong>{{ $contactMeta['address_value'] }}</strong>
                                        <p>{{ $contactMapHint }}</p>
                                        <div class="contact-map-meta">
                                            <span>Koordinata</span>
                                            <span>{{ $contactMapCoordinates }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form class="contact-card contact-form-card" data-contact-form>
                            <div class="contact-card-head">
                                <div>
                                    <span>{{ $contactMeta['form_label'] }}</span>
                                    <p>{{ $contactMeta['form_title'] }}</p>
                                </div>
                            </div>

                            <div class="contact-form-grid">
                                <label class="contact-field">
                                    <span>{{ $contactMeta['form_name_label'] }}</span>
                                    <input type="text" name="name" placeholder="{{ $contactMeta['form_name_placeholder'] }}">
                                </label>
                                <label class="contact-field">
                                    <span>{{ $contactMeta['form_phone_label'] }}</span>
                                    <input type="tel" name="phone" placeholder="{{ $contactMeta['form_phone_placeholder'] }}">
                                </label>
                                <label class="contact-field contact-field-full">
                                    <span>{{ $contactMeta['form_social_label'] }}</span>
                                    <input type="text" name="social" placeholder="{{ $contactMeta['form_social_placeholder'] }}">
                                </label>
                                <label class="contact-field contact-field-full">
                                    <span>{{ $contactMeta['form_message_label'] }}</span>
                                    <textarea name="message" rows="5" placeholder="{{ $contactMeta['form_message_placeholder'] }}"></textarea>
                                </label>
                            </div>

                            <button type="submit" class="button button-primary">So'rov yuborish</button>
                            <p class="contact-form-note is-hidden" data-contact-note>
                                {{ $contactMeta['form_success_note'] }}
                            </p>
                        </form>
                    </div>
                </div>
            </section>

        </main>

            <div class="gallery-lightbox is-hidden" data-gallery-modal aria-hidden="true">
            <button type="button" class="gallery-lightbox-backdrop" data-gallery-close aria-label="Galereyani yopish"></button>
            <div class="gallery-lightbox-dialog">
                <button type="button" class="gallery-lightbox-close" data-gallery-close aria-label="Yopish">Yopish</button>
                <button type="button" class="gallery-lightbox-arrow gallery-lightbox-arrow-left" data-gallery-modal-prev aria-label="Oldingi rasm">&#8249;</button>
                <div class="gallery-lightbox-stage product-tone-rose" data-gallery-modal-stage>
                    <div class="gallery-lightbox-stage-media">
                        <img src="" alt="" class="gallery-lightbox-image" data-gallery-modal-image>
                    </div>
                    <div class="gallery-lightbox-stage-copy">
                        <span data-gallery-modal-title>Mahsulot galereyasi</span>
                        <strong data-gallery-modal-label>Rasm</strong>
                        <p data-gallery-modal-count>1 / 1</p>
                    </div>
                </div>
                <div class="gallery-lightbox-info">
                    <div class="gallery-lightbox-info-head">
                        <span data-gallery-modal-product-title>Mahsulot</span>
                        <strong data-gallery-modal-price>0 so'm</strong>
                    </div>
                    <div class="gallery-lightbox-info-meta">
                        <span data-gallery-modal-category>Kategoriya</span>
                        <span data-gallery-modal-material>Material</span>
                        <span data-gallery-modal-size>O'lcham</span>
                    </div>
                    <p data-gallery-modal-description>Mahsulot haqida qisqacha ma'lumot shu yerda chiqadi.</p>
                </div>
                <button type="button" class="gallery-lightbox-arrow gallery-lightbox-arrow-right" data-gallery-modal-next aria-label="Keyingi rasm">&#8250;</button>
            </div>
        </div>

        <footer class="site-footer">
            <div class="container footer-grid">
                <div class="footer-brand">
                    <a href="/" class="brand-mark">
                        <span class="brand-knot"></span>
                        <span>Suzani Shop</span>
                    </a>
                    <p>
                        Qo'lda ishlangan suzani, tekstil va sovg'abop buyumlar orqali interyerga iliqlik, milliy ruh va
                        premium kayfiyat olib kiramiz.
                    </p>
                </div>

                <div class="footer-links">
                    <h3>Sahifa</h3>
                    <div class="footer-link-list">
                        <a href="#about">Hunarmand haqida</a>
                        <a href="#products">Mashhur mahsulotlar</a>
                        <a href="#portfolio">Portfolio</a>
                        <a href="#contact">Aloqa</a>
                    </div>
                </div>

                <div class="footer-links">
                    <h3>Aloqa</h3>
                    <div class="footer-link-list">
                        @if ($contactPhoneHref)
                            <a href="{{ $contactPhoneHref }}">{{ $contactPhone }}</a>
                        @endif
                        @if ($contactTelegramUrl)
                            <a href="{{ $contactTelegramUrl }}" target="_blank" rel="noreferrer">{{ $contactMeta['telegram_value'] }}</a>
                        @endif
                        @if ($contactInstagramUrl)
                            <a href="{{ $contactInstagramUrl }}" target="_blank" rel="noreferrer">{{ $contactMeta['instagram_value'] }}</a>
                        @endif
                        <span>{{ $contactMeta['address_value'] }}</span>
                    </div>
                </div>
            </div>

            <div class="container footer-meta">
                <span>© {{ now()->year }} Suzani Shop. Barcha huquqlar himoyalangan.</span>
                <span>Minimalistik premium dizayn, qo'l mehnati ruhi bilan.</span>
            </div>
        </footer>

        @if (!file_exists(public_path('build/manifest.json')) && !file_exists(public_path('hot')))
            @include('partials.home-inline-scripts')
        @endif
        <script>
            (() => {
                const storageKey = 'suzani-shop-theme';
                const defaultTheme = 'atelier';
                const themeMetaColors = {
                    atelier: '#f5efe6',
                    nocturne: '#211918',
                };

                const normalizeTheme = (value) => value === 'nocturne' ? 'nocturne' : defaultTheme;

                const syncThemeUi = (theme) => {
                    const safeTheme = normalizeTheme(theme);
                    const metaTheme = document.querySelector('meta[name="theme-color"]');

                    document.documentElement.setAttribute('data-theme', safeTheme);
                    document.documentElement.style.colorScheme = safeTheme === 'nocturne' ? 'dark' : 'light';

                    if (metaTheme) {
                        metaTheme.setAttribute('content', themeMetaColors[safeTheme] || themeMetaColors.atelier);
                    }

                    document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
                        toggle.setAttribute('data-active-theme', safeTheme);
                        toggle.setAttribute('aria-pressed', safeTheme === 'nocturne' ? 'true' : 'false');

                        const status = toggle.querySelector('[data-theme-toggle-status]');

                        if (status) {
                            status.textContent = safeTheme === 'nocturne'
                                ? 'Nocturne rejimi yoqilgan'
                                : 'Atelier rejimi yoqilgan';
                        }
                    });
                };

                const initThemeToggle = () => {
                    syncThemeUi(document.documentElement.getAttribute('data-theme'));

                    document.querySelectorAll('[data-theme-toggle]').forEach((toggle) => {
                        toggle.addEventListener('click', () => {
                            const currentTheme = normalizeTheme(document.documentElement.getAttribute('data-theme'));
                            const nextTheme = currentTheme === 'nocturne' ? defaultTheme : 'nocturne';

                            syncThemeUi(nextTheme);

                            try {
                                window.localStorage.setItem(storageKey, nextTheme);
                            } catch {}
                        });
                    });
                };

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initThemeToggle, { once: true });
                } else {
                    initThemeToggle();
                }
            })();
        </script>
    </body>
</html>
