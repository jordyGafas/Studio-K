import '@babel/polyfill';
import 'nodelist-foreach-polyfill';
import bowser from 'bowser';
////import swiper from 'swiper/dist/js/swiper.js';
import lazyLoad from './../utils/lazy';
const Blazy = require('blazy');
const withinviewport = require('withinviewport');

/**
 * CASE HOVER STATES
 */
 export const caseHoverStates = () => {

  const caseItems = document.querySelectorAll('.case');

  if ( ! bowser.mobile || ! bowser.tablet ) {

    caseItems.forEach((caseItem, index) => {

     caseItem.addEventListener('mouseover', function() {
       setTimeout(() => {
        this.classList.add('is-active');
        const video = this.querySelector('video');
        video.classList.remove('is-paused');
        if ( video.classList.contains('is-loaded') ) {
          video.play();
        } else {
          var bLazy = new Blazy({
            selector: ".video-lazy",
            successClass: "is-loaded",
            offset: 0
          });
        }
        //this.scrollIntoView({ behavior: "smooth" });
      }, 400);
     });
     caseItem.addEventListener('mouseout', function() {
      setTimeout(() => {
       const video = this.querySelector('video');
       video.classList.add('is-paused');
       video.pause();
       this.classList.remove('is-active');
     }, 0);
    });    

   });

  }

  // if ( bowser.mobile || bowser.tablet ) {
// 
    // caseItems.forEach((caseItem, index) => {
// 
      // caseItem.addEventListener('touchstart', function() {
        // setTimeout(() => {
          // this.classList.add('is-active');
          // const video = this.querySelector('video');
          // video.classList.remove('is-paused');
          // if ( video.classList.contains('is-loaded') ) {
            // video.play();
          // } else {
            // var bLazy = new Blazy({
              // selector: ".video-lazy",
              // successClass: "is-loaded",
              // offset: 0
            // });
          // }
        // }, 500);
      // });
// 
      // caseItem.addEventListener('touchend', function() {
        // setTimeout(() => {
         // const video = this.querySelector('video');
         // video.classList.add('is-paused');
         // video.pause();
         // this.classList.remove('is-active');
        // }, 500);
      // }); 
// 
    // });
// 
  // }

}

/**
 * HERO VIDEO
 */
 export const heroVideo = () => {

  const hero = document.querySelector('.hero');
  const heroVideoSrc = hero.querySelector('video');

  const heroInView = () => {

    const heroInfo = hero.getBoundingClientRect();
    const heroInfoHeight = heroInfo.height;
    const scrollPos = window.scrollY;

    if ( withinviewport( hero, { top: -heroInfoHeight } ) ) {
      hero.classList.remove('is-paused');
      if ( heroVideoSrc.classList.contains('is-loaded') ) {
        heroVideoSrc.play();
      }
    } else {
      hero.classList.add('is-paused');
      heroVideoSrc.pause();
    }

  }
  heroInView();

}

/**
 * VIDEOS SLIDER
 */
 export const introNavSlider = () => {

  const introNavSliderSrc = document.querySelector('.js-intro-nav-slider');

  var introNavSlider1 = new Swiper(introNavSliderSrc, {
    slidesPerView: 'auto',
    spaceBetween: 50,
    infinite: false,
    speed: 600,
    navigation: {
      nextEl: '.intro-nav-next',
      prevEl: '.intro-nav-prev'
    },
  });

}

/**
 * QUOTES SLIDER
 */
 export const quotesSlider = () => {

  const quotesSliderImagesSrc = document.querySelector('.js-quotes-slider-images');
  const quotesSliderQuotesSrc = document.querySelector('.js-quotes-slider-quotes');

  var quotesSliderImages = new Swiper(quotesSliderImagesSrc, {
    slidesPerView: 1,
    simulateTouch: false,
    allowTouchMove: false,
    draggable: false,
    speed: 600,
  });

  var quotesSliderQuotes = new Swiper(quotesSliderQuotesSrc, {
    slidesPerView: 1,
    simulateTouch: false,
    allowTouchMove: false,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    speed: 600,
    pagination: {
      el: '.quotes-pagination',
      type: 'bullets',
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + '</span>';
      }
    }
  });

  quotesSliderQuotes.on('slideChange', function() {
    const activeIndex = quotesSliderQuotes.activeIndex;
    quotesSliderImages.slideTo(activeIndex);
    lazyLoad();
  });

  quotesSliderImages.on('slideChange', function() {
    const activeIndex = quotesSliderImages.activeIndex;
    quotesSliderQuotes.slideTo(activeIndex);
  });

}

/**
 * STICKY ELEMENTS
 */
 export const stickyElements = () => {

  const wrap = document.querySelector('html');
  const pageNav = document.querySelector('.page-nav');
  const casesContent = document.querySelector('.cases');
  const casesContentOffset = casesContent.offsetTop;
  const quotes = document.querySelector('.quotes');
  const windowOffset = window.innerWidth / 3;
  const quotesContentOffset = quotes.offsetTop - windowOffset;

  if ( casesContent != null ) {

    const stickyElementsClasses = () => {

      let scrollpos = window.scrollY;
      if ( scrollpos >= casesContentOffset ) {
        wrap.classList.add('sticky-is-active');
      } else {
        wrap.classList.remove('sticky-is-active');
      }

    }
    stickyElementsClasses();

    const casesScrollBottom = () => {

      let scrollpos = window.scrollY;
      if ( scrollpos >= quotesContentOffset ) {
        pageNav.classList.add('is-hidden');
      } else {
        pageNav.classList.remove('is-hidden');
      }

    }
    casesScrollBottom();

  }

}
