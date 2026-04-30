<div class="gallery-lightbox is-hidden" data-gallery-modal aria-hidden="true">
    <button type="button" class="gallery-lightbox-backdrop" data-gallery-close aria-label="{{ __('home.ui.gallery.close_gallery') }}"></button>
    <div class="gallery-lightbox-dialog">
        <button type="button" class="gallery-lightbox-close" data-gallery-close aria-label="{{ __('home.ui.gallery.close') }}">{{ __('home.ui.gallery.close') }}</button>
        <button type="button" class="gallery-lightbox-arrow gallery-lightbox-arrow-left" data-gallery-modal-prev aria-label="{{ __('home.ui.gallery.previous') }}">&#8249;</button>
        <div class="gallery-lightbox-stage product-tone-rose" data-gallery-modal-stage>
            <div class="gallery-lightbox-stage-media">
                <img src="" alt="" class="gallery-lightbox-image" data-gallery-modal-image decoding="async">
            </div>
            <div class="gallery-lightbox-stage-copy">
                <span data-gallery-modal-title>{{ __('home.ui.gallery.title') }}</span>
                <strong data-gallery-modal-label>{{ __('home.ui.gallery.image') }}</strong>
                <p data-gallery-modal-count>1 / 1</p>
            </div>
        </div>
        <div class="gallery-lightbox-info">
            <div class="gallery-lightbox-info-head">
                <span data-gallery-modal-product-title>{{ __('home.ui.product.default') }}</span>
                <strong data-gallery-modal-price>0 {{ __('home.ui.money.currency') }}</strong>
            </div>
            <div class="gallery-lightbox-info-meta">
                <span data-gallery-modal-category>{{ __('home.ui.product.category') }}</span>
                <span data-gallery-modal-material>{{ __('home.ui.product.material') }}</span>
                <span data-gallery-modal-size>{{ __('home.ui.product.size') }}</span>
            </div>
            <p data-gallery-modal-description>{{ __('home.ui.product.gallery_description') }}</p>
        </div>
        <button type="button" class="gallery-lightbox-arrow gallery-lightbox-arrow-right" data-gallery-modal-next aria-label="{{ __('home.ui.gallery.next') }}">&#8250;</button>
    </div>
</div>

<div class="product-detail-modal is-hidden" data-product-detail-modal aria-hidden="true">
    <button type="button" class="product-detail-modal-backdrop" data-product-detail-close aria-label="{{ __('home.ui.gallery.close') }}"></button>
    <div class="product-detail-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="product-detail-modal-title">
        <button type="button" class="product-detail-modal-close" data-product-detail-close aria-label="{{ __('home.ui.gallery.close') }}">{{ __('home.ui.gallery.close') }}</button>
        <div class="product-detail-modal-shell">
            <div class="product-detail-modal-head">
                <div class="product-detail-modal-preview product-tone-rose" data-product-detail-stage>
                    <img src="" alt="" class="product-detail-modal-image" data-product-detail-image decoding="async">
                </div>
                <div class="product-detail-modal-copy">
                    <span data-product-detail-category>{{ __('home.ui.product.category') }}</span>
                    <strong id="product-detail-modal-title" data-product-detail-title>{{ __('home.ui.product.default') }}</strong>
                    <p class="product-detail-modal-price" data-product-detail-price>0 {{ __('home.ui.money.currency') }}</p>
                </div>
            </div>
            <div class="product-detail-modal-meta">
                <div class="product-detail-modal-meta-item">
                    <span>{{ __('home.ui.product.material') }}</span>
                    <strong data-product-detail-material>{{ __('home.ui.product.agreed') }}</strong>
                </div>
                <div class="product-detail-modal-meta-item">
                    <span>{{ __('home.ui.product.size') }}</span>
                    <strong data-product-detail-size>{{ __('home.ui.product.agreed') }}</strong>
                </div>
                <div class="product-detail-modal-meta-item">
                    <span>{{ __('home.ui.product.color') }}</span>
                    <strong data-product-detail-color>{{ __('home.ui.product.agreed') }}</strong>
                </div>
                <div class="product-detail-modal-meta-item">
                    <span>{{ __('home.ui.product.availability') }}</span>
                    <strong data-product-detail-availability>{{ __('home.ui.product.agreed') }}</strong>
                </div>
            </div>
            <div class="product-detail-modal-body">
                <div class="product-detail-modal-section">
                    <span>{{ __('home.ui.product.full_description') }}</span>
                    <p data-product-detail-description>{{ __('home.ui.product.detail_description') }}</p>
                </div>
                <div class="product-detail-modal-section" data-product-detail-story-section>
                    <span>{{ __('home.ui.product.story') }}</span>
                    <p data-product-detail-story>{{ __('home.ui.product.detail_story') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-spotlight-modal is-hidden" data-portfolio-modal aria-hidden="true">
    <button type="button" class="portfolio-spotlight-backdrop" data-portfolio-modal-close aria-label="{{ __('home.ui.portfolio.close') }}"></button>
    <div class="portfolio-spotlight-dialog" role="dialog" aria-modal="true" aria-labelledby="portfolio-spotlight-title">
        <button type="button" class="portfolio-spotlight-close" data-portfolio-modal-close aria-label="{{ __('home.ui.gallery.close') }}">{{ __('home.ui.gallery.close') }}</button>
        <div class="portfolio-spotlight-shell">
            <div class="portfolio-spotlight-stage product-tone-rose" data-portfolio-modal-stage>
                <img src="" alt="" class="portfolio-spotlight-image" data-portfolio-modal-image decoding="async">
                <div class="portfolio-spotlight-stage-copy">
                    <span data-portfolio-modal-type>{{ __('home.ui.portfolio.project') }}</span>
                    <strong data-portfolio-modal-highlight>{{ __('home.ui.portfolio.full_view') }}</strong>
                </div>
            </div>
            <div class="portfolio-spotlight-copy">
                <p class="portfolio-spotlight-kicker">{{ __('home.ui.portfolio.sample') }}</p>
                <h3 id="portfolio-spotlight-title" data-portfolio-modal-title>{{ __('home.ui.portfolio.project_title') }}</h3>
                <p data-portfolio-modal-description>{{ __('home.ui.portfolio.description') }}</p>
                <div class="portfolio-spotlight-meta">
                    <span data-portfolio-modal-type-chip>{{ __('home.ui.portfolio.project') }}</span>
                    <span data-portfolio-modal-highlight-chip>{{ __('home.ui.portfolio.full_view') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
