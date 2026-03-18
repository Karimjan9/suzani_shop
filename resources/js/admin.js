import './bootstrap';
import '../css/admin.css';
import '../scss/admin.scss';
import Alpine from 'alpinejs';
import { initDropdowns } from 'flowbite';
import Swiper from 'swiper';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

window.Alpine = Alpine;
Alpine.start();

const initAdminSwipers = () => {
    document.querySelectorAll('[data-admin-swiper]').forEach((element) => {
        if (element.dataset.swiperReady === 'true') {
            return;
        }

        element.dataset.swiperReady = 'true';

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
    });
};

const bootAdminUi = () => {
    initDropdowns();
    initAdminSwipers();
};

document.addEventListener('DOMContentLoaded', bootAdminUi);
document.addEventListener('livewire:init', bootAdminUi);
