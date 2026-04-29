<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="atelier">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Suzani Shop') }}</title>
        <meta
            name="description"
            content="{{ __('home.meta_description') }}"
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
    </head>
    <body class="site-shell">
        <div class="site-ribbons" aria-hidden="true">
            <span class="site-ribbon site-ribbon--left"></span>
            <span class="site-ribbon site-ribbon--right"></span>
        </div>

        @include('partials.home.hero', ['hero' => $hero])

        <main>
            @include('partials.home.about', ['about' => $about])
            @include('partials.home.portfolio', ['portfolio' => $portfolio])
            @include('partials.home.products', ['catalog' => $catalog])
            @include('partials.home.catalog', ['catalog' => $catalog])
            @include('partials.home.cart', ['cart' => $cart])
            @include('partials.home.testimonials', ['testimonials' => $testimonials])
            @include('partials.home.cta', ['cta' => $cta, 'contact' => $contact])
            @include('partials.home.contact', ['contact' => $contact])
            @include('partials.home.delivery')
        </main>

        @include('partials.home.modals')
        @include('partials.home.footer', ['footer' => $footer])

        @if (! file_exists(public_path('build/manifest.json')) && ! file_exists(public_path('hot')))
            @include('partials.home-inline-scripts')
        @endif
    </body>
</html>
