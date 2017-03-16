/* PRELOADER */
$(window).bind("load", function() {
  $('#preloaderContainer').delay("300").fadeOut("200");
});

$(document).ready(function(){
  $('.scrollTo').on('click', function() { // Au clic sur un élément
    var page = $(this).attr('target-id'); // Page cible
    var speed = 750; // Durée de l'animation (en ms)
    $('html, body').animate( { scrollTop: $(page).offset().top-75 }, speed ); // Go
    return false;
  });


  $('span.dropdown-toggle').on('click', function (event) {
    $(this).parent().toggleClass('open');
  });
  $('body').on('click', function (e) {
    if (!$('span.dropdown-toggle').parent().is(e.target) && !$('button.dec').is(e.target) && $('span.dropdown-toggle').parent().has(e.target).length === 0) {
      $('span.dropdown-toggle').parent().removeClass('open')
    }
  });

  if (!$("#navbar").hasClass("in") && ($(window).width() < 751)) {
    $( ".navbar-collapse.collapse" ).addClass( "in" );
  }
  if ($("#navbar").hasClass("in") && ($(window).width() > 751)) {
    $( ".navbar-collapse.collapse" ).removeClass( "in" );
  }
  if (($(window).width() > 751))
  $(".nav-content .nav.navbar-nav.navbar-right.cart").css("display", "none");
  else
  $(".nav-content .nav.navbar-nav.navbar-right.cart").css("display", "block");

  $(window).resize(function() {
    if (($(window).width() > 751))
    $(".nav-content .nav.navbar-nav.navbar-right.cart").css("display", "none");
    else
    $(".nav-content .nav.navbar-nav.navbar-right.cart").css("display", "block");
    if (!$("#navbar").hasClass("in") && ($(window).width() < 751)) {
      $( ".navbar-collapse.collapse" ).addClass( "in" );
    }
    if ($("#navbar").hasClass("in") && ($(window).width() > 751)) {
      $( ".navbar-collapse.collapse" ).removeClass( "in" );
    }
    if (!$("#navbar").hasClass("in") && ($(window).width() > 751)) {
      $(".navbar ul li.cardToShow").css("display", "none");
    }
  });

  var controller = new ScrollMagic.Controller();

  /* logo size */
  var scene = new ScrollMagic.Scene({
    offset: 100
  })
  .setTween(".logo", 0.2, {width: "25%"});

  /* li display */
  // var scene2 = new ScrollMagic.Scene({
  //   offset: 1
  // })
  // .setTween("#navbar li", 0.2, {display: "block"});

  controller.addScene([
    scene,
    // scene2
  ]);
});
