// Loading website
var preLoading = document.getElementById('preloading');
function myFuncPreLoading() {
    preLoading.style.display = 'none';
}    
// Typing 
const texts = ['Designer ','Software Developer ', ' UX / UI '];
let count = 0;
let index = 0;
let currentText = '';
let letter = '';
(function type(){
    if(count === texts.length) {
        count = 0; 
    }
    currentText = texts[count];
    letter = currentText.slice(0, ++index);

    document.querySelector('.typing').textContent = letter;
    if(letter.length === currentText.length ) {
        count++;
        index = 0;
    }
    setTimeout(type, 300)
})();

// Slide Show
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("section");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
