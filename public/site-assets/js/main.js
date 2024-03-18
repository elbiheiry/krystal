/* Loading 
================================*/
$(window).on("load", function () {
  "use strict";
  AOS.init({
    offset: 100,
    duration: 500,
    easing: "ease-in-out",
  });
  $(".loader").fadeOut(function () {
    $(this).parent().fadeOut();
    $("body").css({
      "overflow-y": "visible",
    });
  });
});


/* General
===================================*/
$(document).ready(function () {
  "use strict";
  // Counter
  $(".timer").countTo();
  // Select2
  $(".select").select2();
  // Close Modal
  $(".fixed_alert .icon_link").click(function () {
    $(".fixed_alert").hide();
  });
  // Owl
  $(".owl-carousel").owlCarousel({
    loop: false,
    nav: false,
    dots: true,
    smartSpeed: 2500,
    autoplayHoverPause: true,
    margin: 25,
    navText: [
      '<i class="fas fa-angle-left"></i>',
      '<i class="fas fa-angle-right"></i>',
    ],
    autoplay: true,
    responsive: {
      0: {
        items: 1,
      },
      577: {
        items: 2,
        margin: 10,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 3,
      },
    },
  });
  $(".filter_btn").click(function () {
    $(".toggle-container").toggleClass("move");
  });
  // Up
  var scrollbutton = $(".up_btn");
  $(window).scroll(function () {
    $(this).scrollTop() >= 1000
      ? scrollbutton.addClass("show")
      : scrollbutton.removeClass("show");
  });
  scrollbutton.click(function () {
    $("html , body").animate(
      {
        scrollTop: 0,
      },
      600
    );
  });
});
