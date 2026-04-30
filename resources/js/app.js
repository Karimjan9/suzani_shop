import './bootstrap';
import '../scss/app.scss';
import Alpine from 'alpinejs';
import { initFlowbite } from 'flowbite';
import 'flowbite';
import { initThemeToggle } from './home';
import { initSwipers } from './plugins/swiper';

window.Alpine = Alpine;
Alpine.start();

const readTranslations = () => {
    const source = document.getElementById('site-translations');

    if (!source) {
        return {};
    }

    try {
        return JSON.parse(source.textContent || '{}');
    } catch {
        return {};
    }
};

const translationValue = (key, fallback = '', replacements = {}) => {
    const translations = readTranslations();
    const value = key.split('.').reduce((carry, part) => (
        carry && Object.prototype.hasOwnProperty.call(carry, part) ? carry[part] : undefined
    ), translations);

    const template = String(value ?? fallback);

    return Object.entries(replacements).reduce(
        (text, [name, replacement]) => text.replaceAll(`:${name}`, String(replacement)),
        template,
    );
};

const currentLocale = () => document.documentElement.lang || translationValue('money.locale', 'uz-UZ');

const formatMoney = (value) => {
    const locale = translationValue('money.locale', currentLocale());
    const currency = translationValue('money.currency', "so'm");

    return `${new Intl.NumberFormat(locale).format(Number(value) || 0)} ${currency}`;
};

const escapeHtml = (value) => String(value ?? '')
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#39;');

const decodeBase64Utf8 = (value) => {
    const binary = window.atob(value);

    if (window.TextDecoder) {
        const bytes = Uint8Array.from(binary, (char) => char.charCodeAt(0));

        return new window.TextDecoder('utf-8').decode(bytes);
    }

    return decodeURIComponent(Array.from(binary, (char) => (
        `%${char.charCodeAt(0).toString(16).padStart(2, '0')}`
    )).join(''));
};

const parseProductPayload = (rawValue) => {
    if (!rawValue) {
        return null;
    }

    try {
        return JSON.parse(rawValue);
    } catch {
        try {
            return JSON.parse(decodeBase64Utf8(rawValue));
        } catch {
            return null;
        }
    }
};

const normalizeCartItem = (item) => ({
    id: String(item.id || ''),
    title: String(item.title || ''),
    price: Number(item.price) || 0,
    quantity: Math.max(1, Number(item.quantity) || 1),
    formatted_price: String(item.formatted_price || formatMoney(item.price)),
    category_label: String(item.category_label || ''),
    short_description: String(item.short_description || ''),
    full_description: String(item.full_description || ''),
    material: String(item.material || ''),
    size: String(item.size || ''),
    color: String(item.color || ''),
    availability: String(item.availability || ''),
    lead_time: String(item.lead_time || ''),
    image_src: String(item.image_src || ''),
    image_label: String(item.image_label || item.images?.[0] || translationValue('product.default', 'Mahsulot')),
    images: Array.isArray(item.images) ? item.images.filter(Boolean).map(String) : [],
});

const pulseElement = (element, className, duration = 900) => {
    if (!element) {
        return;
    }

    element.classList.remove(className);
    void element.offsetWidth;
    element.classList.add(className);

    window.setTimeout(() => {
        element.classList.remove(className);
    }, duration);
};

const initStickyHeader = () => {
    const header = document.querySelector('[data-site-header]');

    if (!header) {
        return;
    }

    const syncHeader = () => {
        header.classList.toggle('is-scrolled', window.scrollY > 24);
    };

    syncHeader();
    window.addEventListener('scroll', syncHeader, { passive: true });
};

