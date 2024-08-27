// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Pagination, Navigation } from 'swiper/modules'
// import Swiper and modules styles

const swiper = new Swiper('.swiper', {
    modules: [Pagination, Navigation],
    // Optional parameters
    // direction: 'vertical',
    loop: true,
    // slidesPerView: 1,

    // breakpoints: {
    //     1024: {
    //         slidesPerView: 4,
    //     },
    //     768: {
    //         slidesPerView: 3,
    //     }
    // },
    // If we need pagination
    // pagination: {
    //     el: ".swiper-pagination",
    //     type: "fraction",
    //   },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

const postCat = document.querySelector('.cat_md_ctn');
/////error mide
postCat?.addEventListener('click', (e) => {
    document.querySelector('.cat_md').classList.toggle('d-block')
    document.querySelector('.cat_md').classList.toggle('d-none')
    document.querySelector('.icon-down').classList.toggle('d-none')
    document.querySelector('.icon-up').classList.toggle('d-none')
})



const reply = document.querySelectorAll('.reply a')
reply.forEach(item => {
    item.innerHTML = ` <svg class="icon">
                <use href="#icon-Reply,-Share,-Circle" />
            </svg>`
})
