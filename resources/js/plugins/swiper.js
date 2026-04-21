let swiperDependenciesPromise;

const loadSwiperDependencies = async () => {
    if (!swiperDependenciesPromise) {
        swiperDependenciesPromise = Promise.all([
            import('swiper'),
            import('swiper/modules'),
            import('swiper/css'),
            import('swiper/css/navigation'),
            import('swiper/css/pagination'),
        ]).then(([swiperModule, modules]) => ({
            Swiper: swiperModule.default,
            modules,
        }));
    }

    return swiperDependenciesPromise;
};

export const initSwipers = async () => {
    const swiperElements = Array.from(document.querySelectorAll('[data-swiper]'))
        .filter((element) => element.dataset.swiperReady !== 'true' && element.dataset.swiperReady !== 'loading');

    if (!swiperElements.length) {
        return;
    }

    swiperElements.forEach((element) => {
        element.dataset.swiperReady = 'loading';
    });

    try {
        const {
            Swiper,
            modules: { Autoplay, Navigation, Pagination },
        } = await loadSwiperDependencies();

        swiperElements.forEach((element) => {
            const autoplay = element.dataset.swiperAutoplay === 'true';

            // A small, reusable initializer so future sliders can be dropped in with data attributes.
            new Swiper(element, {
                modules: [Navigation, Pagination, Autoplay],
                slidesPerView: 1,
                spaceBetween: 24,
                loop: autoplay,
                autoplay: autoplay
                    ? {
                          delay: 3500,
                          disableOnInteraction: false,
                      }
                    : false,
                pagination: {
                    el: element.querySelector('.swiper-pagination'),
                    clickable: true,
                },
                navigation: {
                    nextEl: element.querySelector('.swiper-button-next'),
                    prevEl: element.querySelector('.swiper-button-prev'),
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });

            element.dataset.swiperReady = 'true';
        });
    } catch {
        swiperElements.forEach((element) => {
            delete element.dataset.swiperReady;
        });
    }
};
