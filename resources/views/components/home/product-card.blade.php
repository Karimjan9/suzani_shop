@props([
    'product',
    'variant' => 'catalog',
    'imageLoading' => 'lazy',
])

@php
    $isCatalog = $variant === 'catalog';
    $galleryBadge = $isCatalog ? 'Galereya' : "Ko'rinish";
    $secondaryButtonLabel = $isCatalog ? 'Savatcha' : "Savatchaga o'tish";
@endphp

<article
    @if ($isCatalog)
        class="product-card catalog-card"
        data-product
        data-product-id="{{ $product['id'] }}"
        data-category="{{ $product['category'] }}"
        data-price="{{ $product['price'] }}"
        data-popularity="{{ $product['popularity'] }}"
        data-new-rank="{{ $product['new_rank'] }}"
        data-search="{{ $product['search_text'] }}"
    @else
        class="product-card"
    @endif
>
    <div
        class="{{ $isCatalog ? 'catalog-gallery ' : '' }}product-showcase-gallery"
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
            <span class="product-gallery-badge">{{ $galleryBadge }}</span>
            <div class="product-gallery-nav-wrap">
                <button type="button" class="product-gallery-nav" data-gallery-prev aria-label="Oldingi rasm">&#8249;</button>
                <button type="button" class="product-gallery-visual" data-gallery-open aria-label="Rasmni kattalashtirib ko'rish">
                    <span class="product-gallery-visual-art" aria-hidden="true">
                        <img
                            src="{{ $product['primary_image'] }}"
                            alt="{{ $product['primary_alt'] }}"
                            class="product-gallery-image"
                            data-gallery-active-image
                            loading="{{ $imageLoading }}"
                            @if ($imageLoading === 'eager') fetchpriority="high" @endif
                            decoding="async"
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
                <div class="product-gallery-counter" data-gallery-counter>1 / {{ $product['gallery_count'] }}</div>
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
                    data-gallery-alt="{{ $image['alt'] }}"
                    aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                >
                    {{ $image['label'] }}
                </button>
            @endforeach
        </div>
    </div>

    @if ($isCatalog)
        <div class="catalog-card-head">
            <span class="pill">{{ $product['tag'] }}</span>
            <span class="catalog-category">{{ $product['category_label'] }}</span>
        </div>
    @else
        <span class="pill">{{ $product['tag'] }}</span>
    @endif

    <h3>{{ $product['title'] }}</h3>
    <p>{{ $product['short_description'] }}</p>

    @if ($isCatalog)
        <ul class="product-specs">
            <li><span>Material</span><strong>{{ $product['material'] }}</strong></li>
            <li><span>O'lcham</span><strong>{{ $product['size'] }}</strong></li>
            <li><span>Rang</span><strong>{{ $product['color'] }}</strong></li>
            <li><span>Mavjudligi</span><strong>{{ $product['availability'] }}</strong></li>
            <li><span>Tayyorlash</span><strong>{{ $product['lead_time'] }}</strong></li>
        </ul>

        <button
            type="button"
            class="product-detail-trigger"
            data-product-detail-open
            data-product-detail-payload="{{ $product['detail_payload_encoded'] }}"
        >
            Batafsil ko'rish
        </button>
    @endif

    <div class="{{ $isCatalog ? 'catalog-card-foot' : 'product-foot' }}">
        <strong>{{ $product['formatted_price'] }}</strong>
        <div class="product-actions">
            <button
                type="button"
                class="button button-primary button-compact"
                data-add-to-cart="{{ $product['cart_payload_encoded'] }}"
            >
                Savatchaga qo'shish
            </button>
            <a href="#cart" class="button button-secondary button-compact">{{ $secondaryButtonLabel }}</a>
        </div>
    </div>
</article>