const initRevealEffects = () => {
    const targets = Array.from(document.querySelectorAll([
        '.hero-copy',
        '.hero-art',
        '.hero-feature',
        '.about-story-card',
        '.about-process-card',
        '.about-why-card',
        '.portfolio-card',
        '.product-card',
        '.category-card',
        '.step-card',
        '.testimonial-card',
        '.cta-shell',
        '.contact-card',
        '.admin-entry-card',
        '.footer-brand',
        '.footer-links',
    ].join(', ')));

    if (!targets.length) {
        return;
    }

    targets.forEach((target, index) => {
        target.classList.add('reveal-item');
        target.style.setProperty('--reveal-delay', `${Math.min((index % 6) * 70, 350)}ms`);
    });

    if (!('IntersectionObserver' in window)) {
        targets.forEach((target) => target.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, {
        threshold: 0.18,
        rootMargin: '0px 0px -10% 0px',
    });

    targets.forEach((target) => observer.observe(target));
};

const initProductGalleries = () => {
    const galleries = Array.from(document.querySelectorAll('[data-gallery]'));
    const modal = document.querySelector('[data-gallery-modal]');
    const modalStage = modal?.querySelector('[data-gallery-modal-stage]');
    const modalLabel = modal?.querySelector('[data-gallery-modal-label]');
    const modalTitle = modal?.querySelector('[data-gallery-modal-title]');
    const modalCount = modal?.querySelector('[data-gallery-modal-count]');
    const modalImage = modal?.querySelector('[data-gallery-modal-image]');
    const modalProductTitle = modal?.querySelector('[data-gallery-modal-product-title]');
    const modalPrice = modal?.querySelector('[data-gallery-modal-price]');
    const modalCategory = modal?.querySelector('[data-gallery-modal-category]');
    const modalMaterial = modal?.querySelector('[data-gallery-modal-material]');
    const modalSize = modal?.querySelector('[data-gallery-modal-size]');
    const modalDescription = modal?.querySelector('[data-gallery-modal-description]');
    const modalPrev = modal?.querySelector('[data-gallery-modal-prev]');
    const modalNext = modal?.querySelector('[data-gallery-modal-next]');
    const modalCloseTargets = Array.from(document.querySelectorAll('[data-gallery-close]'));
    const toneClasses = ['product-tone-rose', 'product-tone-gold', 'product-tone-teal', 'product-tone-ink', 'product-tone-clay', 'product-tone-sky'];
    const modalState = {
        items: [],
        index: 0,
        tone: 'rose',
        title: translationValue('gallery.title', 'Mahsulot galereyasi'),
        meta: null,
    };

    const syncMetaValue = (element, value) => {
        if (!element) {
            return;
        }

        const nextValue = String(value || '').trim();
        element.textContent = nextValue;
        element.hidden = nextValue === '';
    };

    const syncModal = () => {
        if (!modalStage || !modalLabel || !modalTitle || !modalCount || !modalState.items.length) {
            return;
        }

        const activeItem = modalState.items[modalState.index] || {};

        modalStage.classList.remove(...toneClasses);
        modalStage.classList.add(`product-tone-${modalState.tone}`);
        modalTitle.textContent = modalState.title;
        modalLabel.textContent = activeItem.label || translationValue('gallery.image', 'Rasm');
        modalCount.textContent = `${modalState.index + 1} / ${modalState.items.length}`;

        if (modalImage) {
            modalImage.src = activeItem.src || '';
            modalImage.alt = activeItem.alt || activeItem.label || modalState.title;
        }

        if (modalProductTitle) {
            modalProductTitle.textContent = modalState.meta?.title || modalState.title;
        }

        syncMetaValue(modalPrice, modalState.meta?.price);
        syncMetaValue(modalCategory, modalState.meta?.category);
        syncMetaValue(modalMaterial, modalState.meta?.material);
        syncMetaValue(modalSize, modalState.meta?.size);
        syncMetaValue(modalDescription, modalState.meta?.description);
    };

    const closeModal = () => {
        if (!modal) {
            return;
        }

        modal.classList.add('is-hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('is-gallery-open');

        if (modalImage) {
            modalImage.src = '';
            modalImage.alt = '';
        }
    };

    const openModal = (items, index, tone, title, meta = null) => {
        if (!modal || !items.length) {
            return;
        }

        modalState.items = items;
        modalState.index = index;
        modalState.tone = tone;
        modalState.title = title;
        modalState.meta = meta;

        syncModal();

        modal.classList.remove('is-hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('is-gallery-open');
    };

    const stepModal = (direction) => {
        if (!modalState.items.length) {
            return;
        }

        modalState.index = (modalState.index + direction + modalState.items.length) % modalState.items.length;
        syncModal();
    };

    modalPrev?.addEventListener('click', () => stepModal(-1));
    modalNext?.addEventListener('click', () => stepModal(1));
    modalCloseTargets.forEach((target) => target.addEventListener('click', closeModal));
    document.addEventListener('keydown', (event) => {
        if (modal?.classList.contains('is-hidden')) {
            return;
        }

        if (event.key === 'Escape') {
            closeModal();
        }

        if (event.key === 'ArrowLeft') {
            stepModal(-1);
        }

        if (event.key === 'ArrowRight') {
            stepModal(1);
        }
    });

    galleries.forEach((gallery) => {
        const items = Array.from(gallery.querySelectorAll('[data-gallery-item]'));
        const labels = Array.from(gallery.querySelectorAll('[data-gallery-active-label]'));
        const activeImages = Array.from(gallery.querySelectorAll('[data-gallery-active-image]'));
        const counter = gallery.querySelector('[data-gallery-counter]');
        const previousButton = gallery.querySelector('[data-gallery-prev]');
        const nextButton = gallery.querySelector('[data-gallery-next]');
        const openButton = gallery.querySelector('[data-gallery-open]');
        const tone = gallery.dataset.galleryTone || 'rose';
        const title = gallery.dataset.galleryTitle || translationValue('gallery.title', 'Mahsulot galereyasi');
        const meta = {
            title,
            price: gallery.dataset.galleryPrice || '',
            category: gallery.dataset.galleryCategory || '',
            material: gallery.dataset.galleryMaterial || '',
            size: gallery.dataset.gallerySize || '',
            description: gallery.dataset.galleryDescription || '',
        };

        if (!items.length || !labels.length) {
            return;
        }

        let activeIndex = Math.max(0, items.findIndex((item) => item.classList.contains('is-active')));

        const setActive = (index) => {
            activeIndex = (index + items.length) % items.length;

            items.forEach((item, itemIndex) => {
                const isActive = itemIndex === activeIndex;

                item.classList.toggle('is-active', isActive);
                item.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            const activeItem = items[activeIndex];
            const activeLabel = activeItem.dataset.galleryLabel || activeItem.textContent.trim();
            const activeSrc = activeItem.dataset.gallerySrc || '';
            const activeAlt = activeItem.dataset.galleryAlt || activeLabel;

            labels.forEach((label) => {
                label.textContent = activeLabel;
            });

            activeImages.forEach((image) => {
                image.src = activeSrc;
                image.alt = activeAlt;
            });

            if (counter) {
                counter.textContent = `${activeIndex + 1} / ${items.length}`;
            }

            if (openButton) {
                openButton.setAttribute('aria-label', `${title}: ${activeLabel}`);
            }
        };

        if (previousButton) {
            previousButton.disabled = items.length <= 1;
        }

        if (nextButton) {
            nextButton.disabled = items.length <= 1;
        }

        previousButton?.addEventListener('click', () => {
            setActive(activeIndex - 1);
        });

        nextButton?.addEventListener('click', () => {
            setActive(activeIndex + 1);
        });

        openButton?.addEventListener('click', () => {
            openModal(
                items.map((item) => ({
                    label: item.dataset.galleryLabel || item.textContent.trim(),
                    src: item.dataset.gallerySrc || '',
                    alt: item.dataset.galleryAlt || item.dataset.galleryLabel || item.textContent.trim(),
                })),
                activeIndex,
                tone,
                title,
                meta,
            );
        });

        setActive(activeIndex);
    });
};

const initProductDetailModal = () => {
    const modal = document.querySelector('[data-product-detail-modal]');

    if (!modal) {
        return;
    }

    const stage = modal.querySelector('[data-product-detail-stage]');
    const image = modal.querySelector('[data-product-detail-image]');
    const category = modal.querySelector('[data-product-detail-category]');
    const title = modal.querySelector('[data-product-detail-title]');
    const price = modal.querySelector('[data-product-detail-price]');
    const material = modal.querySelector('[data-product-detail-material]');
    const size = modal.querySelector('[data-product-detail-size]');
    const color = modal.querySelector('[data-product-detail-color]');
    const availability = modal.querySelector('[data-product-detail-availability]');
    const description = modal.querySelector('[data-product-detail-description]');
    const story = modal.querySelector('[data-product-detail-story]');
    const storySection = modal.querySelector('[data-product-detail-story-section]');
    const closeButton = modal.querySelector('.product-detail-modal-close');
    const closeTargets = Array.from(modal.querySelectorAll('[data-product-detail-close]'));
    const toneClasses = ['product-tone-rose', 'product-tone-gold', 'product-tone-teal', 'product-tone-ink', 'product-tone-clay', 'product-tone-sky'];
    let lastTrigger = null;

    const syncText = (element, value, fallback = '') => {
        if (!element) {
            return;
        }

        const nextValue = String(value || fallback).trim();
        element.textContent = nextValue;
    };

    const closeModal = () => {
        modal.classList.add('is-hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('is-detail-open');

        if (image) {
            image.src = '';
            image.alt = '';
            image.hidden = false;
        }

        lastTrigger?.focus?.();
        lastTrigger = null;
    };

    const openModal = (payload, trigger) => {
        const detail = {
            title: String(payload?.title || translationValue('product.default', 'Mahsulot')),
            category: String(payload?.category || translationValue('product.catalog', 'Katalog')),
            price: String(payload?.price || ''),
            description: String(payload?.description || ''),
            story: String(payload?.story || ''),
            material: String(payload?.material || translationValue('product.agreed', 'Kelishiladi')),
            size: String(payload?.size || translationValue('product.agreed', 'Kelishiladi')),
            color: String(payload?.color || translationValue('product.agreed', 'Kelishiladi')),
            availability: String(payload?.availability || translationValue('product.agreed', 'Kelishiladi')),
            image: String(payload?.image || ''),
            tone: String(payload?.tone || 'rose'),
        };

        lastTrigger = trigger;

        stage?.classList.remove(...toneClasses);
        stage?.classList.add(`product-tone-${detail.tone}`);

        if (image) {
            image.src = detail.image;
            image.alt = detail.title;
            image.hidden = detail.image === '';
        }

        syncText(category, detail.category, translationValue('product.catalog', 'Katalog'));
        syncText(title, detail.title, translationValue('product.default', 'Mahsulot'));
        syncText(price, detail.price, '');
        syncText(material, detail.material, translationValue('product.agreed', 'Kelishiladi'));
        syncText(size, detail.size, translationValue('product.agreed', 'Kelishiladi'));
        syncText(color, detail.color, translationValue('product.agreed', 'Kelishiladi'));
        syncText(availability, detail.availability, translationValue('product.agreed', 'Kelishiladi'));
        syncText(description, detail.description, translationValue('product.description_soon', 'Mahsulot tavsifi tez orada to\'ldiriladi.'));
        syncText(story, detail.story, detail.description || translationValue('product.story_soon', 'Mahsulot hikoyasi tez orada to\'ldiriladi.'));

        if (storySection) {
            storySection.hidden = String(detail.story || '').trim() === '';
        }

        modal.classList.remove('is-hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('is-detail-open');
        closeButton?.focus();
    };

    closeTargets.forEach((target) => {
        target.addEventListener('click', closeModal);
    });

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-product-detail-open]');

        if (!trigger) {
            return;
        }

        const payload = parseProductPayload(trigger.getAttribute('data-product-detail-payload'));

        if (!payload) {
            return;
        }

        openModal(payload, trigger);
    });

    document.addEventListener('keydown', (event) => {
        if (modal.classList.contains('is-hidden')) {
            return;
        }

        if (event.key === 'Escape') {
            closeModal();
        }
    });
};

const initPortfolioModal = () => {
    const modal = document.querySelector('[data-portfolio-modal]');

    if (!modal) {
        return;
    }

    const stage = modal.querySelector('[data-portfolio-modal-stage]');
    const image = modal.querySelector('[data-portfolio-modal-image]');
    const type = modal.querySelector('[data-portfolio-modal-type]');
    const highlight = modal.querySelector('[data-portfolio-modal-highlight]');
    const title = modal.querySelector('[data-portfolio-modal-title]');
    const description = modal.querySelector('[data-portfolio-modal-description]');
    const typeChip = modal.querySelector('[data-portfolio-modal-type-chip]');
    const highlightChip = modal.querySelector('[data-portfolio-modal-highlight-chip]');
    const closeButton = modal.querySelector('.portfolio-spotlight-close');
    const closeTargets = Array.from(modal.querySelectorAll('[data-portfolio-modal-close]'));
    const toneClasses = ['product-tone-rose', 'product-tone-gold', 'product-tone-teal', 'product-tone-ink', 'product-tone-clay', 'product-tone-sky'];
    let lastTrigger = null;

    const syncText = (element, value, fallback = '') => {
        if (!element) {
            return;
        }

        element.textContent = String(value || fallback).trim();
    };

    const closeModal = () => {
        modal.classList.add('is-hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('is-gallery-open');

        if (image) {
            image.src = '';
            image.alt = '';
            image.hidden = false;
        }

        lastTrigger?.focus?.();
        lastTrigger = null;
    };

    const openModal = (payload, trigger) => {
        const detail = {
            title: String(payload?.title || translationValue('portfolio.sample', 'Portfolio namuna')),
            type: String(payload?.type || translationValue('portfolio.project', 'Portfolio loyiha')),
            highlight: String(payload?.highlight || payload?.title || translationValue('portfolio.full_view', 'To\'liq ko\'rinish')),
            description: String(payload?.description || translationValue('portfolio.description_soon', 'Portfolio loyihasi tavsifi tez orada to\'ldiriladi.')),
            image: String(payload?.image || ''),
            tone: String(payload?.tone || 'rose'),
        };

        lastTrigger = trigger;

        stage?.classList.remove(...toneClasses);
        stage?.classList.add(`product-tone-${detail.tone}`);

        if (image) {
            image.src = detail.image;
            image.alt = detail.title;
            image.hidden = detail.image === '';
        }

        syncText(type, detail.type, translationValue('portfolio.project', 'Portfolio loyiha'));
        syncText(highlight, detail.highlight, detail.title);
        syncText(title, detail.title, translationValue('portfolio.sample', 'Portfolio namuna'));
        syncText(description, detail.description, translationValue('portfolio.description_soon', 'Portfolio loyihasi tavsifi tez orada to\'ldiriladi.'));
        syncText(typeChip, detail.type, translationValue('portfolio.project', 'Portfolio loyiha'));
        syncText(highlightChip, detail.highlight, detail.title);

        modal.classList.remove('is-hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('is-gallery-open');
        closeButton?.focus();
    };

    closeTargets.forEach((target) => {
        target.addEventListener('click', closeModal);
    });

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-portfolio-modal-open]');

        if (!trigger) {
            return;
        }

        const payload = parseProductPayload(trigger.getAttribute('data-portfolio-modal-payload'));

        if (!payload) {
            return;
        }

        openModal(payload, trigger);
    });

    document.addEventListener('keydown', (event) => {
        if (modal.classList.contains('is-hidden')) {
            return;
        }

        if (event.key === 'Escape') {
            closeModal();
        }
    });
};

const initProductCatalog = () => {
    const grid = document.querySelector('[data-products-grid]');

    if (!grid) {
        return;
    }

    const cards = Array.from(grid.querySelectorAll('[data-product]'));
    const filterButtons = Array.from(document.querySelectorAll('[data-filter]'));
    const searchInput = document.querySelector('[data-search-input]');
    const sortSelect = document.querySelector('[data-sort-select]');
    const resultsCount = document.querySelector('[data-results-count]');
    const emptyState = document.querySelector('[data-empty-state]');
    const categoryCards = Array.from(document.querySelectorAll('[data-category-card]'));
    const collectionTitle = document.querySelector('[data-collection-title]');
    const collectionCopy = document.querySelector('[data-collection-copy]');
    const collectionActiveLabel = document.querySelector('[data-collection-active-label]');
    const collectionActiveCount = document.querySelector('[data-collection-active-count]');
    const collectionActiveCopy = document.querySelector('[data-collection-active-copy]');
    const catalogPanel = document.querySelector('[data-catalog-panel]');
    const catalogMeta = document.querySelector('[data-catalog-meta]');

    const state = {
        filter: 'all',
        search: '',
        sort: sortSelect?.value || 'new',
    };

    const collectionMeta = {
        all: {
            title: collectionTitle?.textContent?.trim() || '',
            copy: collectionCopy?.textContent?.trim() || '',
            label: collectionActiveLabel?.textContent?.trim() || '',
            count: translationValue('catalog.product_count', ':count ta mahsulot', { count: cards.length }),
            activeCopy: collectionActiveCopy?.textContent?.trim() || '',
        },
    };

    categoryCards.forEach((card) => {
        const filter = card.dataset.filterTarget;

        if (!filter) {
            return;
        }

        collectionMeta[filter] = {
            title: card.dataset.title || card.textContent.trim(),
            copy: card.dataset.copy || '',
            label: card.dataset.title || '',
            count: card.dataset.count || '',
            activeCopy: card.dataset.copy || '',
        };
    });

    const sorters = {
        new: (first, second) => Number(second.dataset.newRank) - Number(first.dataset.newRank),
        cheap: (first, second) => Number(first.dataset.price) - Number(second.dataset.price),
        expensive: (first, second) => Number(second.dataset.price) - Number(first.dataset.price),
        popular: (first, second) => Number(second.dataset.popularity) - Number(first.dataset.popularity),
    };

    let requestToken = 0;

    const syncCollectionMeta = (visibleCount) => {
        const meta = collectionMeta[state.filter] || collectionMeta.all;

        if (collectionTitle) {
            collectionTitle.textContent = meta.title;
        }

        if (collectionCopy) {
            collectionCopy.textContent = meta.copy;
        }

        if (collectionActiveLabel) {
            collectionActiveLabel.textContent = meta.label;
        }

        if (collectionActiveCount) {
            collectionActiveCount.textContent = state.filter === 'all'
                ? translationValue('catalog.product_count', ':count ta mahsulot', { count: visibleCount })
                : meta.count;
        }

        if (collectionActiveCopy) {
            collectionActiveCopy.textContent = meta.activeCopy;
        }
    };

    const syncCategoryCards = () => {
        categoryCards.forEach((card) => {
            const isActive = card.dataset.filterTarget === state.filter;
            card.classList.toggle('is-active', isActive);
            card.setAttribute('aria-pressed', isActive ? 'true' : 'false');
        });
    };

    const applyState = () => {
        const filteredCards = cards.filter((card) => {
            const matchesFilter = state.filter === 'all' || card.dataset.category === state.filter;
            const searchText = (card.dataset.search || '').toLowerCase();
            const matchesSearch = searchText.includes(state.search);

            return matchesFilter && matchesSearch;
        });

        const sortedCards = [...filteredCards].sort(sorters[state.sort] || sorters.new);

        sortedCards.forEach((card, index) => {
            card.style.setProperty('--catalog-order', String(index));
            grid.appendChild(card);
        });

        cards.forEach((card) => {
            const isVisible = filteredCards.includes(card);

            card.classList.toggle('is-hidden', !isVisible);

            if (isVisible) {
                pulseElement(card, 'is-filtered-in', 500);
            }
        });

        if (resultsCount) {
            resultsCount.textContent = String(filteredCards.length);
        }

        if (emptyState) {
            emptyState.classList.toggle('is-hidden', filteredCards.length > 0);
        }

        syncCollectionMeta(filteredCards.length);
        syncCategoryCards();
    };

    const requestCatalogSwap = async () => {
        const nextToken = ++requestToken;

        catalogPanel?.classList.add('is-loading');
        catalogMeta?.classList.add('is-loading');
        grid.classList.add('is-loading');

        await new Promise((resolve) => {
            if ('requestAnimationFrame' in window) {
                window.requestAnimationFrame(() => resolve());
                return;
            }

            window.setTimeout(resolve, 16);
        });

        if (nextToken !== requestToken) {
            return;
        }

        applyState();

        catalogPanel?.classList.remove('is-loading');
        catalogMeta?.classList.remove('is-loading');
        grid.classList.remove('is-loading');
    };

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            state.filter = button.dataset.filter || 'all';

            filterButtons.forEach((item) => {
                item.classList.toggle('is-active', item === button);
            });

            requestCatalogSwap();
        });
    });

    categoryCards.forEach((card) => {
        card.addEventListener('click', () => {
            const nextFilter = card.dataset.filterTarget || 'all';
            state.filter = nextFilter;

            filterButtons.forEach((item) => {
                item.classList.toggle('is-active', item.dataset.filter === nextFilter);
            });

            requestCatalogSwap();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', (event) => {
            state.search = event.target.value.trim().toLowerCase();
            applyState();
        });
    }

    if (sortSelect) {
        sortSelect.addEventListener('change', (event) => {
            state.sort = event.target.value;
            requestCatalogSwap();
        });
    }

    applyState();
};

