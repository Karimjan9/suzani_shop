import './bootstrap';
import '../css/admin.css';
import '../scss/admin.scss';
import Alpine from 'alpinejs';
import { initDropdowns } from 'flowbite';

window.Alpine = Alpine;
Alpine.start();

let adminSwiperDependenciesPromise;

const loadAdminSwiperDependencies = async () => {
    if (!adminSwiperDependenciesPromise) {
        adminSwiperDependenciesPromise = Promise.all([
            import('swiper'),
            import('swiper/modules'),
            import('swiper/css'),
            import('swiper/css/pagination'),
        ]).then(([swiperModule, modules]) => ({
            Swiper: swiperModule.default,
            modules,
        }));
    }

    return adminSwiperDependenciesPromise;
};

const initAdminTheme = () => {
    const storageKey = 'suzani-shop-theme';
    const metaTheme = document.querySelector('meta[name="theme-color"]');
    const palette = {
        atelier: '#1f120e',
        nocturne: '#171c28',
    };

    const normalizeTheme = (value) => value === 'nocturne' ? 'nocturne' : 'atelier';

    const applyTheme = (value) => {
        const theme = normalizeTheme(value);

        document.documentElement.setAttribute('data-theme', theme);
        document.documentElement.style.colorScheme = 'dark';

        if (metaTheme) {
            metaTheme.setAttribute('content', palette[theme] || palette.atelier);
        }

        document.querySelectorAll('[data-admin-theme-toggle]').forEach((toggle) => {
            toggle.setAttribute('data-active-theme', theme);
            toggle.setAttribute('aria-pressed', theme === 'nocturne' ? 'true' : 'false');
        });
    };

    applyTheme(document.documentElement.getAttribute('data-theme'));

    document.querySelectorAll('[data-admin-theme-toggle]').forEach((toggle) => {
        if (toggle.dataset.themeReady === 'true') {
            return;
        }

        toggle.dataset.themeReady = 'true';

        toggle.addEventListener('click', () => {
            const currentTheme = normalizeTheme(document.documentElement.getAttribute('data-theme'));
            const nextTheme = currentTheme === 'nocturne' ? 'atelier' : 'nocturne';

            applyTheme(nextTheme);

            try {
                window.localStorage.setItem(storageKey, nextTheme);
            } catch {}
        });
    });
};

const initAdminSwipers = async () => {
    const elements = Array.from(document.querySelectorAll('[data-admin-swiper]'))
        .filter((element) => element.dataset.swiperReady !== 'true' && element.dataset.swiperReady !== 'loading');

    if (!elements.length) {
        return;
    }

    elements.forEach((element) => {
        element.dataset.swiperReady = 'loading';
    });

    try {
        const {
            Swiper,
            modules: { Autoplay, Pagination },
        } = await loadAdminSwiperDependencies();

        elements.forEach((element) => {
            new Swiper(element, {
                modules: [Autoplay, Pagination],
                slidesPerView: 1.08,
                spaceBetween: 16,
                autoplay: {
                    delay: 5000,
                },
                pagination: {
                    el: element.parentElement?.querySelector('.swiper-pagination'),
                    clickable: true,
                },
                breakpoints: {
                    960: {
                        slidesPerView: 2.05,
                    },
                },
            });

            element.dataset.swiperReady = 'true';
        });
    } catch {
        elements.forEach((element) => {
            delete element.dataset.swiperReady;
        });
    }
};

const bootAdminUi = () => {
    initAdminTheme();
    initDropdowns();
    void initAdminSwipers();
};

document.addEventListener('DOMContentLoaded', bootAdminUi);
document.addEventListener('livewire:init', bootAdminUi);
