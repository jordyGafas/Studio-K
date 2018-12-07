/*-----------------------------------------
  IMPORT CSS
  -----------------------------------------*/

import css from "./css/app.css";

/*-----------------------------------------
  IMPORT JS
  -----------------------------------------*/
require("@babel/polyfill");
import "nodelist-foreach-polyfill";
import browserClasses from "./js/utils/bowser";
import lazyLoad from "./js/utils/lazy";
import scrollAnimations from "./js/vendor/scrollAnimations";
import { openSlides } from "./js/utils/openSlides";
////import swiper from "swiper";
import { gaEvents } from "./js/utils/gaEvents";

/*-----------------------------------------
  INIT
  -----------------------------------------*/

var singleProductSliderInit = function() {
  console.log("test");
  var singleProductSlider = new Swiper(".js-single-product-slider", {
    slidesPerView: 1,
    allowTouchMove: true,
    navigation: {
      nextEl: ".single-product-slider-next",
      prevEl: ".single-product-slider-prev"
    },
    preloadImages: false,
    lazy: {
      loadPrevNext: false
    }
  });

  var singleProductThumbs = new Swiper(".js-single-product-thumbs", {
    slidesPerView: 1,
    allowTouchMove: true,
    navigation: {
      nextEl: ".single-product-slider-next",
      prevEl: ".single-product-slider-prev"
    },
    preloadImages: false,
    lazy: {
      loadPrevNext: false
    }
  });

  if (singleProductSlider) {
    //singleProductSlider.controller.control = singleProductThumbs;
  }
  //singleProductThumbs.controller.control = singleProductSlider;

  var singleProductThumbs = new Swiper(".js-video-text-slider", {
    slidesPerView: 1,
    allowTouchMove: true,
    navigation: {
      nextEl: ".single-video-slider-next",
      prevEl: ".single-video-slider-prev"
    },
    preloadImages: false,
    lazy: {
      loadPrevNext: false
    }
  });
};

const panda = {
  init: function() {
    browserClasses();
    lazyLoad();
    //barbaInit();
    singleProductSliderInit();
    openSlides();
    scrollAnimations();
    gaEvents();
  }
};
panda.init();