const initCartAndOrder = () => {
    const addToCartButtons = Array.from(document.querySelectorAll('[data-add-to-cart]'));
    const cartItems = document.querySelector('[data-cart-items]');
    const cartEmpty = document.querySelector('[data-cart-empty]');
    const cartCountTargets = Array.from(document.querySelectorAll('[data-cart-count]'));
    const totalQtyTarget = document.querySelector('[data-cart-total-qty]');
    const totalPriceTarget = document.querySelector('[data-cart-total-price]');
    const orderForm = document.querySelector('[data-order-form]');
    const orderSubmit = document.querySelector('[data-order-submit]');
    const orderError = document.querySelector('[data-order-error]');
    const orderSuccess = document.querySelector('[data-order-success]');
    const storageKey = 'suzani-shop-cart';
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const productPayloads = new Map();
    let isSubmitting = false;

    if (!addToCartButtons.length && !orderForm) {
        return;
    }

    addToCartButtons.forEach((button) => {
        const product = parseProductPayload(button.getAttribute('data-add-to-cart'));

        if (!product) {
            return;
        }

        const normalized = normalizeCartItem(product);

        if (normalized.id) {
            productPayloads.set(normalized.id, normalized);
        }
    });

    const localizeCartItem = (item) => {
        const currentProduct = productPayloads.get(item.id);

        if (!currentProduct) {
            return item;
        }

        return {
            ...currentProduct,
            quantity: item.quantity,
        };
    };

    const readCart = () => {
        try {
            const stored = window.localStorage.getItem(storageKey);
            const parsed = stored ? JSON.parse(stored) : [];

            return Array.isArray(parsed)
                ? parsed.map(normalizeCartItem).map(localizeCartItem).filter((item) => item.id && item.title)
                : [];
        } catch {
            return [];
        }
    };

    const writeCart = (cart) => {
        try {
            window.localStorage.setItem(storageKey, JSON.stringify(cart));
        } catch {
            // Ignore storage write failures and keep in-memory state only.
        }
    };

    let cart = readCart();
    writeCart(cart);

    const syncTotals = () => {
        const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
        const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

        cartCountTargets.forEach((target) => {
            target.textContent = String(totalQuantity);
        });

        if (totalQtyTarget) {
            totalQtyTarget.textContent = translationValue('cart.quantity_value', ':count ta', { count: totalQuantity });
        }

        if (totalPriceTarget) {
            totalPriceTarget.textContent = formatMoney(totalPrice);
        }

        if (orderSubmit) {
            orderSubmit.disabled = isSubmitting || cart.length === 0;
        }
    };

    const renderCart = () => {
        if (cartItems) {
            cartItems.innerHTML = cart.map((item) => `
                <article class="cart-item" data-cart-item-id="${escapeHtml(item.id)}">
                    <div class="cart-item-visual">
                        ${item.image_src
                            ? `<img src="${escapeHtml(item.image_src)}" alt="${escapeHtml(item.title)}">`
                            : escapeHtml(item.image_label)}
                    </div>
                    <div class="cart-item-body">
                        <div class="cart-item-head">
                            <h4>${escapeHtml(item.title)}</h4>
                            <span>${escapeHtml(item.category_label || translationValue('product.custom_order', 'Maxsus buyurtma'))}</span>
                        </div>
                        <p>${escapeHtml(item.short_description)}</p>
                        <div class="cart-item-meta">
                            <span>${escapeHtml(translationValue('product.material', 'Material'))}: ${escapeHtml(item.material || '-')}</span>
                            <span>${escapeHtml(translationValue('product.size', 'O\'lcham'))}: ${escapeHtml(item.size || '-')}</span>
                            <span>${escapeHtml(translationValue('product.color', 'Rang'))}: ${escapeHtml(item.color || '-')}</span>
                            <span>${escapeHtml(translationValue('product.lead_time', 'Tayyorlash'))}: ${escapeHtml(item.lead_time || '-')}</span>
                        </div>
                    </div>
                    <div class="cart-item-price">
                        <strong>${formatMoney(item.price * item.quantity)}</strong>
                        <div class="cart-quantity">
                            <button type="button" data-cart-action="decrease">-</button>
                            <span>${item.quantity}</span>
                            <button type="button" data-cart-action="increase">+</button>
                        </div>
                        <button type="button" class="cart-remove" data-cart-action="remove">${escapeHtml(translationValue('cart.remove', 'O\'chirish'))}</button>
                    </div>
                </article>
            `).join('');
        }

        if (cartEmpty) {
            cartEmpty.classList.toggle('is-hidden', cart.length > 0);
        }

        syncTotals();
    };

    const updateCart = (nextCart) => {
        cart = nextCart.map(normalizeCartItem).filter((item) => item.id && item.title);
        writeCart(cart);
        renderCart();
    };

    const addToCart = (product) => {
        const normalized = normalizeCartItem(product);

        if (!normalized.id || !normalized.title) {
            return;
        }

        const existingItem = cart.find((item) => item.id === normalized.id);

        if (existingItem) {
            existingItem.quantity += 1;
            updateCart([...cart]);
        } else {
            updateCart([...cart, normalized]);
        }
    };

    addToCartButtons.forEach((button) => {
        button.addEventListener('click', () => {
            try {
                const product = parseProductPayload(button.getAttribute('data-add-to-cart'));

                if (!product) {
                    return;
                }

                addToCart(product);

                const originalLabel = button.textContent;
                button.textContent = translationValue('product.added', "Qo'shildi");

                pulseElement(button, 'is-success', 700);
                pulseElement(button.closest('.product-card'), 'is-cart-selected', 950);
                cartCountTargets.forEach((target) => pulseElement(target, 'is-pop', 720));

                window.setTimeout(() => {
                    button.textContent = originalLabel;
                }, 1200);
            } catch {
                // Ignore malformed product payloads.
            }
        });
    });

    if (cartItems) {
        cartItems.addEventListener('click', (event) => {
            const target = event.target.closest('[data-cart-action]');
            const itemElement = event.target.closest('[data-cart-item-id]');

            if (!target || !itemElement) {
                return;
            }

            const itemId = itemElement.getAttribute('data-cart-item-id');
            const nextCart = cart.map((item) => ({ ...item }));
            const index = nextCart.findIndex((item) => item.id === itemId);

            if (index === -1) {
                return;
            }

            const action = target.getAttribute('data-cart-action');

            if (action === 'increase') {
                nextCart[index].quantity += 1;
            }

            if (action === 'decrease') {
                nextCart[index].quantity -= 1;
            }

            if (action === 'remove' || nextCart[index].quantity <= 0) {
                nextCart.splice(index, 1);
            }

            updateCart(nextCart);
        });
    }

    if (orderForm) {
        orderForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            if (!cart.length || isSubmitting) {
                return;
            }

            const formData = new FormData(orderForm);
            const payload = Object.fromEntries(formData.entries());

            if (orderError) {
                orderError.classList.add('is-hidden');
                orderError.textContent = '';
            }

            if (orderSuccess) {
                orderSuccess.classList.add('is-hidden');
                orderSuccess.textContent = '';
            }

            isSubmitting = true;
            syncTotals();

            try {
                const response = await fetch(orderForm.getAttribute('action') || '/orders', {
                    method: 'POST',
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        ...payload,
                        items: cart.map((item) => ({
                            id: item.id,
                            title: item.title,
                            price: item.price,
                            quantity: item.quantity,
                            category_label: item.category_label,
                            short_description: item.short_description,
                            full_description: item.full_description,
                            material: item.material,
                            size: item.size,
                            color: item.color,
                            availability: item.availability,
                            lead_time: item.lead_time,
                            image_src: item.image_src,
                            image_label: item.image_label,
                            images: item.images,
                        })),
                    }),
                });

                const data = await response.json();

                if (!response.ok) {
                    const firstError = data?.errors ? Object.values(data.errors).flat()[0] : null;
                    throw new Error(firstError || data?.message || translationValue('cart.submit_error', 'Buyurtmani yuborishda xatolik yuz berdi.'));
                }

                orderForm.reset();
                updateCart([]);

                if (orderSuccess) {
                    orderSuccess.textContent = `${data.message} ${translationValue('cart.order_number', 'Buyurtma raqami: :number.', { number: data.order_number })}`;
                    orderSuccess.classList.remove('is-hidden');
                }
            } catch (error) {
                if (orderError) {
                    orderError.textContent = error instanceof Error
                        ? error.message
                        : translationValue('cart.submit_error', 'Buyurtmani yuborishda xatolik yuz berdi.');
                    orderError.classList.remove('is-hidden');
                }
            } finally {
                isSubmitting = false;
                syncTotals();
            }
        });
    }

    renderCart();
};

