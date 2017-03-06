/* PRELOADER */
$(window).bind("load", function() {
  $('#preloaderContainer').delay("1000").fadeOut("200");
});

$('span.dropdown-toggle').on('click', function (event) {
  $(this).parent().toggleClass('open');
});
$('body').on('click', function (e) {
  // if ($('button.dec').is(e.target)) {
  //   alert("detecté")
  // }
  if (!$('span.dropdown-toggle').parent().is(e.target) && !$('button.dec').is(e.target) && $('span.dropdown-toggle').parent().has(e.target).length === 0) {
    $('span.dropdown-toggle').parent().removeClass('open')
  }
});
