/*-----------------------------------------
  IMPORT CSS
  -----------------------------------------*/

import css from "./css/app.css";

/*-----------------------------------------
  IMPORT JS
  -----------------------------------------*/
import "@babel/polyfill";
import "nodelist-foreach-polyfill";
import browserClasses from "./js/utils/bowser";
import lazyLoad from "./js/utils/lazy";
var Blazy = require("blazy");
import IntroStage from "./js/utils/intro";
//import scrollAnimations from "./js/vendor/scrollAnimations";
//import { openSlides } from "./js/utils/openSlides";
////import swiper from "swiper";
//import { gaEvents } from "./js/utils/gaEvents";

/*-----------------------------------------
  INIT
  -----------------------------------------*/

/*!
 * @preserve
 *
 * Readmore.js jQuery plugin
 * Author: @jed_foster
 * Project home: http://jedfoster.github.io/Readmore.js
 * Licensed under the MIT license
 *
 * Debounce function from http://davidwalsh.name/javascript-debounce-function
 */
!(function (t) {
  "function" == typeof define && define.amd ?
    define(["jquery"], t) :
    "object" == typeof exports ?
    (module.exports = t(require("jquery"))) :
    t(jQuery);
})(function (t) {
  "use strict";

  function e(t, e, i) {
    var o;
    return function () {
      var n = this,
        a = arguments,
        s = function () {
          (o = null), i || t.apply(n, a);
        },
        r = i && !o;
      clearTimeout(o), (o = setTimeout(s, e)), r && t.apply(n, a);
    };
  }

  function i(t) {
    var e = ++h;
    return String(null == t ? "rmjs-" : t) + e;
  }

  function o(t) {
    var e = t
      .clone()
      .css({
        height: "auto",
        width: t.width(),
        maxHeight: "none",
        overflow: "hidden"
      })
      .insertAfter(t),
      i = e.outerHeight(),
      o = parseInt(
        e
        .css({
          maxHeight: ""
        })
        .css("max-height")
        .replace(/[^-\d\.]/g, ""),
        10
      ),
      n = t.data("defaultHeight");
    e.remove();
    var a = o || t.data("collapsedHeight") || n;
    t.data({
      expandedHeight: i,
      maxHeight: o,
      collapsedHeight: a
    }).css({
      maxHeight: "none"
    });
  }

  function n(t) {
    if (!d[t.selector]) {
      var e = " ";
      t.embedCSS &&
        "" !== t.blockCSS &&
        (e +=
          t.selector +
          " + [data-readmore-toggle], " +
          t.selector +
          "[data-readmore]{" +
          t.blockCSS +
          "}"),
        (e +=
          t.selector +
          "[data-readmore]{transition: height " +
          t.speed +
          "ms;overflow: hidden;}"),
        (function (t, e) {
          var i = t.createElement("style");
          (i.type = "text/css"),
          i.styleSheet ?
            (i.styleSheet.cssText = e) :
            i.appendChild(t.createTextNode(e)),
            t.getElementsByTagName("head")[0].appendChild(i);
        })(document, e),
        (d[t.selector] = !0);
    }
  }

  function a(e, i) {
    (this.element = e),
    (this.options = t.extend({}, r, i)),
    n(this.options),
      (this._defaults = r),
      (this._name = s),
      this.init(),
      window.addEventListener ?
      (window.addEventListener("load", c),
        window.addEventListener("resize", c)) :
      (window.attachEvent("load", c), window.attachEvent("resize", c));
  }
  var s = "readmore",
    r = {
      speed: 100,
      collapsedHeight: 200,
      heightMargin: 16,
      moreLink: '<a href="#">Read More</a>',
      lessLink: '<a href="#">Close</a>',
      embedCSS: !0,
      blockCSS: "display: block; width: 100%;",
      startOpen: !1,
      blockProcessed: function () {},
      beforeToggle: function () {},
      afterToggle: function () {}
    },
    d = {},
    h = 0,
    c = e(function () {
      t("[data-readmore]").each(function () {
        var e = t(this),
          i = "true" === e.attr("aria-expanded");
        o(e),
          e.css({
            height: e.data(i ? "expandedHeight" : "collapsedHeight")
          });
      });
    }, 100);
  (a.prototype = {
    init: function () {
      var e = t(this.element);
      e.data({
          defaultHeight: this.options.collapsedHeight,
          heightMargin: this.options.heightMargin
        }),
        o(e);
      var n = e.data("collapsedHeight"),
        a = e.data("heightMargin");
      if (e.outerHeight(!0) <= n + a)
        return (
          this.options.blockProcessed &&
          "function" == typeof this.options.blockProcessed &&
          this.options.blockProcessed(e, !1),
          !0
        );
      var s = e.attr("id") || i(),
        r = this.options.startOpen ?
        this.options.lessLink :
        this.options.moreLink;
      e.attr({
          "data-readmore": "",
          "aria-expanded": this.options.startOpen,
          id: s
        }),
        e.after(
          t(r)
          .on(
            "click",
            (function (t) {
              return function (i) {
                t.toggle(this, e[0], i);
              };
            })(this)
          )
          .attr({
            "data-readmore-toggle": s,
            "aria-controls": s
          })
        ),
        this.options.startOpen || e.css({
          height: n
        }),
        this.options.blockProcessed &&
        "function" == typeof this.options.blockProcessed &&
        this.options.blockProcessed(e, !0);
    },
    toggle: function (e, i, o) {
      o && o.preventDefault(),
        e || (e = t('[aria-controls="' + this.element.id + '"]')[0]),
        i || (i = this.element);
      var n = t(i),
        a = "",
        s = "",
        r = !1,
        d = n.data("collapsedHeight");
      n.height() <= d ?
        ((a = n.data("expandedHeight") + "px"), (s = "lessLink"), (r = !0)) :
        ((a = d), (s = "moreLink")),
        this.options.beforeToggle &&
        "function" == typeof this.options.beforeToggle &&
        this.options.beforeToggle(e, n, !r),
        n.css({
          height: a
        }),
        n.on(
          "transitionend",
          (function (i) {
            return function () {
              i.options.afterToggle &&
                "function" == typeof i.options.afterToggle &&
                i.options.afterToggle(e, n, r),
                t(this)
                .attr({
                  "aria-expanded": r
                })
                .off("transitionend");
            };
          })(this)
        ),
        t(e).replaceWith(
          t(this.options[s])
          .on(
            "click",
            (function (t) {
              return function (e) {
                t.toggle(this, i, e);
              };
            })(this)
          )
          .attr({
            "data-readmore-toggle": n.attr("id"),
            "aria-controls": n.attr("id")
          })
        );
    },
    destroy: function () {
      t(this.element).each(function () {
        var e = t(this);
        e
          .attr({
            "data-readmore": null,
            "aria-expanded": null
          })
          .css({
            maxHeight: "",
            height: ""
          })
          .next("[data-readmore-toggle]")
          .remove(),
          e.removeData();
      });
    }
  }),
  (t.fn.readmore = function (e) {
    var i = arguments,
      o = this.selector;
    return (
      (e = e || {}),
      "object" == typeof e ?
      this.each(function () {
        if (t.data(this, "plugin_" + s)) {
          var i = t.data(this, "plugin_" + s);
          i.destroy.apply(i);
        }
        (e.selector = o), t.data(this, "plugin_" + s, new a(this, e));
      }) :
      "string" == typeof e && "_" !== e[0] && "init" !== e ?
      this.each(function () {
        var o = t.data(this, "plugin_" + s);
        o instanceof a &&
          "function" == typeof o[e] &&
          o[e].apply(o, Array.prototype.slice.call(i, 1));
      }) :
      void 0
    );
  });
});

