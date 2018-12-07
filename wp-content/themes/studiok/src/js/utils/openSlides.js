import "@babel/polyfill";
import "nodelist-foreach-polyfill";

export const openSlides = () => {
  var slider = document.querySelector(".slide-open-container1");
  var button = document.querySelector(
    ".slide-open-container1 .slide-open-toggle"
  );
  var closedContent = document.querySelector(
    ".slide-open-container1 .slide-open-content"
  );
  var openContent = document.querySelector(
    ".slide-open-container1 .slide-open-content-inner-container"
  );
  console.log("button1", button);

  if (button != null) {
    var old_element = button;
    var new_element = button.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);
    button = document.querySelector(
      ".slide-open-container1 .slide-open-toggle"
    );
    button.addEventListener("click", function() {
      console.log("button1", button);
      console.log("button1", closedContent);
      console.log("button1", openContent);
      closedContent.classList.toggle("closed");
      slider.classList.toggle("closed");
      openContent.classList.toggle("closed");
      button.classList.toggle("closed");
    });
  }

  var slider2 = document.querySelector(".slide-open-container2");
  var button2 = document.querySelector(
    ".slide-open-container2 .slide-open-toggle"
  );
  var closedContent2 = document.querySelector(
    ".slide-open-container2 .slide-open-content"
  );
  var openContent2 = document.querySelector(
    ".slide-open-container2 .slide-open-content-inner-container"
  );
  console.log("button", button2);
  if (button2 != null) {
    old_element = button2;
    new_element = button2.cloneNode(true);
    old_element.parentNode.replaceChild(new_element, old_element);
    button2 = document.querySelector(
      ".slide-open-container2 .slide-open-toggle"
    );
    button2.addEventListener("click", function() {
      closedContent2.classList.toggle("closed");
      slider2.classList.toggle("closed");
      openContent2.classList.toggle("closed");
      button2.classList.toggle("closed");
    });
  }

  var readMore = document.querySelector(".read-more");
  if (readMore != null) {
    readMore.addEventListener("click", function() {
      document.querySelector(".block1 h2").scrollIntoView({
        behavior: "smooth",
        block: "start"
      });
    });
  }
};
