<section id="catalog" class="section">
    <div class="container">
        <div class="collection-shell">
            <div class="collection-intro">
                <p class="section-label">{{ $catalog['collection_label'] }}</p>
                <h2 class="section-title" data-collection-title>{{ $catalog['collection_title'] }}</h2>
                <p class="collection-copy" data-collection-copy>{{ $catalog['collection_copy'] }}</p>
            </div>

            <div class="collection-active-card" data-catalog-panel>
                <span data-collection-active-label>{{ $catalog['collection_active_label'] }}</span>
                <strong data-collection-active-count>{{ count($catalog['products']) }} ta mahsulot</strong>
                <p data-collection-active-copy>{{ $catalog['collection_active_copy'] }}</p>
            </div>
        </div>

        <div class="category-mixer-grid" aria-label="Kategoriyalar tezkor tanlovi">
            @foreach ($catalog['categories'] as $category)
                <button
                    type="button"
                    class="category-card category-{{ $category['tone'] }}{{ filled($category['image'] ?? null) ? ' has-image' : '' }}"
                    data-category-card
                    data-filter-target="{{ $category['filter'] }}"
                    data-title="{{ $category['name'] }}"
                    data-count="{{ $category['count'] }}"
                    data-copy="{{ $category['copy'] }}"
                >
                    @if (filled($category['image'] ?? null))
                        <span class="category-card-media" aria-hidden="true">
                            <img src="{{ $category['image'] }}" alt="" loading="lazy" decoding="async">
                        </span>
                    @endif
                    <span>{{ $category['count'] }}</span>
                    <h3>{{ $category['name'] }}</h3>
                    <strong>Shu kolleksiyani ochish</strong>
                </button>
            @endforeach
        </div>

        <div class="catalog-toolbar" data-products-toolbar>
            <div class="catalog-toolbar-block catalog-search-wrap">
                <div class="catalog-block-head">
                    <label class="catalog-label" for="product-search">Qidiruv</label>
                    <p class="catalog-block-note">{{ $catalog['search_note'] }}</p>
                </div>
                <input
                    id="product-search"
                    class="catalog-search"
                    type="search"
                    placeholder="Masalan: suzani, yostiq, stol bezagi..."
                    data-search-input
                >
            </div>

            <div class="catalog-toolbar-block catalog-controls">
                <div class="catalog-block-head">
                    <span class="catalog-label">Kolleksiya</span>
                    <p class="catalog-block-note">{{ $catalog['filter_note'] }}</p>
                </div>
                <div class="catalog-filter-group" aria-label="Mahsulot filtrlari">
                    @foreach ($catalog['filters'] as $filter)
                        <button
                            type="button"
                            class="filter-chip{{ $filter['value'] === 'all' ? ' is-active' : '' }}"
                            data-filter="{{ $filter['value'] }}"
                        >
                            {{ $filter['label'] }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="catalog-toolbar-block catalog-sort-wrap">
                <div class="catalog-block-head">
                    <label class="catalog-label" for="product-sort">Sort</label>
                    <p class="catalog-block-note">{{ $catalog['sort_note'] }}</p>
                </div>
                <select id="product-sort" class="catalog-sort" data-sort-select>
                    <option value="new">Yangi</option>
                    <option value="cheap">Arzon</option>
                    <option value="expensive">Qimmat</option>
                    <option value="popular">Mashhur</option>
                </select>
            </div>
        </div>

        <div class="catalog-meta" data-catalog-meta>
            <p class="catalog-result-pill"><span data-results-count>{{ count($catalog['products']) }}</span> ta mahsulot topildi</p>
            <p class="catalog-meta-note">Qidiruv va filterlar sahifa yangilanmasdan real vaqtda ishlaydi.</p>
        </div>

        <div class="catalog-grid" data-products-grid>
            @foreach ($catalog['products'] as $product)
                <x-home.product-card :product="$product" variant="catalog" />
            @endforeach
        </div>

        <p class="catalog-empty is-hidden" data-empty-state>{{ $catalog['empty_state'] }}</p>
    </div>
</section>
