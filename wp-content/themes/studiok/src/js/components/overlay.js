import "@babel/polyfill";
import "nodelist-foreach-polyfill";
//import swiper from "swiper/dist/js/swiper.js";
import bowser from "bowser";
var Blazy = require("blazy");

export const overlayCases = () => {
  const wrap = document.querySelector("html"),
    overlay = document.querySelector(".js-c-overlay"),
    overlayOpen = document.querySelector(".js-c-overlay-open"),
    overlayShade = overlay.querySelector(".js-c-overlay-shade"),
    overlayClose = overlay.querySelector(".js-c-overlay-close"),
    overlayHeader = overlay.querySelector(".js-c-overlay-header"),
    overlaySlider = overlay.querySelector(".js-c-overlay-slider"),
    overlayDrag = overlay.querySelector(".js-c-overlay-drag"),
    overlayDragDrag = overlay.querySelector(".drag"),
    overlayLegal = overlay.querySelector(".js-c-overlay-legal"),
    overlaySliderContainer = overlay.querySelector(
      ".js-c-overlay-slider-container"
    );

  function reInitBlazy() {
    var bLazyOverlay = new Blazy({
      selector: ".overlay-lazy",
      container: ".js-c-overlay-slider",
      successClass: "is-loaded"
    });
  }

  function overlayToggleOpen() {
    wrap.classList.add("c-overlay-active");
  }

  function overlayToggleClose() {
    wrap.classList.add("c-overlay-leaving");
    setTimeout(() => {
      wrap.classList.remove("c-overlay-leaving");
      wrap.classList.remove("c-overlay-active");
    }, 900);
  }

  overlayOpen.addEventListener("click", function() {
    overlayToggleOpen();
  });

  overlayClose.addEventListener("click", function() {
    overlayToggleClose();
  });

  var overlaySlider2 = new Swiper(overlaySlider, {
    slidesPerView: "auto",
    grabCursor: true,
    spaceBetween: 100,
    slideToClickedSlide: true,
    watchSlidesVisibility: true,
    preloadImages: false,
    iOSEdgeSwipeThreshold: 100,
    preloadImages: false,
    lazy: true,
    navigation: {
      nextEl: ".overlay-next",
      prevEl: ".overlay-prev"
    },
    breakpoints: {
      640: {
        centeredSlides: true,
        slidesPerView: "auto",
        spaceBetween: 20
      },
      1280: {
        spaceBetween: 80
      }
    }
  });

  overlaySlider2.on("slideChange", function() {
    reInitBlazy();
  });
  overlaySlider2.on("touchMove", function() {
    document.querySelector(".swiper-container").classList.add("is-dragged");
  });
  overlaySlider2.on("touchEnd", function() {
    document.querySelector(".swiper-container").classList.remove("is-dragged");
  });
};

export const casesHoverStates = () => {
  const caseItems = document.querySelectorAll(".swiper-slide-case");

  if (!bowser.mobile || !bowser.tablet) {
    caseItems.forEach((caseItem, index) => {
      caseItem.addEventListener("mouseover", function() {
        const link = this.querySelector(".case-tile");
        const video = this.querySelector("video");
        link.classList.add("is-hover");
        video.classList.remove("is-paused");
        if (video.classList.contains("is-loaded")) {
          video.play();
        } else {
          var bLazy = new Blazy({
            selector: ".video-lazy",
            container: "#case-tile-" + index,
            successClass: "is-loaded",
            offset: 0
          });
        }
      });
      caseItem.addEventListener("mouseout", function() {
        const video = this.querySelector("video");
        const link = this.querySelector(".case-tile");
        link.classList.remove("is-hover");
        video.classList.add("is-paused");
        video.pause();
      });
    });
  }
};

/**
 * SIDEMENU BUTTON
 */
export const sideMenuButton = () => {
  const button = document.querySelector(".mnuicon");
  const buttonClose = document.querySelector(".menu-icon");
  const bodyWrapper = document.querySelector("body");
  if (button) {
    button.addEventListener(
      "click",
      function() {
        console.log("click");
        bodyWrapper.classList.add("nav-open");
      },
      false
    );
  }

  if (buttonClose) {
    buttonClose.addEventListener(
      "click",
      function() {
        console.log("click");
        bodyWrapper.classList.remove("nav-open");
      },
      false
    );
  }
};
