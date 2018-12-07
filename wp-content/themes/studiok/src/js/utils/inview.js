import '@babel/polyfill';
import 'nodelist-foreach-polyfill';
const withinviewport = require('withinviewport');

const isInViewCheck = () => {

	const inViewElements = document.querySelectorAll('.js-in-view');

	if ( inViewElements != null ) {

    inViewElements.forEach(( inViewElement, index ) => {

      const inViewElementCheck = () => {
        if ( withinviewport( inViewElement, 'bottom right' ) ) {
          inViewElement.classList.add('is-in-view');
        }
      }

      window.addEventListener('resize', inViewElementCheck);
      window.addEventListener('scroll', inViewElementCheck);

    });

  }

}

export default isInViewCheck