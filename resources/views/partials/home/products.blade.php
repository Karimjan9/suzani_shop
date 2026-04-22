<section id="products" class="section section-soft">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="section-label">{{ $catalog['products_label'] }}</p>
                <h2 class="section-title">{{ $catalog['products_title'] }}</h2>
            </div>
            <a href="#contact" class="text-link section-action-link">{{ $catalog['products_action_label'] }}</a>
        </div>

        <div class="product-grid">
            @foreach ($catalog['top_products'] as $product)
                <x-home.product-card :product="$product" variant="featured" image-loading="eager" />
            @endforeach
        </div>
    </div>
</section>
