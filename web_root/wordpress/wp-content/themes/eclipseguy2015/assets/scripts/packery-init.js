(function($) {
  // console.log('eclipseguy: testing for typekit load status');

  // var $container;

  // function triggerMasonry() {

  //   if ( !$container ) {
  //     return
  //   }

  //   console.log('eclipseguy: container initialized, loading masonry...');
  //   $container.packery({
  //     itemSelector: '.masonryitem',
  //   });
  // };

  // $(function(){
  //   $container = $('.masonrywrapper');
  //   // // trigger masonry on doc ready
  //   console.log('eclipseguy: ...attempting to trigger masonry');
  //   triggerMasonry();
  // });

  // // trigger masonry when fonts have loaded
  // Typekit.load({
  //   active: triggerMasonry,
  //   inactive: triggerMasonry
  // });


  // $('.masonrywrapper').imagesLoaded( function() {
  //   console.log('slurpees');
  //   triggerMasonry();
  // });

})(jQuery);




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