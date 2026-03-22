//jQuery to collapse the navbar on scroll
$(window).scroll(function () {
  if ($(".navbar").offset().top > 50) {
    $(".navbar-fixed-top").addClass("top-nav-collapse");
  } else {
    $(".navbar-fixed-top").removeClass("top-nav-collapse");
  }
});

//easing scrolling
//no easing /jquery UI needed
$(function () {
  $("a[href*=#]:not([href=#])").click(function () {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      var hashstring = this.hash.slice(1);
      target = target.length ? target : $("[name=" + hashstring + "]");
      if (target.length) {
        $("html,body")
          .stop()
          .animate(
            {
              scrollTop: target.offset().top - 100,
            },
            1000,
            function () {
              location.hash = hashstring; //attach the hash (#jumptarget) to the pageurl
            }
          );
        return false;
      }
    }
  });
});
