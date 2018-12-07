import "@babel/polyfill";
import { Tweenmax, TimelineMax } from "gsap";
import SplitText from "../vendor/SplitText.min";

const IntroStage = () => {
  var $html = document.querySelector("html");
  var $body = document.querySelector("body");
  var intro = document.querySelector(".intro-splash-container");
  var flag;

  var article = document.getElementsByClassName("intro-splash-container");

  if (article[0]) {
    var duration = parseInt(article[0].dataset.duration);
    var text = article[0].dataset.text;

    flag = 1;

    var introTitle = intro.querySelector(".intro__title");
    var introText = intro.querySelector(".intro-splash-text p");
    var introButton = intro.querySelector(".intro__button");
    var allReadersSlide = document.querySelectorAll(".home .all-readers-slide");

    function scrollIntro() {
      $html.classList.add("intro-is-loading");
      window.scrollTo(0, 0);
    }
    function hideIntro() {
      $html.classList.remove("intro-is-active");
      $html.classList.remove("intro-is-loading");
      flag = 0;
    }
    $(".intro-splash-container .logo svg").animate(
      {
        opacity: 1
      },
      500,
      function() {
        if ((flag = 1)) {
          var mySplitText = new SplitText(".intro-splash-text p", {
            type: "words, chars"
          });

          var introTimeline = new TimelineMax();
          var chars = mySplitText.chars;

          TweenLite.set(".intro-splash-text p", { perspective: 600 });

          introTimeline
            .fromTo(introText, 0, { autoAlpha: 0 }, { autoAlpha: 1 })
            .staggerFromTo(
              chars,
              2,
              { opacity: 0, y: -5, rotateY: -10 },
              {
                opacity: 1,
                y: 0,
                rotateY: 0,
                transformOrigin: "0% 50% 50%",
                ease: Back.easeOut
              },
              0.01
            )
            .fromTo(intro, .3, { autoAlpha: 1 }, { autoAlpha: 0 })
            .fromTo(intro, 0, { display: "block" }, { display: "none" });

          // ANIMATE "INTRO" OUT
          var introHideTimeline = new TimelineMax();
        }
      }
    );
  }
};

export default IntroStage;
