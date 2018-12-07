import '@babel/polyfill';
import { TweenLite } from 'gsap/TweenLite';
import { CSSPlugin } from 'gsap/CSSPlugin';
// import { TweenLite, AttrPlugin, CSSPlugin } from 'gsap/all';
// const activated = [
//     TweenLite,
//     AttrPlugin,
//     CSSPlugin
// ];

export const hitLinkInit = () => {

	let isHover;
	const mouse = { x: 0, y: 0, sx: 0, sy: 0 }
	const windowWidthHalf = 0,
		windowHeightHalf = 0,
		windowWidth = 0,
		windowHeight = 0;

	var hover = document.querySelectorAll('.js-hover');
	for (var i = 0; i < hover.length; i++) {
		
		hover[i].addEventListener('mousemove', function(e) {
			var it = this.getElementsByClassName('js-hover-it');
			var w = this.clientWidth;
			var h = this.clientHeight;
			var rect = this.getBoundingClientRect();
			var x = rect.left;
			var y = rect.top;
			var dx = (mouse.sx - x) / w - 0.5;
			var dy = (mouse.sy - y) / h - 0.5;
			if (it.length) {
				TweenLite.to(it, 0.2, {
					x: dx * w * 0.4,
					y: dy * h * 0.4,
				});
			}
		}, false);
		hover[i].addEventListener('mouseleave', function(e) {
			this.classList.remove('is-hover');
			var it = this.getElementsByClassName('js-hover-it');
			TweenLite.to(it, 0.4, {
				x: 0,
				y: 0,
			});
			isHover = false;
		}, false);
	}

	document.documentElement.onmousemove = function(e) {
    var x = e.clientX;
    var y = e.clientY;
    var cx = (x - windowWidthHalf) / windowWidthHalf;
    var cy = (y - windowHeightHalf) / windowHeightHalf;
    var fx = x / windowWidth;
    var fy = y / windowHeight;
    mouse.sx = x;
    mouse.sy = y;
    mouse.scx = cx;
    mouse.scy = cy;
	}

}
