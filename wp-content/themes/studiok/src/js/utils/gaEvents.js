import "@babel/polyfill";
import 'nodelist-foreach-polyfill';

export const gaEvents = () => {
  // EVENT TRACKING

  const slidesToggle = document.querySelectorAll('.slide-open-toggle');
  const sliderArrow = document.querySelectorAll('.slider-arrow');
  const youtube = document.querySelectorAll('.ytp-cued-thumbnail-overlay-image');
  const SocialMedia = document.querySelectorAll('.social-links a');
 
  //data-tracking-value
  if ( slidesToggle !== null ) {
  
    slidesToggle.forEach((trackLinkedIn, index) => {
      trackLinkedIn.addEventListener('click', function() {
      console.log("Slides", "toggle");
        gtag('event', 'toggle', {
          'event_category': 'Futur_Mobility_Slides_Toggle',
          'event_label': "Futur_Mobility_"+this.dataset.trackingValue,
        });
        ga('send', 'event', 'Slides Toggle', 'click', this.dataset.trackingValue);
      });
    });
  
  }
  
  if ( sliderArrow !== null ) {
      //console.log("ld", linkedinProfiles);
  
      sliderArrow.forEach((trackEmail, index) => {
      
  
      trackEmail.addEventListener('click', function() {
        console.log("slides", 'slides');
        gtag('event', 'slide', {
          'event_category': 'Futur_Mobility_Sliders',
          'event_label': "Futur_Mobility_"+this.dataset.trackingValue,
        });
      });
    });
  
  }
  

  if ( SocialMedia !== null ) {
    
    SocialMedia.forEach((trackTelephone, index) => {
    trackTelephone.addEventListener('click', function() {
      console.log("social", "share");
      gtag('event', 'shared', {
        'event_category': 'Futur_Mobility_Social_media',
        'event_label': "Futur_Mobility_"+this.dataset.trackingValue,
      });
    });
  });

}
}