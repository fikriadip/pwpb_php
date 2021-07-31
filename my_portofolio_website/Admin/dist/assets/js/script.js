$(document).ready(() => {
  $(window).scroll(() => {
    // STICKY NAVBAR ON SCROLL
    if (this.scrollY > 20) {
      $(".navbar").addClass("sticky");
    } else {
      $(".navbar").removeClass("sticky");
    }

    // SCROLL UP BUTTON SHOW/HIDE
    if (this.scrollY > 500) {
      $(".scroll-up-btn").addClass("show");
    } else {
      $(".scroll-up-btn").removeClass("show");
    }
  });

  // SLIDE UP
  $(".scroll-up-btn").click(() => {
    $("html").animate({ scrollTop: 0 });
    // REMOVING SMOOTH SCROLL ON SLIDE-UP BUTTON CLICK
    $("html").css("scrollBehavior", "auto");
  });

  $(".navbar .menu li a").click(() => {
    // APLLYING AGAIN SMOOTH SCROLL ON MENU ITEMS CLICK
    $("html").css("scrollBehavior", "smooth");
  });

  // TOGGLE MENU NAVBAR
  $(".menu-btn").click(() => {
    $(".navbar .menu").toggleClass("active");
    $(".menu-btn i").toggleClass("active");
  });
  /*===== SCROLL REVEAL ANIMATION =====*/

  // owl carousel script
  $(".carousel").owlCarousel({
    margin: 20,
    loop: true,
    autoplayTimeOut: 2000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: false,
      },
    },
  });
});

// const sr = ScrollReveal({
//     origin: 'top',
//     distance: '80px',
//     duration: 2000,
//     reset: true
// });
