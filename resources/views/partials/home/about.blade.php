<section id="about" class="section">
    <div class="container">
        <div class="about-hero">
            <div>
                <p class="section-label">{{ $about['label'] }}</p>
                <h2 class="section-title">{{ $about['title'] }}</h2>
                <p class="about-lead">{{ $about['lead'] }}</p>
            </div>

            <div class="about-stat-row">
                @foreach ($about['stats'] as $stat)
                    <x-home.stat-card :label="$stat['label']" :value="$stat['value']" />
                @endforeach
            </div>
        </div>

        <div class="about-story-grid">
            @foreach ($about['highlights'] as $highlight)
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
                        <p class="section-label">{{ $about['gallery_label'] }}</p>
                        <h3>{{ $about['gallery_title'] }}</h3>
                    </div>
                    <span class="about-gallery-caption">{{ $about['gallery_caption'] }}</span>
                </div>

                <div
                    class="product-showcase-gallery about-showcase-gallery"
                    data-gallery
                    data-gallery-tone="clay"
                    data-gallery-title="{{ $about['gallery_title'] }}"
                    data-gallery-description="{{ $about['gallery_description'] }}"
                >
                    <div class="product-gallery-stage product-tone-clay about-gallery-stage">
                        <span class="product-gallery-badge">{{ __('home.ui.gallery.badge') }}</span>
                        <div class="product-gallery-nav-wrap">
                            <button type="button" class="product-gallery-nav" data-gallery-prev aria-label="{{ __('home.ui.gallery.previous') }}">&#8249;</button>
                            <button type="button" class="product-gallery-visual" data-gallery-open aria-label="{{ __('home.ui.gallery.open_image') }}">
                                <span class="product-gallery-visual-art" aria-hidden="true">
                                    <img
                                        src="{{ $about['gallery'][0]['src'] }}"
                                        alt="{{ $about['gallery'][0]['alt'] }}"
                                        class="product-gallery-image"
                                        data-gallery-active-image
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </span>
                                <span class="product-gallery-visual-copy">
                                    <strong data-gallery-active-label>{{ $about['gallery'][0]['label'] }}</strong>
                                    <span class="product-gallery-visual-subtitle">Suzani Shop</span>
                                </span>
                            </button>
                            <button type="button" class="product-gallery-nav" data-gallery-next aria-label="{{ __('home.ui.gallery.next') }}">&#8250;</button>
                        </div>
                        <div class="product-gallery-meta">
                            <span class="product-gallery-hint">{{ __('home.ui.gallery.enlarge') }}</span>
                            <div class="product-gallery-counter" data-gallery-counter>1 / {{ count($about['gallery']) }}</div>
                        </div>
                    </div>
                    <div class="product-gallery-data" hidden>
                        @foreach ($about['gallery'] as $image)
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
                <p class="section-label">{{ $about['note_label'] }}</p>
                <h3>{{ $about['note_title'] }}</h3>
                <p>{{ $about['note_text'] }}</p>
                <div class="about-gallery-points">
                    @foreach ($about['note_points'] as $point)
                        <div>
                            <strong>{{ $point['title'] }}</strong>
                            <span>{{ $point['text'] }}</span>
                        </div>
                    @endforeach
                </div>
            </article>
        </div>

        <div class="about-grid about-deep-grid">
            <article class="about-card about-process-card">
                <p class="section-label">{{ $about['process_label'] }}</p>
                <h3>{{ $about['process_title'] }}</h3>
                <div class="craft-process-list">
                    @foreach ($about['process'] as $item)
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
                <p class="section-label">{{ $about['why_label'] }}</p>
                <h3>{{ $about['why_title'] }}</h3>
                <ul class="why-choose-list">
                    @foreach ($about['why_choose'] as $reason)
                        <li>{{ $reason }}</li>
                    @endforeach
                </ul>
            </article>
        </div>
    </div>
</section>