const initContactForm = () => {
    const form = document.querySelector('[data-contact-form]');
    const note = document.querySelector('[data-contact-note]');

    if (!form) {
        return;
    }

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        if (note) {
            note.classList.remove('is-hidden');
            pulseElement(note, 'is-success', 1000);
        }
    });
};

let isLanguageSwitching = false;

const initLanguageSwitcher = () => {
    const links = Array.from(document.querySelectorAll('[data-language-switch]'));

    if (!links.length) {
        return;
    }

    const swapPage = (nextDocument, targetUrl) => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const nextDescription = nextDocument.querySelector('meta[name="description"]')?.getAttribute('content');
        const description = document.querySelector('meta[name="description"]');
        const scrollX = window.scrollX;
        const scrollY = window.scrollY;

        document.title = nextDocument.title;
        document.documentElement.lang = nextDocument.documentElement.lang || document.documentElement.lang;

        if (description && nextDescription) {
            description.setAttribute('content', nextDescription);
        }

        document.body.className = nextDocument.body.className;
        document.body.innerHTML = nextDocument.body.innerHTML;

        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);
            document.documentElement.style.colorScheme = currentTheme === 'nocturne' ? 'dark' : 'light';
        }

        bootstrapFrontend();
        window.history.replaceState(null, document.title, targetUrl);
        window.scrollTo(scrollX, scrollY);
    };

    links.forEach((link) => {
        link.addEventListener('click', async (event) => {
            if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || link.target) {
                return;
            }

            event.preventDefault();

            if (isLanguageSwitching || link.classList.contains('is-active')) {
                return;
            }

            isLanguageSwitching = true;
            document.documentElement.classList.add('is-language-switching');
            link.setAttribute('aria-busy', 'true');

            try {
                const localeResponse = await fetch(link.href, {
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (!localeResponse.ok) {
                    throw new Error('Language switch failed.');
                }

                const localeData = await localeResponse.json();
                const targetUrl = localeData.url || window.location.href;
                const pageResponse = await fetch(targetUrl, {
                    headers: {
                        Accept: 'text/html',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (!pageResponse.ok) {
                    throw new Error('Page refresh failed.');
                }

                const html = await pageResponse.text();
                const nextDocument = new DOMParser().parseFromString(html, 'text/html');
                const applySwap = () => swapPage(nextDocument, targetUrl);

                if ('startViewTransition' in document) {
                    await document.startViewTransition(applySwap).finished;
                } else {
                    applySwap();
                }
            } catch {
                window.location.href = link.href;
            } finally {
                isLanguageSwitching = false;
                document.documentElement.classList.remove('is-language-switching');
                link.removeAttribute('aria-busy');
            }
        });
    });
};

const initVendorStack = () => {
    initFlowbite();
    void initSwipers();
};

const bootstrapFrontend = () => {
    initVendorStack();
    initThemeToggle();
    initStickyHeader();
    initRevealEffects();
    initProductGalleries();
    initProductDetailModal();
    initPortfolioModal();
    initProductCatalog();
    initCartAndOrder();
    initContactForm();
    initLanguageSwitcher();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootstrapFrontend);
} else {
    bootstrapFrontend();
}
