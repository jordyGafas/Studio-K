import '@babel/polyfill';
import 'nodelist-foreach-polyfill';
import { TweenLite } from 'gsap/TweenLite';
import { TimelineLite } from 'gsap/TimelineLite';
//import ScrollMagic from 'scrollmagic';
//require('scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js');
//require('scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js');
const scrollAnimations = () => {

 // init controller
 var controller = new ScrollMagic.Controller();
 var tween = TweenLite.fromTo("#slide1", 1, {backgroundPositionY: "-100px"}, {backgroundPositionY: "0px", ease: Linear.easeNone})
 var tween2 = TweenLite.fromTo(".header-data-container", 1, {y: 0}, {y: 100})
 var tween3 = TweenLite.fromTo(".block5 .background-image", 1, {backgroundPositionY: "0"}, {backgroundPositionY: "40px", ease: Linear.easeNone})
 // build scenes
 new ScrollMagic.Scene({triggerElement: ".slide-open-container1", duration:1000, offset:0})
				 .setTween(tween)
                 .addTo(controller);

new ScrollMagic.Scene({triggerElement: ".block5", duration:800, offset:0})
.setTween(tween3)
.addTo(controller);
                 
new ScrollMagic.Scene({duration:1000, offset:0})
.setTween(tween2)
.addTo(controller);

}

export default scrollAnimations
