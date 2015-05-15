(function($) {
  console.log('eclipseguy: testing for typekit load status');

  var $container;

  function triggerMasonry() {

    if ( !$container ) {
      return
    }

    console.log('eclipseguy: container initialized, loading masonry...');
    $container.packery({
      itemSelector: '.masonryitem',
    });
  };

  $(function(){
    $container = $('.masonrywrapper');
    // // trigger masonry on doc ready
    console.log('eclipseguy: ...attempting to trigger masonry');
    triggerMasonry();
  });

  // trigger masonry when fonts have loaded
  Typekit.load({
    active: triggerMasonry,
    inactive: triggerMasonry
  });


  $('.masonrywrapper').imagesLoaded( function() {
    console.log('slurpees');
    triggerMasonry();
  });

})(jQuery);




