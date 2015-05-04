(function($) {
  console.log('eclipseguy: testing for typekit load status');

  var $container;

  function triggerMasonry() {
    // don't proceed if $container has not selected
    if ( !$container ) {
      return
    }

    console.log('eclipseguy: typekit load done, loading masonry!');
    $container.masonry({
      // options...
      itemSelector: '.masonryitem',
    });
  };

  $(function(){
    $container = $('.masonrywrapper');
    // trigger masonry on doc ready
    // console.log('foo');
    triggerMasonry();
  });

  // trigger masonry when fonts have loaded
  Typekit.load({
    active: triggerMasonry,
    inactive: triggerMasonry
  });
})(jQuery);