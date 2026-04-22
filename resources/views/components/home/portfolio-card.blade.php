@props([
    'item',
])

@php
    $portfolioPayload = base64_encode(json_encode([
        'title' => $item['title'] ?? 'Portfolio namuna',
        'type' => $item['type'] ?? 'Portfolio loyiha',
        'highlight' => $item['highlight'] ?? ($item['title'] ?? 'To\'liq ko\'rinish'),
        'description' => $item['text'] ?? '',
        'image' => $item['image_src'] ?? '',
        'tone' => $item['tone'] ?? 'rose',
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
@endphp

<article class="portfolio-card portfolio-card-{{ $item['tone'] }}">
    <div class="portfolio-visual{{ filled($item['image_src'] ?? null) ? ' has-image' : '' }}">
        @if (filled($item['image_src'] ?? null))
            <img
                src="{{ $item['image_src'] }}"
                alt="{{ $item['title'] }}"
                class="portfolio-visual-image"
                loading="lazy"
                decoding="async"
            >
        @endif
        <div class="portfolio-visual-copy">
            <span>{{ $item['type'] }}</span>
            <strong>{{ $item['highlight'] }}</strong>
        </div>
    </div>
    <div class="portfolio-body">
        <h3>
            <button
                type="button"
                class="portfolio-title-button"
                data-portfolio-modal-open
                data-portfolio-modal-payload="{{ $portfolioPayload }}"
                aria-label="{{ $item['title'] }} modal oynada ochilsin"
            >
                <span>{{ $item['title'] }}</span>
                <span class="portfolio-title-button-meta">To'liq ko'rish</span>
            </button>
        </h3>
        <p>{{ $item['text'] }}</p>
    </div>
</article>
