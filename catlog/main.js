document.addEventListener('DOMContentLoaded', function () {
    const sliders = document.querySelectorAll('.slider');
    
    sliders.forEach(slider => {
        const slides = slider.querySelector('.slides');
        const slideElements = slider.querySelectorAll('.slide');
        const prev = slider.querySelector('.prev');
        const next = slider.querySelector('.next');
        let currentIndex = 0;

        function updateSlider() {
            // Reset all slides' opacity
            slideElements.forEach(slide => slide.classList.remove('active'));

            // Update the position of slides
            slides.style.transform = 'translateX(' + (-currentIndex * 100) + '%)';

            // Set the active class on the current slide
            slideElements[currentIndex].classList.add('active');
        }

        function goToNextSlide() {
            currentIndex = (currentIndex < slideElements.length - 1) ? currentIndex + 1 : 0;
            updateSlider();
        }

        prev.addEventListener('click', function () {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : slideElements.length - 1;
            updateSlider();
        });

        next.addEventListener('click', function () {
            goToNextSlide();
        });

        // Automatically change slides every 5 seconds
        setInterval(goToNextSlide, 5000);

        // Initialize the first slide as active
        updateSlider();
    });
}); 

const navbar = document.getElementById('navbar');
window.onscroll = function () {
    scrollFunction()
}
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        navbar.classList.add('active')
    } else {
        navbar.classList.remove('active')

    }
} 


/* Whatsapp Icon */ 

document.querySelectorAll('.book-now').forEach(button => {
    button.addEventListener('click', openWhatsApp);
});

function openWhatsApp(event) {
  var button = event.target;
  var phoneNumber = '+91 9765254869'; 
  var phoneNumbers = '9765254869';
  var message = encodeURIComponent(button.getAttribute('data-message'));

  var isMobile = /Android/i.test(navigator.userAgent); 

  var isMobiles = /iPhone|iPad|iPod/i.test(navigator.userAgent);

  var whatsappLink = isMobile ?
      'https://wa.me/' + phoneNumber + '?text=' + message :
      'https://web.whatsapp.com/send?phone=' + phoneNumber + '&text=' + message; 

      var whatsappLinks = isMobiles ?
      'https://wa.me/' + phoneNumbers + '?text=' + message :
      'https://web.whatsapp.com/send?phone=' + phoneNumber + '&text=' + message;

  window.open(whatsappLink, '_blank'); 

  window.open(whatsappLinks, '_blank');

  setTimeout(function() {
      window.location.href = '';
  }, 2000);
}




