<section class="section">
    <div class="container">
        <div class="cta-shell">
            <div class="cta-copy">
                <p class="section-label">{{ $cta['label'] }}</p>
                <h2 class="section-title">{{ $cta['title'] }}</h2>
                <p>{{ $cta['copy'] }}</p>
            </div>

            <div class="cta-actions">
                <a href="#cart" class="button button-primary">{{ __('home.ui.cta.order') }}</a>
                @if (filled($contact['telegram']['href']))
                    <a href="{{ $contact['telegram']['href'] }}" target="_blank" rel="noreferrer" class="button button-secondary">
                        {{ __('home.ui.cta.telegram') }}
                    </a>
                @endif
            </div>

            <div class="cta-points">
                @foreach ($cta['points'] as $point)
                    <div class="cta-point">
                        <strong>{{ $point['title'] }}</strong>
                        <span>{{ $point['text'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
