import {url} from "tailwindcss/lib/util/dataTypes";

require('./bootstrap');

console.log('load app.js');

import Alpine from "alpinejs";
Alpine.start()

// import Swiper JS
import Swiper from 'swiper';
// import Swiper styles
import 'swiper/css';

var swiper = new Swiper(".swiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 1,
    autoplay: {
        delay: 2500,
    },
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    scrollbar:{
        el: ".swiper-scrollbar"
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
