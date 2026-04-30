@php
    $currentLocale = \App\Support\Locales::current();
    $localeLabels = \App\Support\Locales::labels();
    $localeShortLabels = \App\Support\Locales::shortLabels();
@endphp

<header class="hero-section">
    <div class="hero-noise"></div>
    <nav class="topbar container" data-site-header>
        <a href="{{ url('/') }}" class="brand-mark">
            <span class="brand-logo-wrap" aria-hidden="true">
                <img
                    src="{{ asset('images/logo/main_logo.jpg') }}"
                    alt=""
                    class="brand-logo"
                    decoding="async"
                >
            </span>
            <span>Suzani Shop</span>
        </a>

        <div class="topbar-links">
            <a href="#about">{{ __('home.nav.about') }}</a>
            <a href="#catalog">{{ __('home.nav.products') }}</a>
            <a href="#cart" class="cart-link">
                {{ __('home.nav.cart') }}
                <span class="cart-badge" data-cart-count>0</span>
            </a>
            <a href="#contact">{{ __('home.nav.contact') }}</a>
        </div>

        <div class="topbar-actions">
            <div class="language-switcher" aria-label="{{ __('home.language.label') }}">
                @foreach ($localeShortLabels as $locale => $shortLabel)
                    <a
                        href="{{ route('language.switch', ['locale' => $locale], false) }}"
                        class="language-option {{ $currentLocale === $locale ? 'is-active' : '' }}"
                        data-language-switch
                        data-locale="{{ $locale }}"
                        aria-label="{{ __('home.language.switch_to', ['language' => $localeLabels[$locale]]) }}"
                        aria-current="{{ $currentLocale === $locale ? 'true' : 'false' }}"
                    >
                        <span>{{ $shortLabel }}</span>
                    </a>
                @endforeach
            </div>

            <button
                type="button"
                class="theme-toggle"
                data-theme-toggle
                data-active-theme="atelier"
                data-theme-light-status="{{ __('home.theme.atelier_status') }}"
                data-theme-dark-status="{{ __('home.theme.nocturne_status') }}"
                aria-label="{{ __('home.theme.toggle') }}"
                aria-pressed="false"
            >
                <span class="theme-toggle-label theme-toggle-label-light">Atelier</span>
                <span class="theme-toggle-label theme-toggle-label-dark">Nocturne</span>
                <span class="sr-only" data-theme-toggle-status>{{ __('home.theme.atelier_status') }}</span>
            </button>
            <a href="{{ route('login', [], false) }}" class="topbar-admin-link">
                <span class="topbar-admin-copy">
                    <span class="topbar-admin-overline">{{ __('home.nav.admin_overline') }}</span>
                    <span class="topbar-admin-title">{{ __('home.nav.admin_title') }}</span>
                </span>
                <span class="topbar-admin-knot" aria-hidden="true"></span>
            </a>
        </div>
    </nav>

    <div class="container hero-grid">
        <div class="hero-copy">
            <p class="eyebrow">{{ $hero['eyebrow'] }}</p>
            <h1>{{ $hero['title'] }}</h1>
            <p class="hero-text">{{ $hero['text'] }}</p>

            <div class="hero-actions">
                <a href="{{ $hero['primary_link'] }}" class="button button-primary">{{ $hero['primary_label'] }}</a>
                <a href="#contact" class="button button-secondary">{{ __('home.nav.order') }}</a>
            </div>

            <p class="hero-trust-note">{{ $hero['trust_note'] }}</p>

            <div class="hero-stats">
                @foreach ($hero['stats'] as $stat)
                    <div>
                        <strong>{{ $stat['value'] }}</strong>
                        <span>{{ $stat['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="hero-art">
            <div class="hero-visual-stage">
                <div class="hero-visual-main">
                    <img
                        src="{{ $hero['main_image'] }}"
                        alt="{{ $hero['main_title'] }}"
                        class="hero-visual-image hero-visual-image-main"
                        fetchpriority="high"
                        decoding="async"
                    >
                    <div class="hero-visual-label">
                        <span>{{ $hero['main_badge'] }}</span>
                        <strong>{{ $hero['main_title'] }}</strong>
                    </div>
                    <div class="hero-visual-caption">{{ $hero['main_caption'] }}</div>
                </div>

                <div class="hero-visual-stack">
                    <div class="hero-visual-detail hero-visual-detail-top">
                        <img
                            src="{{ $hero['detail_image'] }}"
                            alt="{{ $hero['detail_title'] }}"
                            class="hero-visual-image hero-visual-image-detail"
                            loading="lazy"
                            decoding="async"
                        >
                        <span>{{ $hero['detail_badge'] }}</span>
                        <strong>{{ $hero['detail_title'] }}</strong>
                    </div>

                    <div class="hero-visual-detail hero-visual-detail-bottom">
                        <img
                            src="{{ $hero['material_image'] }}"
                            alt="{{ $hero['material_title'] }}"
                            class="hero-visual-image hero-visual-image-material"
                            loading="lazy"
                            decoding="async"
                        >
                        <span>{{ $hero['material_badge'] }}</span>
                        <strong>{{ $hero['material_title'] }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container hero-feature-bar">
        @foreach ($hero['promises'] as $promise)
            <article class="hero-feature">
                <strong>{{ $promise['title'] }}</strong>
                <p>{{ $promise['text'] }}</p>
            </article>
        @endforeach
    </div>
</header>
