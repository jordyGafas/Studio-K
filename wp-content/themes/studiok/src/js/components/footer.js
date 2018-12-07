import '@babel/polyfill';

export const stickyFooter = () => {

  const aFooter = document.querySelector('.js-footer');

  function stickyFooterClass() {
    const scrollPosY = window.pageYOffset | document.body.scrollTop;
    if ( scrollPosY > 200 ) {
      aFooter.classList.add('is-active');
    } else {
      aFooter.classList.remove('is-active');
    }
  }

  document.addEventListener('scroll', function() {
    stickyFooterClass();
  });

}

export const scrollIndicator = () => {

  const h = document.documentElement,
    b = document.body,
    st = 'scrollTop',
    sh = 'scrollHeight',
    progress_bar = document.querySelector('.progress__bar');

  let scroll;

  function calcScroll() {
    scroll = (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100;
    progress_bar.style.width = scroll + '%';
  }

  document.addEventListener('scroll', function() {
    calcScroll();
  });
  document.addEventListener('resize', function() {
    calcScroll();
  });

}
