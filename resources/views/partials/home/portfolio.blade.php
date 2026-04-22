<section id="portfolio" class="section section-soft">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="section-label">{{ $portfolio['label'] }}</p>
                <h2 class="section-title">{{ $portfolio['title'] }}</h2>
            </div>
            <a href="#contact" class="text-link section-action-link">{{ $portfolio['action_label'] }}</a>
        </div>

        <div class="portfolio-intro">
            <p>{{ $portfolio['intro'] }}</p>
        </div>

        <div class="portfolio-grid">
            @foreach ($portfolio['items'] as $item)
                <x-home.portfolio-card :item="$item" />
            @endforeach
        </div>
    </div>
</section>
