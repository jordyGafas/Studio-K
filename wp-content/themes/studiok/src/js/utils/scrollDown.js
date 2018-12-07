import '@babel/polyfill';
import 'nodelist-foreach-polyfill';
import SmoothScroll from 'smooth-scroll';

export const scrollDownInit = () => {

  const scroll = new SmoothScroll('.smooth-scroll', {
    speed: 1000,
    easing: 'easeInOutQuart'
  });

  const scrollDownButtons = document.querySelectorAll('.js-scroll-down');

  if ( scrollDownButtons != null ) {

    scrollDownButtons.forEach((scrollDownButton, index) => {
      window.addEventListener('scroll', function() {
        let scrollpos = window.scrollY;
        if ( scrollpos >= 200 ) {
          scrollDownButton.classList.add('is-hidden');
        } else {
          scrollDownButton.classList.remove('is-hidden');
        }
      });
    });

  }

}
