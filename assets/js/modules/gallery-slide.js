
import Swiper from "swiper/bundle";


const gallery_swiper = new Swiper(".gallery", {
  loop: true,
  slidesPerView: 4,
  centeredSlides: true,
  spaceBetween: 30,
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  }
});

var thumbSwiper = new Swiper(".thumbSwiper", {
  spaceBetween: 20,
  slidesPerView: 4,
  loop: true,

  freeMode: true,
  watchSlidesProgress: true,
});
var product_gallery = new Swiper(".product_gallery", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: thumbSwiper,
  },
});