var pandaProjectDescription = function () {
  var description = $(".js-project-description");
  console.log("test")
  if ($(".js-project-description")[0]) {
    $(".js-project-description").readmore({
      speed: 200,
      collapsedHeight: 250,
      moreLink: '<a href="#" class="btn--inline btn--inline-plus">' + 'Read more' + "</a>",
      lessLink: '<a href="#" class="btn--inline btn--inline-min">' + 'Show less' + "</a>",
      afterToggle: function (trigger, element, expanded) {
        if (!expanded) {
          $("html, body").animate({
            scrollTop: $(element).offset().top - 120
          }, {
            duration: 400
          });
        }
      }
    });
  }
};

var initSwiper = function () {

   var swiperHeroImage = new Swiper(".swiper-hero-image", {
    // Optional parameters
    loop: true,
    effect: "fade",
    speed: 300,
    allowTouchMove: false,
    preloadImages: false,
     autoplay: {
      delay: 4000,
    }
  });  

  var swiperAwardsImage = new Swiper(".swiper-awards-image", {
    // Optional parameters
    loop: true,
    allowTouchMove: false,
    preloadImages: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });

  var swiperAwardsText = new Swiper(".swiper-awards-text", {
    // Optional parameters
    loop: true,
    allowTouchMove: false,
    preloadImages: false,
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });

  swiperAwardsImage.params.control = swiperAwardsText;
  swiperAwardsText.params.control = swiperAwardsImage;

  var swiperSplash = new Swiper(".swiper-splash", {
    // Optional parameters
    loop: false,
    simulateTouch: false,
    slidesPerView: "auto",
    preloadImages: false,
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
};

var showText = function (target, message, index, interval) {
  if (index < message.length) {
    $(target).append(message[index++]);
    setTimeout(function () {
      showText(target, message, index, interval);
    }, interval);
  }
};

var startAnimation = function () {
  //$('.intro-splash-container .logo').addClass("visible");
  //$('.intro-splash-container .intro-splash-text').addClass("visible");
  var article = document.getElementsByClassName("intro-splash-container");
  if (article[0]) {
    var duration = parseInt(article[0].dataset.duration);
    var text = article[0].dataset.text;
  }

  $(".intro-splash-container .logo svg").animate({
      opacity: 1
    },
    500,
    function () {
      showText(".intro-splash-container .intro-splash-text p", text, 0, 30);
      setTimeout(function () {
        $(".intro-splash-container").fadeOut(800, function () {});
      }, duration);
    }
  );
};

var sideMenu = function () {
  $(".side-menu-header-inner, .side-menu-overlay").click(function () {
    $(".side-menu").addClass("closed");
    $(".side-menu-overlay").addClass("closed");
    $("body").removeClass("no-scroll");
  });

  $(".header-menu-icon").click(function () {
    $(".side-menu").removeClass("closed");
    $(".side-menu-overlay").removeClass("closed");
    $("body").addClass("no-scroll");
  });
};

var menuScroll = function () {
  $(window.document).scroll(function (e) {
    if ($(window).scrollTop() > 10) {
      $("header").addClass("pin");
    } else {
      $("header").removeClass("pin");
    }

    if ($(".intro-container").length > 0) {
      if ($(window).scrollTop() > $(".intro-container").offset().top - 200) {
        $(".hero-menu").removeClass("visible");
        $(".hero-menu-sticky").addClass("visible");
        $(".button-scroll").addClass("visible");
      } else {
        $(".hero-menu").addClass("visible");
        $(".hero-menu-sticky").removeClass("visible");
        $(".button-scroll").removeClass("visible");
      }
    }
  });
};

var scrollDown = function () {
  $(".hero-menu li.active a").click(function (e) {
    e.preventDefault();
    $([document.documentElement, document.body]).animate({
        scrollTop: $(".intro-container").offset().top - 60
      },
      800
    );
  });

  $(".button-scroll").click(function (e) {
    e.preventDefault();
    $([document.documentElement, document.body]).animate({
        scrollTop: 0
      },
      800
    );
  });
};

const panda = {
  init: function () {
    browserClasses();
    //lazyLoad();
    pandaProjectDescription();
    initSwiper();
    //startAnimation();
    IntroStage();
    sideMenu();
    menuScroll();
    // init Masonry
    var $grid = $(".grid").masonry({
      itemSelector: ".grid-item",
      percentPosition: true,
      columnWidth: ".grid-sizer",
      gutter: 10
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress(function () {
      $grid.masonry();
    });
    var bLazy = new Blazy({
      selector: ".lazy",
      successClass: "is-loaded",
      offset: 300,
      success: function (element) {
        $grid.masonry();
      }
    });
    scrollDown();
    //barbaInit();
    //singleProductSliderInit();
    //openSlides();
    //scrollAnimations();
    //gaEvents();
  }
};
panda.init();