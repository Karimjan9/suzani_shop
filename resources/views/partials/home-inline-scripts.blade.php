<script>
    (() => {
        const formatMoney = (value) => `${new Intl.NumberFormat('uz-UZ').format(Number(value) || 0)} so'm`;

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
            image_label: String(item.image_label || item.images?.[0] || 'Mahsulot'),
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
            const modalStage = modal ? modal.querySelector('[data-gallery-modal-stage]') : null;
            const modalLabel = modal ? modal.querySelector('[data-gallery-modal-label]') : null;
            const modalTitle = modal ? modal.querySelector('[data-gallery-modal-title]') : null;
            const modalCount = modal ? modal.querySelector('[data-gallery-modal-count]') : null;
            const modalProductTitle = modal ? modal.querySelector('[data-gallery-modal-product-title]') : null;
            const modalPrice = modal ? modal.querySelector('[data-gallery-modal-price]') : null;
            const modalCategory = modal ? modal.querySelector('[data-gallery-modal-category]') : null;
            const modalMaterial = modal ? modal.querySelector('[data-gallery-modal-material]') : null;
            const modalSize = modal ? modal.querySelector('[data-gallery-modal-size]') : null;
            const modalDescription = modal ? modal.querySelector('[data-gallery-modal-description]') : null;
            const modalPrev = modal ? modal.querySelector('[data-gallery-modal-prev]') : null;
            const modalNext = modal ? modal.querySelector('[data-gallery-modal-next]') : null;
            const modalCloseTargets = Array.from(document.querySelectorAll('[data-gallery-close]'));
            const toneClasses = ['product-tone-rose', 'product-tone-gold', 'product-tone-teal', 'product-tone-ink', 'product-tone-clay', 'product-tone-sky'];
            const modalState = {
                labels: [],
                index: 0,
                tone: 'rose',
                title: 'Mahsulot galereyasi',
                meta: null,
            };

            const syncModal = () => {
                if (!modalStage || !modalLabel || !modalTitle || !modalCount || !modalState.labels.length) {
                    return;
                }

                modalStage.classList.remove(...toneClasses);
                modalStage.classList.add(`product-tone-${modalState.tone}`);
                modalTitle.textContent = modalState.title;
                modalLabel.textContent = modalState.labels[modalState.index] || 'Rasm';
                modalCount.textContent = `${modalState.index + 1} / ${modalState.labels.length}`;

                if (modalProductTitle) {
                    modalProductTitle.textContent = modalState.meta?.title || modalState.title;
                }

                if (modalPrice) {
                    modalPrice.textContent = modalState.meta?.price || '';
                }

                if (modalCategory) {
                    modalCategory.textContent = modalState.meta?.category || '';
                }

                if (modalMaterial) {
                    modalMaterial.textContent = modalState.meta?.material || '';
                }

                if (modalSize) {
                    modalSize.textContent = modalState.meta?.size || '';
                }

                if (modalDescription) {
                    modalDescription.textContent = modalState.meta?.description || '';
                }
            };

            const closeModal = () => {
                if (!modal) {
                    return;
                }

                modal.classList.add('is-hidden');
                modal.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('is-gallery-open');
            };

            const openModal = (labels, index, tone, title, meta = null) => {
                if (!modal || !labels.length) {
                    return;
                }

                modalState.labels = labels;
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
                if (!modalState.labels.length) {
                    return;
                }

                modalState.index = (modalState.index + direction + modalState.labels.length) % modalState.labels.length;
                syncModal();
            };

            if (modalPrev) {
                modalPrev.addEventListener('click', () => stepModal(-1));
            }

            if (modalNext) {
                modalNext.addEventListener('click', () => stepModal(1));
            }

            modalCloseTargets.forEach((target) => target.addEventListener('click', closeModal));
            document.addEventListener('keydown', (event) => {
                if (!modal || modal.classList.contains('is-hidden')) {
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
                const counter = gallery.querySelector('[data-gallery-counter]');
                const previousButton = gallery.querySelector('[data-gallery-prev]');
                const nextButton = gallery.querySelector('[data-gallery-next]');
                const openButton = gallery.querySelector('[data-gallery-open]');
                const tone = gallery.dataset.galleryTone || 'rose';
                const title = gallery.dataset.galleryTitle || 'Mahsulot galereyasi';
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

                    const activeLabel = items[activeIndex].dataset.galleryLabel || items[activeIndex].textContent.trim();

                    labels.forEach((label) => {
                        label.textContent = activeLabel;
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

                if (openButton) {
                    openButton.addEventListener('click', () => {
                        openModal(
                            items.map((item) => item.dataset.galleryLabel || item.textContent.trim()),
                            activeIndex,
                            tone,
                            title,
                            meta,
                        );
                    });
                }

                setActive(activeIndex);
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

                if (lastTrigger && typeof lastTrigger.focus === 'function') {
                    lastTrigger.focus();
                }

                lastTrigger = null;
            };

            const openModal = (payload, trigger) => {
                const detail = {
                    title: String((payload && payload.title) || 'Portfolio namuna'),
                    type: String((payload && payload.type) || 'Portfolio loyiha'),
                    highlight: String((payload && payload.highlight) || (payload && payload.title) || 'To\'liq ko\'rinish'),
                    description: String((payload && payload.description) || 'Portfolio loyihasi tavsifi tez orada to\'ldiriladi.'),
                    image: String((payload && payload.image) || ''),
                    tone: String((payload && payload.tone) || 'rose'),
                };

                lastTrigger = trigger;

                if (stage) {
                    stage.classList.remove(...toneClasses);
                    stage.classList.add(`product-tone-${detail.tone}`);
                }

                if (image) {
                    image.src = detail.image;
                    image.alt = detail.title;
                    image.hidden = detail.image === '';
                }

                syncText(type, detail.type, 'Portfolio loyiha');
                syncText(highlight, detail.highlight, detail.title);
                syncText(title, detail.title, 'Portfolio namuna');
                syncText(description, detail.description, 'Portfolio loyihasi tavsifi tez orada to\'ldiriladi.');
                syncText(typeChip, detail.type, 'Portfolio loyiha');
                syncText(highlightChip, detail.highlight, detail.title);

                modal.classList.remove('is-hidden');
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('is-gallery-open');

                if (closeButton) {
                    closeButton.focus();
                }
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
                sort: sortSelect ? sortSelect.value : 'new',
            };

            const collectionMeta = {
                all: {
                    title: 'Har bir xonaga mos kolleksiyalar va qulay tanlov',
                    copy: 'Kategoriya kartasining o\'zini bosing. Sahifa yangilanmaydi, mahsulotlar shu joyning o\'zida yumshoq almashadi va siz ortiqcha qadam qilmasdan tanlovni davom ettirasiz.',
                    label: 'Barchasi',
                    count: `${cards.length} ta mahsulot`,
                    activeCopy: 'Barcha asosiy kolleksiyalar ochiq. Suzani, stol bezagi, tekstil va sovg\'alarni bir joyda ko\'ring.',
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
                        ? `${visibleCount} ta mahsulot`
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

                const sortedCards = filteredCards.slice().sort(sorters[state.sort] || sorters.new);

                sortedCards.forEach((card, index) => {
                    card.style.setProperty('--catalog-order', String(index));
                    grid.appendChild(card);
                });

                cards.forEach((card) => {
                    const isVisible = filteredCards.indexOf(card) !== -1;

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

                if (catalogPanel) {
                    catalogPanel.classList.add('is-loading');
                }

                if (catalogMeta) {
                    catalogMeta.classList.add('is-loading');
                }

                grid.classList.add('is-loading');

                await new Promise((resolve) => window.setTimeout(resolve, 280));

                if (nextToken !== requestToken) {
                    return;
                }

                applyState();

                if (catalogPanel) {
                    catalogPanel.classList.remove('is-loading');
                }

                if (catalogMeta) {
                    catalogMeta.classList.remove('is-loading');
                }

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
            let isSubmitting = false;

            if (!addToCartButtons.length && !orderForm) {
                return;
            }

            const readCart = () => {
                try {
                    const stored = window.localStorage.getItem(storageKey);
                    const parsed = stored ? JSON.parse(stored) : [];

                    return Array.isArray(parsed) ? parsed.map(normalizeCartItem).filter((item) => item.id && item.title) : [];
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

            const syncTotals = () => {
                const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
                const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

                cartCountTargets.forEach((target) => {
                    target.textContent = String(totalQuantity);
                });

                if (totalQtyTarget) {
                    totalQtyTarget.textContent = `${totalQuantity} ta`;
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
                            <div class="cart-item-visual">${escapeHtml(item.image_label)}</div>
                            <div class="cart-item-body">
                                <div class="cart-item-head">
                                    <h4>${escapeHtml(item.title)}</h4>
                                    <span>${escapeHtml(item.category_label || 'Maxsus buyurtma')}</span>
                                </div>
                                <p>${escapeHtml(item.short_description)}</p>
                                <div class="cart-item-meta">
                                    <span>Material: ${escapeHtml(item.material || '-')}</span>
                                    <span>O'lcham: ${escapeHtml(item.size || '-')}</span>
                                    <span>Rang: ${escapeHtml(item.color || '-')}</span>
                                    <span>Tayyorlash: ${escapeHtml(item.lead_time || '-')}</span>
                                </div>
                            </div>
                            <div class="cart-item-price">
                                <strong>${formatMoney(item.price * item.quantity)}</strong>
                                <div class="cart-quantity">
                                    <button type="button" data-cart-action="decrease">-</button>
                                    <span>${item.quantity}</span>
                                    <button type="button" data-cart-action="increase">+</button>
                                </div>
                                <button type="button" class="cart-remove" data-cart-action="remove">O'chirish</button>
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
                    updateCart(cart.slice());
                } else {
                    updateCart(cart.concat(normalized));
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
                        button.textContent = "Qo'shildi";

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
                                    image_label: item.image_label,
                                    images: item.images,
                                })),
                            }),
                        });

                        const data = await response.json();

                        if (!response.ok) {
                            const firstError = data?.errors ? Object.values(data.errors).flat()[0] : null;
                            throw new Error(firstError || data?.message || 'Buyurtmani yuborishda xatolik yuz berdi.');
                        }

                        orderForm.reset();
                        updateCart([]);

                        if (orderSuccess) {
                            orderSuccess.textContent = `${data.message} Buyurtma raqami: ${data.order_number}.`;
                            orderSuccess.classList.remove('is-hidden');
                        }
                    } catch (error) {
                        if (orderError) {
                            orderError.textContent = error instanceof Error
                                ? error.message
                                : 'Buyurtmani yuborishda xatolik yuz berdi.';
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

        const initThemeToggle = () => {
            const storageKey = 'suzani-shop-theme';
            const defaultTheme = 'atelier';
            const themeMetaColors = {
                atelier: '#f5efe6',
                nocturne: '#211918',
            };

            const normalizeTheme = (value) => value === 'nocturne' ? 'nocturne' : defaultTheme;
            const toggles = Array.from(document.querySelectorAll('[data-theme-toggle]'));

            if (!toggles.length) {
                return;
            }

            const syncThemeUi = (theme) => {
                const safeTheme = normalizeTheme(theme);
                const metaTheme = document.querySelector('meta[name="theme-color"]');

                document.documentElement.setAttribute('data-theme', safeTheme);
                document.documentElement.style.colorScheme = safeTheme === 'nocturne' ? 'dark' : 'light';

                if (metaTheme) {
                    metaTheme.setAttribute('content', themeMetaColors[safeTheme] || themeMetaColors.atelier);
                }

                toggles.forEach((toggle) => {
                    toggle.setAttribute('data-active-theme', safeTheme);
                    toggle.setAttribute('aria-pressed', safeTheme === 'nocturne' ? 'true' : 'false');

                    const status = toggle.querySelector('[data-theme-toggle-status]');

                    if (status) {
                        status.textContent = safeTheme === 'nocturne'
                            ? (toggle.dataset.themeDarkStatus || 'Nocturne mode is active')
                            : (toggle.dataset.themeLightStatus || 'Atelier mode is active');
                    }
                });
            };

            syncThemeUi(document.documentElement.getAttribute('data-theme'));

            toggles.forEach((toggle) => {
                toggle.addEventListener('click', () => {
                    const currentTheme = normalizeTheme(document.documentElement.getAttribute('data-theme'));
                    const nextTheme = currentTheme === 'nocturne' ? defaultTheme : 'nocturne';

                    syncThemeUi(nextTheme);

                    try {
                        window.localStorage.setItem(storageKey, nextTheme);
                    } catch {
                        // Ignore storage issues and keep theme in memory.
                    }
                });
            });
        };

        const bootstrapFrontend = () => {
            initThemeToggle();
            initStickyHeader();
            initRevealEffects();
            initProductGalleries();
            initPortfolioModal();
            initProductCatalog();
            initCartAndOrder();
            initContactForm();
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bootstrapFrontend);
        } else {
            bootstrapFrontend();
        }
    })();
</script>
