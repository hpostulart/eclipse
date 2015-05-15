(function($) {

  $(function() {
    var masonryInit = true; // set Masonry init flag



    $.fn.almComplete = function(alm){ // Ajax Load More callback function
      if($('.masonrywrapper').length){
        var $container = $('.masonrywrapper ul'); // our container

        function triggerPackery(){
          console.log('triggering packery');
          $container.packery('reloadItems');
        }

        if(masonryInit){
          // initialize Masonry only once
          masonryInit = false;
          $container.packery({
            itemSelector: '.masonryitem'
          });

          Typekit.load({
            active: triggerPackery,
            inactive: triggerPackery
          });

        }else{
            // $container.packery('reloadItems'); // Reload masonry items oafter callback
            triggerPackery();
        }
        $container.imagesLoaded( function() { // When images are loaded, fire masonry again.
          $container.packery();
        });
      }
    };
  });

})(jQuery);