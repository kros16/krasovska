$(function(){

  /* ===fixed nav on scroll=== */  
  $('body').append('<div class="navbar-fixed"></div>'); //fix for chrome scroll

  var nav = $('#mainMenu-collapse'),
      offset = nav.offset();
  $(window).scroll(function() {
      if ($(window).scrollTop() > offset.top) {
          nav.stop().addClass("navbar-fixed");
      }
      else {
          nav.stop().removeClass("navbar-fixed");
      }
  });
  /* ===fixed nav on scroll=== */
  
  /* ===related swiper=== */
  if (typeof(related) != 'undefined') {

    //initialize swiper when document ready  
    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      // direction: 'vertical',
      // pagination: '.swiper-pagination',
      nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
      slidesPerView: 3,
      centeredSlides: true,
      paginationClickable: true,
      spaceBetween: 15,
      autoplay: 2500,
      loop: true
    });
  }
  /* ===related swiper=== */

});
