(function($) {
 // trip report nav follow scroll
  var $sidebar   = $("#trip-report-nav-pusher"),
      $window    = $(window),
      offset     = $sidebar.offset(),
      topPadding = 75;

  $window.scroll(function() {
      var contentoffset = $(".trip-report-content").offset();
      var contenttop = contentoffset.top;
      var contentheight = $(".trip-report-content").height();

      var navoffset = $(".report-sidenav-inner").offset();
      var navtop = navoffset.top;
      var navheight = $(".report-sidenav-inner").height();

      var contentbottom = contenttop + contentheight;
      var navbottom = navtop + navheight;


      // console.log(navheight); console.log("- - -");

      console.log('content bottom value: ' + contentbottom);
      // console.log(navbottom);



      // console.log('thingy');

      if ( ($window.scrollTop() > offset.top) ) {
         // (contentbottom > navbottom)
          var gotarget = $window.scrollTop() - offset.top + topPadding;

          var gomaxextrap = (gotarget + navheight  + offset.top);
          console.log( 'max extrapolated push: ' + gomaxextrap);

          if( contentbottom >= gomaxextrap ){
            $sidebar.stop().animate({
                paddingTop: gotarget
            });
          }
      } else {
          $sidebar.stop().animate({
              paddingTop: 0
          });
      }

      console.log("------------end iteration-------------");
  });


})(jQuery); // Fully reference jQuery after this point.
