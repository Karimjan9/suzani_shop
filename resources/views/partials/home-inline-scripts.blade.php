<script>
    (() => {
        const formatMoney = (value) => `${new Intl.NumberFormat('uz-UZ').format(Number(value) || 0)} so'm`;

        const escapeHtml = (value) => String(value ?? '')
            .replaceAll('&', '&amp;')
            .replaceAll('<', '&lt;')
            .replaceAll('>', '&gt;')
            .replaceAll('"', '&quot;')
            .replaceAll("'", '&#39;');

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

            galleries.forEach((gallery) => {
                const panels = Array.from(gallery.querySelectorAll('[data-gallery-panel]'));
                const label = gallery.querySelector('[data-gallery-active-label]');
                const previousButton = gallery.querySelector('[data-gallery-prev]');
                const nextButton = gallery.querySelector('[data-gallery-next]');

                if (!panels.length || !label) {
                    return;
                }

                let activeIndex = Math.max(0, panels.findIndex((panel) => panel.classList.contains('is-active')));
                let autoRotateId = null;

                const setActive = (index) => {
                    activeIndex = (index + panels.length) % panels.length;

                    panels.forEach((panel, panelIndex) => {
                        const isActive = panelIndex === activeIndex;

                        panel.classList.toggle('is-active', isActive);
                        panel.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                        panel.tabIndex = isActive ? 0 : -1;
                    });

                    label.textContent = panels[activeIndex].dataset.galleryLabel || panels[activeIndex].textContent.trim();
                };

                const stopAutoRotate = () => {
                    if (autoRotateId) {
                        window.clearInterval(autoRotateId);
                        autoRotateId = null;
                    }
                };

                const startAutoRotate = () => {
                    if (panels.length < 2) {
                        return;
                    }

                    stopAutoRotate();
                    autoRotateId = window.setInterval(() => {
                        setActive(activeIndex + 1);
                    }, 4200);
                };

                panels.forEach((panel, index) => {
                    panel.addEventListener('click', () => {
                        setActive(index);
                        startAutoRotate();
                    });
                });

                previousButton?.addEventListener('click', () => {
                    setActive(activeIndex - 1);
                    startAutoRotate();
                });

                nextButton?.addEventListener('click', () => {
                    setActive(activeIndex + 1);
                    startAutoRotate();
                });

                gallery.addEventListener('mouseenter', stopAutoRotate);
                gallery.addEventListener('mouseleave', startAutoRotate);

                setActive(activeIndex);
                startAutoRotate();
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
                        const rawProduct = button.getAttribute('data-add-to-cart');

                        if (!rawProduct) {
                            return;
                        }

                        addToCart(JSON.parse(rawProduct));

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

        const bootstrapFrontend = () => {
            initStickyHeader();
            initRevealEffects();
            initProductGalleries();
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
