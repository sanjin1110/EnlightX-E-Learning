$(document).ready(function() {
  // executes when HTML-Document is loaded and DOM is ready
  // Most Popular Course Card Hover Effect
  $(".card").hover(
    function() {
      $(this)
        .addClass("shadow")
        .css("cursor", "pointer");
    },
    function() {
      $(this).removeClass("shadow");
    }
  );

  // Change Navbar Color on Scroll
  // $(window).scrollTop() returns the position of the top of the page

  $(window).scroll(function() {
    if ($(window).scrollTop() >= 635) {
      $(".navbar").css("background-color", "#0c186e");
    } else {
      $(".navbar").css("background-color", "#0c186e");
    }
  });

  $(function() {
    $("#playlist li").on("click", function() {
      $("#videoarea").attr({
        src: $(this).attr("movieurl")
      });
    });
    $("#videoarea").attr({
      src: $("#playlist li")
        .eq(0)
        .attr("movieurl")
    });
  });
});
