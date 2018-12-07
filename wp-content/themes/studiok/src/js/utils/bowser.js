import bowser from 'bowser';

const browserClasses = () => {

  if (bowser.mobile) {
    document.querySelector('html').classList.add('is-mobile');
  } else if (bowser.tablet) {
    document.querySelector('html').classList.add('is-tablet');
  } else {
    document.querySelector('html').classList.add('is-desktop');
  }
  if (bowser.msedge) {
    document.querySelector('html').classList.add('is-edge');
  }
  if (bowser.msie) {
    document.querySelector('html').classList.add('is-ie');
  }

}

export default browserClasses
