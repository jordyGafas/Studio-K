import '@babel/polyfill';
import 'nodelist-foreach-polyfill';
import bowser from 'bowser';
import Player from '@vimeo/player';
//import swiper from 'swiper/dist/js/swiper.js';
var Blazy = require("blazy");
const withinviewport = require('withinviewport');

export const articleHero = () => {

  const singleHero = document.querySelector('.single-article__hero');
  const singleHeroSrc = singleHero.querySelector('video');

  const singleHeroInView = () => {

    const singleHeroInfo = singleHero.getBoundingClientRect();
    const singleHeroInfoHeight = singleHeroInfo.height;

    if ( withinviewport( singleHero, { top: -singleHeroInfoHeight } ) ) {
      singleHero.classList.remove('is-paused');
      if ( singleHeroSrc.classList.contains('is-loaded') ) {
        singleHeroSrc.play();
      }
    } else {
      singleHero.classList.add('is-paused');
      singleHeroSrc.pause();
    }

  }

  window.addEventListener('resize', singleHeroInView);
  window.addEventListener('scroll', singleHeroInView);

}

export const articleBlockVideo = () => {

  const blockVideoVimeos = document.querySelectorAll('.js-block-video-vimeo');
  const blockVideoYouTubes = document.querySelectorAll('.js-block-video-youtube');
  const blockVideoLazys = document.querySelectorAll('.js-block-video-lazy');
  const blockVideos = document.querySelectorAll('.js-block-video');
	const blockImages = document.querySelectorAll('.js-block-image');
  const blockQuotes = document.querySelectorAll('.js-block-quote');
  const blockParagraphs = document.querySelectorAll('.js-block-paragraph');
  const aFooter = document.querySelector('.l-footer');
  const _html = document.querySelector('html');

  if ( blockVideoVimeos != null ) {

    blockVideoVimeos.forEach(( blockVideoVimeo, index ) => {

      const blockVideoVimeoImage = blockVideoVimeo.querySelector('.js-block-video-trigger');

      const modalVideo = document.querySelector('.js-modal-video');
      const modalVideoSrc = modalVideo.querySelector('.js-video-vimeo');
      const modalVideoClose = modalVideo.querySelector('.js-video-close');

      const modalVideoPlayer = new Player(modalVideoSrc, {
        id: modalVideoSrc.dataset.id,
        width: 900,
        background: false
      });

      blockVideoVimeoImage.addEventListener('click', function() {
        //blockVideoVimeo.classList.add('is-active');
        //blockVideoVimeo.classList.add('is-playing');
        // if ( ! bowser.mobile || ! bowser.tablet ) {
        //   blockVideoVimeo.scrollIntoView({ behavior: "smooth", block: "start", inline: "start" });
        // }
        // setTimeout(function() {
        //   aFooter.classList.remove('is-active');
        // }, 1000);
        _html.classList.add('c-modal-is-active');
        modalVideoPlayer.play().then(function() {
        }).catch(function(error) {
          //console.log('Error playing video.' + error);
        });
      });

      modalVideoClose.addEventListener('click', function() {
        _html.classList.remove('c-modal-is-active');
        modalVideoPlayer.pause().then(function() {
        }).catch(function(error) {
          //console.log('Error playing video.' + error);
        });
      });

      // blockVideoPlayer.on('pause', function(data) {
      //   blockVideoVimeo.classList.remove('is-active');
      //   blockVideoVimeo.classList.remove('is-playing');
      // });

      // blockVideoPlayer.on('ended', function(data) {
      //   blockVideoVimeo.classList.remove('is-active');
      //   blockVideoVimeo.classList.remove('is-playing');
      // });

    });

  }

}

export const articleQuotesSlider = () => {

  const articleQuotesSliderSrc = document.querySelector('.js-article-quotes-slider');
  const quoteSliderGraphicHead = document.querySelector('.graphic-head');
  const quoteSliderGraphicBody = document.querySelector('.graphic-body');

  var articleQSlider = new Swiper(articleQuotesSliderSrc, {
    slidesPerView: 1,
    simulateTouch: false,
    speed: 0,
    navigation: {
      nextEl: '.article-quotes-next',
      prevEl: '.article-quotes-prev',
    },
    pagination: {
      el: '.article-quotes-pagination',
      type: 'bullets',
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + '</span>';
      }
    }
  });

}

export const articleAdvicePanels = () => {

  const wrap = document.querySelector('html');

  const panelWerknemer = document.querySelector('.c-panel--werknemer');
  const panelWerknemerInner = panelWerknemer.querySelector('.c-panel__inner');
  const panelWerknemerOpen = document.querySelector('.js-c-panel-werknemer-open');
  const panelWerknemerClose = document.querySelector('.js-c-panel-werknemer-close');

  const panelWerkgever = document.querySelector('.c-panel--werkgever');
  const panelWerkgeverInner = panelWerkgever.querySelector('.c-panel__inner');
  const panelWerkgeverOpen = document.querySelector('.js-c-panel-werkgever-open');
  const panelWerkgeverClose = document.querySelector('.js-c-panel-werkgever-close');

  // PANEL WERKNEMER
  panelWerknemerOpen.addEventListener('click', function(e) {
    e.preventDefault();
    wrap.classList.add('c-panel-active');
    panelWerknemer.classList.add('is-active');
  });
  panelWerknemerClose.addEventListener('click', function() {
    wrap.classList.remove('c-panel-active');
    panelWerknemer.classList.remove('is-active');
  });

  // PANEL WERKGEVER
  panelWerkgeverOpen.addEventListener('click', function(e) {
    e.preventDefault();
    wrap.classList.add('c-panel-active');
    panelWerkgever.classList.add('is-active');
  });
  panelWerkgeverClose.addEventListener('click', function() {
    wrap.classList.remove('c-panel-active');
    panelWerkgever.classList.remove('is-active');
  });

}

export const moreCasesSliderInit = () => {

  const moreCasesSliderSrc = document.querySelector('.js-more-cases-slider');

  var moreCasesSlider = new Swiper(moreCasesSliderSrc, {
    slidesPerView: 'auto',
    grabCursor: true,
    spaceBetween: 100,
    slideToClickedSlide: true,
    watchSlidesVisibility: true,
    preloadImages: false,
    iOSEdgeSwipeThreshold: 100,
    navigation: {
      nextEl: '.more-cases-next',
      prevEl: '.more-cases-prev'
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

  moreCasesSlider.on('slideChange', function() {
		var bLazy = new Blazy({
			selector: ".lazy",
			successClass: "is-loaded",
			offset: 0
		});
  });

}

/**
 * STICKY ELEMENTS
 */
export const stickyElementsSingle = () => {

  const wrap = document.querySelector('html');
	const singleArticleHero = document.querySelector('.single-article__hero');
  const singleArticleIntro = document.querySelector('.single-article__intro');
	const singleArticleNumbers = document.querySelector('.block--numbers');

  if ( singleArticleIntro != null ) {

    const singleStickyElementsClasses = () => {

			const singleArticleHeroInfo = singleArticleHero.getBoundingClientRect();
			const singleArticleIntroOffset = singleArticleIntro.getBoundingClientRect();
			const singleArticleNumbersOffset = singleArticleNumbers.getBoundingClientRect();

			let scrollpos = window.scrollY;
      if ( scrollpos >= singleArticleHeroInfo.height ) {
        wrap.classList.add('sticky-is-active');
				wrap.classList.add('sticky-is-active--blue');
      } else {
				wrap.classList.remove('sticky-is-active');
				wrap.classList.remove('sticky-is-active--blue');
			}

    }
    singleStickyElementsClasses();

  }

}
