import "@babel/polyfill";
import Barba from "barba.js";
import bowser from "bowser";
import lazyLoad from "./utils/lazy";
import { scrollIndicator, stickyFooter } from "./components/footer";
import { sideMenuButton } from "./components/overlay";
import { openSlides } from "./utils/openSlides";
import { TweenLite } from "gsap/TweenLite";
import { CSSPlugin } from "gsap/CSSPlugin";
import { TimelineLite } from "gsap/TimelineLite";
import Rellax from "./vendor/rellax.js";
import scrollAnimations from "./vendor/scrollAnimations";

//import swiper from "swiper";
// Single Product Slider
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

export const barbaInit = () => {
  let lastClickEl;
  const _html = document.documentElement;
  const _body = document.body;

  //sideMenuButton();
  /* ----------------------------------
    VIEWS
  ---------------------------------- */
  //singleProductSliderInit();
  // HOME VIEW
  const homeView = Barba.BaseView.extend({
    namespace: "home",
    onEnter: function() {
      _body.classList.add("is-home");
      console.log("prev home", localStorage.getItem("prev"));
      if (localStorage.getItem("prev") == "home") {
        document.querySelector(".block9").scrollIntoView({
          behavior: "instant",
          block: "start"
        });
      }
    },
    onEnterCompleted: function() {
      _html.classList.add("home-is-loaded");
      stickyFooter();
      scrollIndicator();
      sideMenuButton();
      singleProductSliderInit();
      openSlides();
      //var rellax = new Rellax('.rellax');
      scrollAnimations();
      localStorage.setItem("prev", "");
    },
    onLeave: function() {
      //removeAllEventListeners();
      _body.classList.remove("nav-open");
    },
    onLeaveCompleted: function() {}
  });

  // ARTICLE VIEW
  const articleView = Barba.BaseView.extend({
    namespace: "article",
    onEnter: function() {
      _body.classList.add("is-article");
      console.log("prev stat", Barba.HistoryManager.prevStatus());
      localStorage.setItem("prev", "");
      if (Barba.HistoryManager.prevStatus()!=null) {
        if (Barba.HistoryManager.prevStatus().namespace == "home") {
          console.log("Bingo");
          localStorage.setItem("prev", "home");
        }
      }
    },
    onEnterCompleted: function() {
      _html.classList.add("article-is-loaded");
      stickyFooter();
      scrollIndicator();
      sideMenuButton();
    },
    onLeave: function() {
      _body.classList.remove("is-article");
      _html.classList.remove("article-is-loaded");
      _body.classList.remove("nav-open");
      console.log("prev stat", Barba.HistoryManager.prevStatus().namespace);
    },
    onLeaveCompleted: function() {
    }
  });

  // PAGE VIEW
  const pageView = Barba.BaseView.extend({
    namespace: "page",
    onEnter: function() {
      _body.classList.add("is-page");
    },
    onEnterCompleted: function() {
      _html.classList.remove("c-overlay-active");
      _html.classList.add("page-is-loaded");
      stickyFooter();
      scrollIndicator();
      sideMenuButton();
    },
    onLeave: function() {
      _body.classList.remove("is-page");
      _html.classList.remove("page-is-loaded");
      _body.classList.remove("nav-open");
    },
    onLeaveCompleted: function() {}
  });

  // INIT VIEWS
  homeView.init();
  articleView.init();
  pageView.init();

  // Google Analytics
  // NL
  if (document.documentElement.lang === "nl") {
    Barba.Dispatcher.on("initStateChange", function() {
      if (window.ga) {
        //gtag('config', 'UA-74211934-19', { 'page_path': location.pathname });
      }
    });
  }
  // FR
  if (document.documentElement.lang === "fr") {
    Barba.Dispatcher.on("initStateChange", function() {
      if (window.ga) {
        //gtag('config', 'UA-74211934-20', { 'page_path': location.pathname });
      }
    });
  }

  /* ----------------------------------
  TRANSITION FUNCTIONS
  ---------------------------------- */

  // FADE TRANSITION
  var fadeTransition = Barba.BaseTransition.extend({
    start: function() {
      Promise.all([this.newContainerLoading, this.fadeOut()]).then(
        this.fadeIn.bind(this)
      );
    },
    fadeOut: function() {
      //showLoader();
      const oldContainer = this.oldContainer;
      return TweenLite.fromTo(
        oldContainer,
        0.6,
        { visibility: "visible", autoAlpha: 1 },
        {
          autoAlpha: 0,
          visibility: "hidden",
          delay: 0.8
        }
      );
    },
    fadeIn: function() {
      var _this = this;
      var _new = this.newContainer;
      var _old = this.oldContainer;

      TweenLite.fromTo(
        _new,
        0.6,
        { visibility: "hidden", autoAlpha: 0 },
        {
          autoAlpha: 1,
          visibility: "visible",
          delay: 0.4,
          onStart: function() {},
          onComplete: function() {
            if (window.pageYOffset > 0) {
              if (
                localStorage.getItem("prev") == "home" &&
                Barba.HistoryManager.currentStatus().namespace != "article"
              ) {
                localStorage.setItem("prev", "");
              } else {
                window.scrollTo(0, 0);
              }
            }
            TweenLite.set(_old, {
              display: "none"
            });
            _this.done();
          }
        }
      );
    }
  });

  const init = () => {
    Barba.Pjax.init();
    Barba.Prefetch.init();
    Barba.Pjax.getTransition = function() {
      return fadeTransition;
    };
    Barba.Pjax.start();
  };

  init();
};
