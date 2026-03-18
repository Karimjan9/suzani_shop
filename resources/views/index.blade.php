<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            @include('partials.home-inline-styles')
        @endif
    </head>
    <body class="site-shell" data-theme="suzani">
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

            $allProducts = array_map(function (array $product): array {
                $product['id'] = \Illuminate\Support\Str::slug($product['title']);
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

            $portfolioItems = [
                [
                    'title' => 'Mehmonxona devor suzanisi',
                    'type' => 'Premium interyer',
                    'text' => 'Katta mehmonxona uchun maxsus rang uyg\'unligida tayyorlangan markaziy dekor ish.',
                    'tone' => 'clay',
                    'size' => '250 x 180 sm',
                ],
                [
                    'title' => 'To\'y sovg\'a to\'plami',
                    'type' => 'Shaxsiy buyurtma',
                    'text' => 'Yangi kelin-kuyov uchun tayyorlangan suzani va tekstil jamlanmasi.',
                    'tone' => 'rose',
                    'size' => 'Custom set',
                ],
                [
                    'title' => 'Restoran uchun stol bezagi',
                    'type' => 'HoReCa loyiha',
                    'text' => 'Milliy restoran stol kompozitsiyasi uchun runner va salfetka kolleksiyasi.',
                    'tone' => 'gold',
                    'size' => '16 ta to\'plam',
                ],
                [
                    'title' => 'Boutique yotoqxona dekor',
                    'type' => 'Interyer styling',
                    'text' => 'Yostiq va devor paneli bilan uyg\'unlashtirilgan yumshoq, nafis kompozitsiya.',
                    'tone' => 'sky',
                    'size' => '4 element',
                ],
                [
                    'title' => 'Ofis kutish zonasi paneli',
                    'type' => 'Corporate decor',
                    'text' => 'Brend ranglariga moslashtirilgan, zamonaviy ofis uchun yirik suzani paneli.',
                    'tone' => 'ink',
                    'size' => '220 x 150 sm',
                ],
                [
                    'title' => 'Navro\'z ko\'rgazma ishi',
                    'type' => 'Ko\'rgazma namunasi',
                    'text' => 'Hunarmandchilik ko\'rgazmasida namoyish etilgan qo\'lda tikilgan markaziy kompozitsiya.',
                    'tone' => 'teal',
                    'size' => '210 x 140 sm',
                ],
            ];

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

            $steps = [
                ['number' => '01', 'title' => 'Mahsulotni tanlang', 'text' => 'Sizga yoqqan suzani yoki tekstil mahsulotini katalogdan tanlaysiz.'],
                ['number' => '02', 'title' => 'Buyurtma qoldiring', 'text' => 'Telefon, Telegram yoki sayt formasi orqali bog\'lanib buyurtmani tasdiqlaysiz.'],
                ['number' => '03', 'title' => 'Tayyorlash va qadoqlash', 'text' => 'Mahsulot tekshiriladi, ehtiyotkor qadoqlanadi va jo\'natishga tayyorlanadi.'],
                ['number' => '04', 'title' => 'Yetkazib berish', 'text' => 'Buyurtmangiz O\'zbekiston bo\'ylab ishonchli yetkazib berish xizmati bilan yuboriladi.'],
            ];

            $testimonials = [
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
                    <a href="{{ url('/admin/login') }}" class="topbar-admin-link">
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
                    <p class="eyebrow">Hunarmand ustaxonasidan</p>
                    <h1>Qo'lda yasalgan noyob buyumlar</h1>
                    <p class="hero-text">
                        Suzani Shop interyer uchun nafis, sokin va qadrli buyumlar yaratadi. Har bir mahsulotda
                        qo'l mehnati, iliq ranglar va sifatli materiallar orqali uyga hissiyot olib kiradigan ruh bor.
                    </p>

                    <div class="hero-actions">
                        <a href="#catalog" class="button button-primary">Kolleksiyani ko'rish</a>
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
                            <div class="hero-visual-label">
                                <span>Asosiy kolleksiya</span>
                                <strong>Anor Suzani</strong>
                            </div>
                            <div class="hero-visual-caption">
                                Katta format, mayin ranglar va qo'lda ishlangan nafis naqshlar.
                            </div>
                        </div>

                        <div class="hero-visual-stack">
                            <div class="hero-visual-detail hero-visual-detail-top">
                                <span>Detail</span>
                                <strong>Kashta teksturasi</strong>
                            </div>

                            <div class="hero-visual-detail hero-visual-detail-bottom">
                                <span>Material</span>
                                <strong>Tabiiy mato va ipak ip</strong>
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
                            <article class="portfolio-card portfolio-card-{{ $item['tone'] }}">
                                <div class="portfolio-visual">
                                    <span>{{ $item['type'] }}</span>
                                    <strong>{{ $item['size'] }}</strong>
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
                                                    <span class="product-gallery-visual-pattern"></span>
                                                </span>
                                                <span class="product-gallery-visual-copy">
                                                    <strong data-gallery-active-label>{{ $product['images'][0] }}</strong>
                                                    <span class="product-gallery-visual-subtitle">{{ $product['title'] }}</span>
                                                </span>
                                            </button>
                                            <button type="button" class="product-gallery-nav" data-gallery-next aria-label="Keyingi rasm">&#8250;</button>
                                        </div>
                                        <div class="product-gallery-meta">
                                            <span class="product-gallery-hint">Kattalashtirib ko'rish</span>
                                            <div class="product-gallery-counter" data-gallery-counter>1 / {{ min(count($product['images']), 3) }}</div>
                                        </div>
                                    </div>
                                    <div class="product-gallery-data" hidden>
                                        @foreach (array_slice($product['images'], 0, 3) as $image)
                                            <button
                                                type="button"
                                                class="product-gallery-item{{ $loop->first ? ' is-active' : '' }}"
                                                data-gallery-item
                                                data-gallery-label="{{ $image }}"
                                                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                            >
                                                {{ $image }}
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
                                                    <span class="product-gallery-visual-pattern"></span>
                                                </span>
                                                <span class="product-gallery-visual-copy">
                                                    <strong data-gallery-active-label>{{ $product['images'][0] }}</strong>
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
                                        @foreach ($product['images'] as $image)
                                            <button
                                                type="button"
                                                class="product-gallery-item{{ $loop->first ? ' is-active' : '' }}"
                                                data-gallery-item
                                                data-gallery-label="{{ $image }}"
                                                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                                            >
                                                {{ $image }}
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
                                    <input type="tel" name="phone" placeholder="+998 90 123 45 67" required>
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

            <section class="section">
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
                            <a href="https://t.me/suzanishop" target="_blank" rel="noreferrer" class="button button-secondary">
                                Telegramda yozing
                            </a>
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
                        <p class="section-label">Aloqa</p>
                        <h2 class="section-title">Buyurtma yoki hamkorlik uchun biz bilan bog'laning</h2>
                        <p class="contact-copy">
                            Instagram, Telegram yoki telefon orqali murojaat qiling. Sizga mahsulot tanlash, rang moslashtirish
                            va buyurtmani rasmiylashtirishda yordam beramiz.
                        </p>

                        <div class="contact-methods">
                            <article class="contact-method-card">
                                <span>Telefon</span>
                                <a href="tel:+998901234567">+998 90 123 45 67</a>
                            </article>
                            <article class="contact-method-card">
                                <span>Telegram</span>
                                <a href="https://t.me/suzanishop" target="_blank" rel="noreferrer">@suzanishop</a>
                            </article>
                            <article class="contact-method-card">
                                <span>Instagram</span>
                                <a href="https://instagram.com/suzanishop" target="_blank" rel="noreferrer">@suzanishop</a>
                            </article>
                        </div>

                        <div class="contact-card contact-address-card">
                            <div>
                                <span>Manzil</span>
                                <p>Toshkent shahri, hunarmandlar ko'chasi</p>
                            </div>
                            <div>
                                <span>Ish vaqti</span>
                                <p>Dushanba - Shanba, 09:00 - 19:00</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-layout">
                        <div class="contact-card contact-map-card">
                            <div class="contact-card-head">
                                <div>
                                    <span>Xarita</span>
                                    <p>Ustaxona joylashuvi</p>
                                </div>
                            </div>
                            <div class="contact-map-frame">
                                <iframe
                                    title="Suzani Shop location"
                                    src="https://www.openstreetmap.org/export/embed.html?bbox=69.2160%2C41.2850%2C69.2950%2C41.3350&amp;layer=mapnik"
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                ></iframe>
                            </div>
                        </div>

                        <form class="contact-card contact-form-card" data-contact-form>
                            <div class="contact-card-head">
                                <div>
                                    <span>Forma</span>
                                    <p>Tezkor so'rov yuboring</p>
                                </div>
                            </div>

                            <div class="contact-form-grid">
                                <label class="contact-field">
                                    <span>Ismingiz</span>
                                    <input type="text" name="name" placeholder="Ismingizni kiriting">
                                </label>
                                <label class="contact-field">
                                    <span>Telefon</span>
                                    <input type="tel" name="phone" placeholder="+998 90 123 45 67">
                                </label>
                                <label class="contact-field contact-field-full">
                                    <span>Instagram yoki Telegram</span>
                                    <input type="text" name="social" placeholder="@username yoki profil havolasi">
                                </label>
                                <label class="contact-field contact-field-full">
                                    <span>Xabar</span>
                                    <textarea name="message" rows="5" placeholder="Qanday mahsulot yoki xizmat kerakligini yozing"></textarea>
                                </label>
                            </div>

                            <button type="submit" class="button button-primary">So'rov yuborish</button>
                            <p class="contact-form-note is-hidden" data-contact-note>
                                So'rovingiz qabul qilindi. Tez orada siz bilan bog'lanamiz.
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
                    <span data-gallery-modal-title>Mahsulot galereyasi</span>
                    <strong data-gallery-modal-label>Rasm</strong>
                    <p data-gallery-modal-count>1 / 1</p>
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
                        <a href="tel:+998901234567">+998 90 123 45 67</a>
                        <a href="https://t.me/suzanishop" target="_blank" rel="noreferrer">@suzanishop</a>
                        <a href="https://instagram.com/suzanishop" target="_blank" rel="noreferrer">@suzanishop</a>
                        <span>Toshkent shahri, hunarmandlar ko'chasi</span>
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
    </body>
</html>
