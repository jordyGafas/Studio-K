import '@babel/polyfill';
import 'nodelist-foreach-polyfill';
var Blazy = require("blazy");
//import swiper from 'swiper/dist/js/swiper.js';
import bowser from 'bowser';

export const overlayCases = () => {

  const wrap = document.querySelector('html'),
    overlay = document.querySelector('.js-c-overlay'),
    overlayOpen = document.querySelector('.js-c-overlay-open'),
		overlayShade = overlay.querySelector('.js-c-overlay-shade'),
    overlayClose = overlay.querySelector('.js-c-overlay-close'),
		overlayHeader = overlay.querySelector('.js-c-overlay-header'),
    overlaySlider = overlay.querySelector('.js-c-overlay-slider'),
		overlayDrag = overlay.querySelector('.js-c-overlay-drag'),
    overlayDragDrag = overlay.querySelector('.drag'),
    overlayLegal = overlay.querySelector('.js-c-overlay-legal'),
		overlaySliderContainer = overlay.querySelector('.js-c-overlay-slider-container');
		
  function reInitBlazy() {
    var bLazyOverlay = new Blazy({
      selector: '.overlay-lazy',
      container: '.js-c-overlay-slider',
      successClass: 'is-loaded',
    });
  };

	function clearProperties() {
		TweenLite.set(overlay, { clearProps: "all" });
		TweenLite.set(overlayShade, { clearProps: "all" });
		TweenLite.set(overlayHeader, { clearProps: "all" });
		TweenLite.set(overlaySliderContainer, { clearProps: "all" });
		TweenLite.set(overlayDrag, { clearProps: "all" });
		TweenLite.set(overlayClose, { clearProps: "all" });
    TweenLite.set(overlayLegal, { clearProps: "all" });
		wrap.classList.remove('c-overlay-active');
    overlayDragDrag.classList.remove('is-active');
	}

 //  const overlayTimeline = new TimelineLite({ paused: true });

	// overlayTimeline
	// 	.to(overlayShade, 0.5, { xPercent: -100, ease: Quint.easeOut })
	// 	.to(overlayHeader, 0.4, { y: 0, opacity: 1, ease: Quint.easeOut }, '-=0.2')
	// 	.to(overlaySliderContainer, 0.5, { x: 0, opacity: 1, ease: Quint.easeOut, onComplete: reInitBlazy() }, '-=0.2')
	// 	.to(overlayDrag, 0.5, { y: 0, opacity: 1, ease: Quint.easeOut }, '-=0.1')
	// 	.to(overlayClose, 0.3, { x: 0, opacity: 1, ease: Quint.easeOut }, '+=0.3')
 //    .to(overlayLegal, 0.3, { y: 0, opacity: 1, ease: Quint.easeOut }, '+=0');

  function overlayToggleOpen() {
    wrap.classList.add('c-overlay-active');
  //   overlayDragDrag.classList.add('is-active');
		// overlayTimeline.play().timeScale(1);
  }

  function overlayToggleClose() {
    wrap.classList.add('c-overlay-leaving');
    // overlayTimeline.reverse().timeScale(2);
    // setTimeout(() => {
    //   clearProperties()
    // }, 1000);
    setTimeout(() => {
      wrap.classList.remove('c-overlay-leaving');
      wrap.classList.remove('c-overlay-active');
    }, 1000);
  }

	overlayOpen.addEventListener("click", function() {
	  overlayToggleOpen();
	});

  overlayClose.addEventListener("click", function() {
    overlayToggleClose();
  });

  var overlaySlider2 = new Swiper(overlaySlider, {
    slidesPerView: 'auto',
    grabCursor: true,
    spaceBetween: 100,
    slideToClickedSlide: true,
    watchSlidesVisibility: true,
    preloadImages: false,
    iOSEdgeSwipeThreshold: 100,
		navigation: {
      nextEl: '.overlay-next',
      prevEl: '.overlay-prev',
    },
    breakpoints: {
      640: {
        centeredSlides: true,
        slidesPerView: 'auto',
        spaceBetween: 20
      },
      1280: {
        spaceBetween: 80
      }
    }
  });

	overlaySlider2.on('slideChange', function() {
    reInitBlazy();
  });
  overlaySlider2.on('touchMove', function() {
    document.querySelector('.swiper-container').classList.add('is-dragged');
  });
  overlaySlider2.on('touchEnd', function() {
    document.querySelector('.swiper-container').classList.remove('is-dragged');
  });

}

export const casesHoverStates = () => {

  const caseItems = document.querySelectorAll('.swiper-slide-case');

  if ( ! bowser.mobile || ! bowser.tablet ) {

    caseItems.forEach((caseItem, index) => {
      caseItem.addEventListener('mouseover', function() {
        const link = this.querySelector('.case-tile');
        const video = this.querySelector('video');
        link.classList.add('is-hover');
        video.classList.remove('is-paused');
        if ( video.classList.contains('is-loaded') ) {
          video.play();
        } else {
          var bLazy = new Blazy({
            selector: ".video-lazy",
            container: '#case-tile-'+index,
            successClass: "is-loaded",
            offset: 0
          });
        }
      });
      caseItem.addEventListener('mouseout', function() {
        const video = this.querySelector('video');
        const link = this.querySelector('.case-tile');
        link.classList.remove('is-hover');
        video.classList.add('is-paused');
        video.pause();
      });
    });

  }

}
