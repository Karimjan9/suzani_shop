import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';

export const initSwipers = () => {
    const swiperElements = document.querySelectorAll('[data-swiper]');

    swiperElements.forEach((element) => {
        if (element.dataset.swiperReady === 'true') {
            return;
        }

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
};
