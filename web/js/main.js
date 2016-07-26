$(window).load(function() {
    $(".loader_inner").fadeOut("slow");
    $(".loader").delay(400).fadeOut("slow");
});

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

});
