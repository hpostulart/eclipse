(function($) {
 // trip report nav follow scroll
  var $sidebar   = $("#trip-report-nav-pusher"),
      $window    = $(window),
      offset     = $sidebar.offset(),
      topPadding = 75;

  $window.scroll(function() {
      if ($window.scrollTop() > offset.top) {
          $sidebar.stop().animate({
              paddingTop: $window.scrollTop() - offset.top + topPadding
          });
      } else {
          $sidebar.stop().animate({
              paddingTop: 0
          });
      }
  });


})(jQuery); // Fully reference jQuery after this point.
