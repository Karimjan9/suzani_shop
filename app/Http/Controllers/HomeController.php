<?php

namespace App\Http\Controllers;

use App\Models\ContentBlock;
use App\Models\Feedback;
use App\Models\PortfolioItem;
use App\Models\Product;
use App\Support\UploadedMedia;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(): View
    {
        $config = config('homepage');

        $hero = $this->buildHero(Arr::get($config, 'hero', []));
        $about = $this->buildAbout(Arr::get($config, 'about', []));
        $catalog = $this->buildCatalog(Arr::get($config, 'catalog', []));
        $portfolio = $this->buildPortfolio(Arr::get($config, 'portfolio', []));
        $testimonials = $this->buildTestimonials(Arr::get($config, 'testimonials', []));
        $contact = $this->buildContact(Arr::get($config, 'contact', []));
        $footer = $this->buildFooter(Arr::get($config, 'footer', []), $contact);
        $cta = Arr::get($config, 'cta', []);
        $cart = [
            'steps' => Arr::get($config, 'steps', []),
            'order_action' => route('orders.store', [], false),
        ];

        return view('index', compact(
            'hero',
            'about',
            'catalog',
            'portfolio',
            'testimonials',
            'contact',
            'footer',
            'cta',
            'cart',
        ));
    }

    private function buildHero(array $config): array
    {
        $heroBanner = ContentBlock::query()
            ->where('type', ContentBlock::TYPE_BANNER)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->first();

        $defaultMeta = Arr::get($config, 'meta', []);
        $heroMeta = array_merge($defaultMeta, Arr::wrap($heroBanner?->meta));

        return [
            'eyebrow' => filled($heroBanner?->translated('subtitle')) ? $heroBanner->translated('subtitle') : Arr::get($config, 'eyebrow', ''),
            'title' => filled($heroBanner?->translated('title')) ? $heroBanner->translated('title') : Arr::get($config, 'title', ''),
            'text' => filled($heroBanner?->translated('content')) ? $heroBanner->translated('content') : Arr::get($config, 'text', ''),
            'primary_link' => filled($heroBanner?->link) ? $heroBanner->link : Arr::get($config, 'primary_link', '#catalog'),
            'primary_label' => filled($heroBanner?->link) ? __('home.labels.view') : Arr::get($config, 'primary_label', "Kolleksiyani ko'rish"),
            'trust_note' => Arr::get($config, 'trust_note', ''),
            'stats' => Arr::get($config, 'stats', []),
            'promises' => Arr::get($config, 'promises', []),
            'main_image' => $this->resolveUploadedOrHomeImage($heroBanner?->image, Arr::get($config, 'main_image')),
            'main_badge' => $heroBanner?->translatedMeta('hero_main_badge', fallback: Arr::get($heroMeta, 'hero_main_badge', '')) ?? Arr::get($heroMeta, 'hero_main_badge', ''),
            'main_title' => $heroBanner?->translatedMeta('hero_main_title', fallback: Arr::get($heroMeta, 'hero_main_title', '')) ?? Arr::get($heroMeta, 'hero_main_title', ''),
            'main_caption' => $heroBanner?->translatedMeta('hero_main_caption', fallback: Arr::get($heroMeta, 'hero_main_caption', '')) ?? Arr::get($heroMeta, 'hero_main_caption', ''),
            'detail_image' => $this->resolveUploadedOrHomeImage(
                Arr::get($heroMeta, 'hero_detail_image'),
                Arr::get($defaultMeta, 'hero_detail_image')
            ),
            'detail_badge' => $heroBanner?->translatedMeta('hero_detail_badge', fallback: Arr::get($heroMeta, 'hero_detail_badge', '')) ?? Arr::get($heroMeta, 'hero_detail_badge', ''),
            'detail_title' => $heroBanner?->translatedMeta('hero_detail_title', fallback: Arr::get($heroMeta, 'hero_detail_title', '')) ?? Arr::get($heroMeta, 'hero_detail_title', ''),
            'material_image' => $this->resolveUploadedOrHomeImage(
                Arr::get($heroMeta, 'hero_material_image'),
                Arr::get($defaultMeta, 'hero_material_image')
            ),
            'material_badge' => $heroBanner?->translatedMeta('hero_material_badge', fallback: Arr::get($heroMeta, 'hero_material_badge', '')) ?? Arr::get($heroMeta, 'hero_material_badge', ''),
            'material_title' => $heroBanner?->translatedMeta('hero_material_title', fallback: Arr::get($heroMeta, 'hero_material_title', '')) ?? Arr::get($heroMeta, 'hero_material_title', ''),
        ];
    }

    private function buildAbout(array $config): array
    {
        return [
            'label' => Arr::get($config, 'label', ''),
            'title' => Arr::get($config, 'title', ''),
            'lead' => Arr::get($config, 'lead', ''),
            'stats' => Arr::get($config, 'stats', []),
            'highlights' => Arr::get($config, 'highlights', []),
            'gallery' => collect(Arr::get($config, 'gallery', []))
                ->map(fn (array $image): array => [
                    'src' => $this->homeImage(Arr::get($image, 'src')),
                    'label' => Arr::get($image, 'label', ''),
                    'alt' => Arr::get($image, 'alt', ''),
                ])
                ->all(),
            'gallery_label' => Arr::get($config, 'gallery_label', ''),
            'gallery_title' => Arr::get($config, 'gallery_title', ''),
            'gallery_caption' => Arr::get($config, 'gallery_caption', ''),
            'gallery_description' => Arr::get($config, 'gallery_description', ''),
            'note_label' => Arr::get($config, 'note_label', ''),
            'note_title' => Arr::get($config, 'note_title', ''),
            'note_text' => Arr::get($config, 'note_text', ''),
            'note_points' => Arr::get($config, 'note_points', []),
            'process_label' => Arr::get($config, 'process_label', ''),
            'process_title' => Arr::get($config, 'process_title', ''),
            'process' => Arr::get($config, 'process', []),
            'why_label' => Arr::get($config, 'why_label', ''),
            'why_title' => Arr::get($config, 'why_title', ''),
            'why_choose' => Arr::get($config, 'why_choose', []),
        ];
    }

    private function buildCatalog(array $config): array
    {
        $defaultProducts = collect(Arr::get($config, 'products', []))
            ->values()
            ->map(fn (array $product, int $index): array => $this->mapFallbackProduct($product, $index))
            ->all();

        $products = $defaultProducts;
        $dbProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderByDesc('updated_at')
            ->get();

        if ($dbProducts->isNotEmpty()) {
            $galleryLabels = Arr::get($config, 'gallery_labels', []);
            $galleryFallbackPool = collect(Arr::get($config, 'gallery_fallback_pool', []))
                ->map(fn (string $path): string => $this->homeImage($path))
                ->values()
                ->all();
            $products = $dbProducts
                ->values()
                ->map(fn (Product $product, int $index): array => $this->mapDatabaseProduct(
                    $product,
                    $index,
                    $galleryLabels,
                    $galleryFallbackPool,
                ))
                ->all();
        }

        $featuredProducts = array_values(array_filter($products, static fn (array $product): bool => (bool) ($product['is_featured'] ?? false)));
        $topProducts = array_slice($featuredProducts !== [] ? $featuredProducts : $products, 0, 3);
        $groupedCategories = collect($products)->groupBy('category');

        return [
            'products_label' => Arr::get($config, 'products_label', ''),
            'products_title' => Arr::get($config, 'products_title', ''),
            'products_action_label' => Arr::get($config, 'products_action_label', ''),
            'top_products' => $topProducts,
            'products' => $products,
            'collection_label' => Arr::get($config, 'collection_label', ''),
            'collection_title' => Arr::get($config, 'collection_title', ''),
            'collection_copy' => Arr::get($config, 'collection_copy', ''),
            'collection_active_label' => Arr::get($config, 'collection_active_label', 'Barchasi'),
            'collection_active_copy' => Arr::get($config, 'collection_active_copy', ''),
            'search_note' => Arr::get($config, 'search_note', ''),
            'filter_note' => Arr::get($config, 'filter_note', ''),
            'sort_note' => Arr::get($config, 'sort_note', ''),
            'empty_state' => Arr::get($config, 'empty_state', ''),
            'filters' => array_merge(
                [['value' => 'all', 'label' => __('home.labels.all')]],
                $groupedCategories
                    ->map(static fn (Collection $items): array => [
                        'value' => $items->first()['category'],
                        'label' => $items->first()['category_label'],
                    ])
                    ->values()
                    ->all(),
            ),
            'categories' => $groupedCategories
                ->values()
                ->map(function (Collection $items, int $index): array {
                    $tones = ['rose', 'ink', 'teal', 'gold', 'clay', 'sky'];
                    $first = $items->first();

                    return [
                        'name' => $first['category_label'],
                        'count' => __('home.labels.product_count', ['count' => $items->count()]),
                        'tone' => $tones[$index % count($tones)],
                        'filter' => $first['category'],
                        'copy' => $first['category_description'],
                        'image' => Arr::get($first, 'primary_image'),
                    ];
                })
                ->all(),
        ];
    }

    private function buildPortfolio(array $config): array
    {
        $portfolioItems = PortfolioItem::query()
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->limit(6)
            ->get()
            ->values()
            ->map(function (PortfolioItem $item, int $index): array {
                $tones = ['clay', 'rose', 'gold', 'sky', 'ink', 'teal'];

                return [
                    'title' => $item->translated('title'),
                    'type' => $item->translated('project_type', fallback: __('home.labels.portfolio_project')),
                    'text' => $item->translated('excerpt', fallback: ($item->translated('description') ?: __('home.labels.portfolio_description'))),
                    'tone' => $tones[$index % count($tones)],
                    'highlight' => $item->translated('highlight_value', fallback: ($item->is_featured ? 'Featured loyiha' : 'Portfolio karta')),
                    'image_src' => UploadedMedia::url($item->cover_image),
                ];
            })
            ->all();

        if ($portfolioItems === []) {
            $portfolioItems = collect(Arr::get($config, 'items', []))
                ->map(fn (array $item): array => [
                    'title' => Arr::get($item, 'title', ''),
                    'type' => Arr::get($item, 'type', ''),
                    'text' => Arr::get($item, 'text', ''),
                    'tone' => Arr::get($item, 'tone', 'clay'),
                    'highlight' => Arr::get($item, 'highlight', ''),
                    'image_src' => $this->homeImage(Arr::get($item, 'image')),
                ])
                ->all();
        }

        return [
            'label' => Arr::get($config, 'label', ''),
            'title' => Arr::get($config, 'title', ''),
            'action_label' => Arr::get($config, 'action_label', ''),
            'intro' => Arr::get($config, 'intro', ''),
            'items' => $portfolioItems,
        ];
    }

    private function buildTestimonials(array $config): array
    {
        $items = Feedback::query()
            ->where('is_approved', true)
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get()
            ->map(fn (Feedback $item): array => [
                'name' => $item->translated('customer_name'),
                'role' => $item->translated('city', fallback: __('home.labels.client')),
                'quote' => $item->translated('content'),
                'rating' => max(1, min(5, (int) ($item->rating ?: 5))),
                'headline' => $this->buildFeedbackHeadline($item->translated('content')),
                'badge' => $item->is_featured ? __('home.labels.top_review') : __('home.labels.verified_purchase'),
            ])
            ->all();

        if ($items === []) {
            $items = Arr::get($config, 'items', []);
        }

        return [
            'label' => Arr::get($config, 'label', ''),
            'title' => Arr::get($config, 'title', ''),
            'items' => $items,
        ];
    }

    private function buildFeedbackHeadline(?string $content): string
    {
        $text = trim((string) $content);
        $firstSentence = trim(Str::before($text, '.'));

        if ($firstSentence === '') {
            $firstSentence = $text;
        }

        if ($firstSentence === '') {
            return __('home.labels.client_review');
        }

        return Str::limit($firstSentence, 44, '...');
    }

    private function buildContact(array $config): array
    {
        $contactBlock = ContentBlock::query()
            ->where('type', ContentBlock::TYPE_CONTACT)
            ->where('key', 'contact-main')
            ->where('is_active', true)
            ->first();

        $defaultMeta = Arr::get($config, 'meta', []);
        $meta = array_merge($defaultMeta, Arr::wrap($contactBlock?->meta));
        $phoneValue = Arr::get($meta, 'phone_value', Arr::get($meta, 'phone'));
        $telegramValue = Arr::get($meta, 'telegram_value', Arr::get($meta, 'telegram'));
        $instagramValue = Arr::get($meta, 'instagram_value', Arr::get($meta, 'instagram'));
        $phoneHref = filled($phoneValue) ? 'tel:'.preg_replace('/[^+\d]/', '', (string) $phoneValue) : null;
        $telegramUrl = $this->normalizeExternalLink($telegramValue, Arr::get($meta, 'telegram_url'), 'telegram');
        $instagramUrl = $this->normalizeExternalLink($instagramValue, Arr::get($meta, 'instagram_url'), 'instagram');
        $mapLatitude = (float) Arr::get($meta, 'map_latitude', 41.311081);
        $mapLongitude = (float) Arr::get($meta, 'map_longitude', 69.240562);
        $mapZoom = max(8, min(18, (int) Arr::get($meta, 'map_zoom', 13)));
        $mapCoordinates = number_format($mapLatitude, 5, '.', '').', '.number_format($mapLongitude, 5, '.', '');
        $mapQuery = number_format($mapLatitude, 6, '.', '').','.number_format($mapLongitude, 6, '.', '');
        $mapEmbedUrl = 'https://www.google.com/maps?q='.rawurlencode($mapQuery).'&z='.$mapZoom.'&output=embed';
        $mapLink = 'https://www.google.com/maps/search/?api=1&query='.rawurlencode($mapQuery);

        return [
            'section_label' => filled($contactBlock?->translated('subtitle')) ? $contactBlock->translated('subtitle') : Arr::get($config, 'section_label', ''),
            'section_title' => filled($contactBlock?->translated('title')) ? $contactBlock->translated('title') : Arr::get($config, 'section_title', ''),
            'section_copy' => filled($contactBlock?->translated('content')) ? $contactBlock->translated('content') : Arr::get($config, 'section_copy', ''),
            'phone' => [
                'label' => $contactBlock?->translatedMeta('phone_label', fallback: Arr::get($meta, 'phone_label', __('home.contact.phone'))) ?? Arr::get($meta, 'phone_label', __('home.contact.phone')),
                'value' => $phoneValue,
                'href' => $phoneHref,
            ],
            'telegram' => [
                'label' => $contactBlock?->translatedMeta('telegram_label', fallback: Arr::get($meta, 'telegram_label', __('home.contact.telegram'))) ?? Arr::get($meta, 'telegram_label', __('home.contact.telegram')),
                'value' => $telegramValue,
                'href' => $telegramUrl,
            ],
            'instagram' => [
                'label' => $contactBlock?->translatedMeta('instagram_label', fallback: Arr::get($meta, 'instagram_label', __('home.contact.instagram'))) ?? Arr::get($meta, 'instagram_label', __('home.contact.instagram')),
                'value' => $instagramValue,
                'href' => $instagramUrl,
            ],
            'address' => [
                'label' => $contactBlock?->translatedMeta('address_label', fallback: Arr::get($meta, 'address_label', __('home.contact.address'))) ?? Arr::get($meta, 'address_label', __('home.contact.address')),
                'value' => $contactBlock?->translatedMeta('address_value', fallback: Arr::get($meta, 'address_value')) ?? Arr::get($meta, 'address_value'),
            ],
            'hours' => [
                'label' => $contactBlock?->translatedMeta('hours_label', fallback: Arr::get($meta, 'hours_label', __('home.contact.hours'))) ?? Arr::get($meta, 'hours_label', __('home.contact.hours')),
                'value' => $contactBlock?->translatedMeta('hours_value', fallback: Arr::get($meta, 'hours_value')) ?? Arr::get($meta, 'hours_value'),
            ],
            'map' => [
                'label' => $contactBlock?->translatedMeta('map_label', fallback: Arr::get($meta, 'map_label', __('home.contact.map'))) ?? Arr::get($meta, 'map_label', __('home.contact.map')),
                'title' => $contactBlock?->translatedMeta('map_title', fallback: Arr::get($meta, 'map_title', __('home.contact.map_title'))) ?? Arr::get($meta, 'map_title', __('home.contact.map_title')),
                'embed_url' => $mapEmbedUrl,
                'link' => $mapLink,
                'coordinates' => $mapCoordinates,
                'hint' => Arr::get($config, 'map_hint', ''),
            ],
            'form' => [
                'label' => $contactBlock?->translatedMeta('form_label', fallback: Arr::get($meta, 'form_label', __('home.contact.form'))) ?? Arr::get($meta, 'form_label', __('home.contact.form')),
                'title' => $contactBlock?->translatedMeta('form_title', fallback: Arr::get($meta, 'form_title', '')) ?? Arr::get($meta, 'form_title', ''),
                'name_label' => $contactBlock?->translatedMeta('form_name_label', fallback: Arr::get($meta, 'form_name_label', __('home.contact.name'))) ?? Arr::get($meta, 'form_name_label', __('home.contact.name')),
                'name_placeholder' => $contactBlock?->translatedMeta('form_name_placeholder', fallback: Arr::get($meta, 'form_name_placeholder', '')) ?? Arr::get($meta, 'form_name_placeholder', ''),
                'phone_label' => $contactBlock?->translatedMeta('form_phone_label', fallback: Arr::get($meta, 'form_phone_label', __('home.contact.phone'))) ?? Arr::get($meta, 'form_phone_label', __('home.contact.phone')),
                'phone_placeholder' => $contactBlock?->translatedMeta('form_phone_placeholder', fallback: Arr::get($meta, 'form_phone_placeholder', __('home.contact.phone_placeholder'))) ?? Arr::get($meta, 'form_phone_placeholder', __('home.contact.phone_placeholder')),
                'social_label' => $contactBlock?->translatedMeta('form_social_label', fallback: Arr::get($meta, 'form_social_label', __('home.contact.social'))) ?? Arr::get($meta, 'form_social_label', __('home.contact.social')),
                'social_placeholder' => $contactBlock?->translatedMeta('form_social_placeholder', fallback: Arr::get($meta, 'form_social_placeholder', '')) ?? Arr::get($meta, 'form_social_placeholder', ''),
                'message_label' => $contactBlock?->translatedMeta('form_message_label', fallback: Arr::get($meta, 'form_message_label', __('home.contact.message'))) ?? Arr::get($meta, 'form_message_label', __('home.contact.message')),
                'message_placeholder' => $contactBlock?->translatedMeta('form_message_placeholder', fallback: Arr::get($meta, 'form_message_placeholder', '')) ?? Arr::get($meta, 'form_message_placeholder', ''),
                'success_note' => $contactBlock?->translatedMeta('form_success_note', fallback: Arr::get($meta, 'form_success_note', '')) ?? Arr::get($meta, 'form_success_note', ''),
            ],
        ];
    }

    private function buildFooter(array $config, array $contact): array
    {
        $socialLinks = collect([
            [
                'href' => Arr::get($contact, 'phone.href'),
                'label' => __('home.footer.phone'),
                'icon' => 'phone',
                'external' => false,
            ],
            [
                'href' => Arr::get($contact, 'telegram.href'),
                'label' => __('home.footer.telegram'),
                'icon' => 'telegram',
                'external' => true,
            ],
            [
                'href' => Arr::get($contact, 'instagram.href'),
                'label' => __('home.footer.instagram'),
                'icon' => 'instagram',
                'external' => true,
            ],
            [
                'href' => Arr::get($contact, 'map.link'),
                'label' => __('home.footer.map'),
                'icon' => 'location',
                'external' => true,
            ],
        ])->filter(fn (array $item): bool => filled($item['href']))->values()->all();

        $contactRows = collect([
            [
                'label' => Arr::get($contact, 'phone.label'),
                'value' => Arr::get($contact, 'phone.value'),
                'href' => Arr::get($contact, 'phone.href'),
                'icon' => 'phone',
                'external' => false,
            ],
            [
                'label' => Arr::get($contact, 'telegram.label'),
                'value' => Arr::get($contact, 'telegram.value'),
                'href' => Arr::get($contact, 'telegram.href'),
                'icon' => 'telegram',
                'external' => true,
            ],
            [
                'label' => Arr::get($contact, 'instagram.label'),
                'value' => Arr::get($contact, 'instagram.value'),
                'href' => Arr::get($contact, 'instagram.href'),
                'icon' => 'instagram',
                'external' => true,
            ],
            [
                'label' => Arr::get($contact, 'hours.label'),
                'value' => Arr::get($contact, 'hours.value'),
                'href' => null,
                'icon' => 'clock',
                'external' => false,
            ],
            [
                'label' => Arr::get($contact, 'address.label'),
                'value' => Arr::get($contact, 'address.value'),
                'href' => Arr::get($contact, 'map.link'),
                'icon' => 'location',
                'external' => true,
            ],
        ])->filter(fn (array $item): bool => filled($item['value']))->values()->all();

        return [
            'banner' => [
                'kicker' => Arr::get($config, 'banner_kicker', ''),
                'title' => Arr::get($config, 'banner_title', ''),
                'copy' => Arr::get($config, 'banner_copy', ''),
                'points' => Arr::get($config, 'banner_points', []),
                'stats' => Arr::get($config, 'banner_stats', []),
                'primary_action' => [
                    'href' => '#cart',
                    'label' => __('home.footer.order'),
                    'icon' => 'cart',
                ],
                'secondary_action' => filled(Arr::get($contact, 'telegram.href'))
                    ? [
                        'href' => Arr::get($contact, 'telegram.href'),
                        'label' => __('home.footer.telegram_write'),
                        'icon' => 'telegram',
                        'external' => true,
                    ]
                    : [
                        'href' => Arr::get($contact, 'phone.href'),
                        'label' => __('home.footer.call'),
                        'icon' => 'phone',
                        'external' => false,
                    ],
                'ghost_action' => [
                    'href' => '#catalog',
                    'label' => __('home.footer.catalog'),
                    'icon' => 'menu',
                ],
            ],
            'brand' => [
                'kicker' => Arr::get($config, 'brand_kicker', ''),
                'title' => 'Suzani Shop',
                'subtitle' => Arr::get($config, 'brand_subtitle', ''),
                'copy' => Arr::get($config, 'brand_copy', ''),
                'pills' => Arr::get($config, 'brand_pills', []),
                'social_links' => $socialLinks,
            ],
            'menu_groups' => Arr::get($config, 'menu_groups', []),
            'contact_rows' => $contactRows,
            'bottom' => [
                'copy' => Arr::get($config, 'bottom_copy', ''),
                'pills' => Arr::get($config, 'bottom_pills', []),
            ],
        ];
    }

    private function mapFallbackProduct(array $product, int $index): array
    {
        $gallery = collect(Arr::get($product, 'gallery', []))
            ->map(function (array $image, int $imageIndex): array {
                $label = Arr::get($image, 'label', 'Rasm '.($imageIndex + 1));

                return [
                    'src' => $this->homeImage(Arr::get($image, 'src')),
                    'label' => $label,
                    'alt' => Arr::get($image, 'alt', $label),
                ];
            })
            ->values()
            ->all();

        return $this->finalizeProductPayload(array_merge($product, [
            'id' => Arr::get($product, 'id', Str::slug(Arr::get($product, 'title', 'mahsulot'))),
            'formatted_price' => number_format((float) Arr::get($product, 'price', 0), 0, '.', ' ')." so'm",
            'gallery' => $gallery,
            'images' => array_map(static fn (array $image): string => $image['label'], $gallery),
            'is_featured' => (bool) Arr::get($product, 'is_featured', false),
            'new_rank' => Arr::get($product, 'new_rank', $index + 1),
            'popularity' => Arr::get($product, 'popularity', 0),
        ]));
    }

    private function mapDatabaseProduct(Product $product, int $index, array $galleryLabels, array $galleryFallbackPool): array
    {
        $tones = ['rose', 'ink', 'teal', 'gold', 'clay', 'sky'];
        $categoryName = $product->category?->translated('name') ?: __('home.labels.uncategorized');
        $categoryFilter = $product->category?->slug ?: Str::slug($categoryName);
        $gallery = $this->buildDatabaseGallery(
            $product->translated('name'),
            $product->main_image,
            Arr::wrap($product->gallery),
            $index,
            $galleryLabels,
            $galleryFallbackPool,
        );

        $availability = match ($product->availability_mode) {
            Product::AVAILABILITY_MADE_TO_ORDER => __('home.labels.made_to_order_available'),
            default => __('home.labels.available'),
        };

        $tag = match (true) {
            (bool) $product->is_featured => __('home.labels.recommended'),
            filled($product->old_price) && (int) $product->old_price > (int) $product->price => __('home.labels.discount'),
            $product->availability_mode === Product::AVAILABILITY_MADE_TO_ORDER => __('home.labels.made_to_order'),
            $product->stock_status === Product::STOCK_LOW => __('home.labels.low_stock'),
            $product->stock_status === Product::STOCK_OUT => __('home.labels.sold_out'),
            default => __('home.labels.catalog'),
        };

        return $this->finalizeProductPayload([
            'id' => $product->slug ?: Str::slug($product->name),
            'title' => $product->translated('name'),
            'price' => (int) $product->price,
            'formatted_price' => number_format((float) $product->price, 0, '.', ' ')." so'm",
            'tag' => $tag,
            'short_description' => $product->translated('short_description', fallback: __('home.labels.description_from_admin')),
            'full_description' => $product->translated('full_description', fallback: ($product->translated('short_description') ?: __('home.labels.description_later'))),
            'product_story' => $product->translated('product_story', fallback: __('home.labels.story_later', ['name' => $product->translated('name')])),
            'material' => $product->translated('material', fallback: __('home.labels.material_from_admin')),
            'size' => $product->translated('size', fallback: __('home.labels.agreed')),
            'color' => $product->translated('color', fallback: __('home.labels.custom_color')),
            'availability' => $availability,
            'lead_time' => $product->translated('production_time', fallback: __('home.labels.agreed')),
            'category' => $categoryFilter,
            'category_label' => $categoryName,
            'category_description' => $product->category?->translated('description') ?: __('home.labels.category_managed', ['category' => $categoryName]),
            'popularity' => max((int) $product->view_count, 0),
            'new_rank' => $product->updated_at?->getTimestamp() ?? (time() - $index),
            'tone' => $tones[$index % count($tones)],
            'gallery' => $gallery,
            'images' => array_map(static fn (array $image): string => $image['label'], $gallery),
            'is_featured' => (bool) $product->is_featured,
        ]);
    }

    private function finalizeProductPayload(array $product): array
    {
        $primaryImage = Arr::get($product, 'gallery.0.src');
        $primaryLabel = Arr::get($product, 'images.0', Arr::get($product, 'title', 'Mahsulot'));
        $searchText = implode(' ', array_filter([
            Arr::get($product, 'title'),
            Arr::get($product, 'short_description'),
            Arr::get($product, 'full_description'),
            Arr::get($product, 'product_story'),
            Arr::get($product, 'material'),
            Arr::get($product, 'size'),
            Arr::get($product, 'color'),
            Arr::get($product, 'category_label'),
        ]));

        $cartPayload = [
            'id' => Arr::get($product, 'id'),
            'title' => Arr::get($product, 'title'),
            'price' => Arr::get($product, 'price'),
            'formatted_price' => Arr::get($product, 'formatted_price'),
            'category_label' => Arr::get($product, 'category_label'),
            'short_description' => Arr::get($product, 'short_description'),
            'full_description' => Arr::get($product, 'full_description'),
            'product_story' => Arr::get($product, 'product_story'),
            'material' => Arr::get($product, 'material'),
            'size' => Arr::get($product, 'size'),
            'color' => Arr::get($product, 'color'),
            'availability' => Arr::get($product, 'availability'),
            'lead_time' => Arr::get($product, 'lead_time'),
            'image_src' => $primaryImage,
            'image_label' => $primaryLabel,
            'images' => Arr::get($product, 'images', []),
        ];

        $detailPayload = [
            'title' => Arr::get($product, 'title'),
            'category' => Arr::get($product, 'category_label'),
            'price' => Arr::get($product, 'formatted_price'),
            'description' => Arr::get($product, 'full_description') ?: Arr::get($product, 'short_description'),
            'story' => Arr::get($product, 'product_story', ''),
            'material' => Arr::get($product, 'material'),
            'size' => Arr::get($product, 'size'),
            'color' => Arr::get($product, 'color'),
            'availability' => Arr::get($product, 'availability'),
            'image' => $primaryImage,
            'tone' => Arr::get($product, 'tone', 'rose'),
        ];

        $product['primary_image'] = $primaryImage;
        $product['primary_alt'] = Arr::get($product, 'gallery.0.alt', Arr::get($product, 'title'));
        $product['gallery_count'] = count(Arr::get($product, 'gallery', []));
        $product['search_text'] = trim($searchText);
        $product['cart_payload_encoded'] = base64_encode(json_encode($cartPayload, JSON_UNESCAPED_UNICODE));
        $product['detail_payload_encoded'] = base64_encode(json_encode($detailPayload, JSON_UNESCAPED_UNICODE));

        return $product;
    }

    private function buildDatabaseGallery(
        string $title,
        ?string $mainImage,
        array $galleryPaths,
        int $index,
        array $labels,
        array $fallbackPool,
    ): array {
        $paths = collect([$mainImage, ...$galleryPaths])
            ->filter(fn (mixed $path): bool => filled($path))
            ->unique()
            ->values();

        $gallery = $paths
            ->map(function (string $path, int $imageIndex) use ($title, $labels): ?array {
                $src = UploadedMedia::url($path);

                if (blank($src)) {
                    return null;
                }

                $label = $labels[$imageIndex] ?? __('home.labels.image', ['number' => $imageIndex + 1]);

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

        $fallbackSrc = $fallbackPool[$index % count($fallbackPool)] ?? $this->homeImage('items/photo_2026-03-18_16-31-05.jpg');

        return [[
            'src' => $fallbackSrc,
            'label' => $labels[0] ?? __('home.labels.main_view'),
            'alt' => $title.' - '.($labels[0] ?? __('home.labels.main_view')),
        ]];
    }

    private function normalizeExternalLink(?string $value, ?string $explicitUrl, string $platform): ?string
    {
        $explicitUrl = filled($explicitUrl) ? trim($explicitUrl) : null;

        if ($explicitUrl) {
            return $explicitUrl;
        }

        if (blank($value)) {
            return null;
        }

        $value = trim((string) $value);

        if (Str::startsWith($value, ['http://', 'https://'])) {
            return $value;
        }

        return match ($platform) {
            'telegram' => 'https://t.me/'.ltrim($value, '@'),
            'instagram' => 'https://instagram.com/'.ltrim($value, '@'),
            default => null,
        };
    }

    private function resolveUploadedOrHomeImage(?string $uploadedPath, ?string $fallbackHomePath = null): ?string
    {
        if (filled($uploadedPath)) {
            if (Str::startsWith($uploadedPath, ['http://', 'https://', '//', '/'])) {
                return $uploadedPath;
            }

            if (Str::startsWith($uploadedPath, ['hero/', 'items/', 'about/'])) {
                return $this->homeImage($uploadedPath);
            }

            return UploadedMedia::url($uploadedPath);
        }

        return $this->homeImage($fallbackHomePath);
    }

    private function homeImage(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        $path = ltrim((string) $path, '/');

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, 'images/')) {
            return '/'.$path;
        }

        return '/images/home/'.$path;
    }
}
