/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */




(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);








  // eclipseguy scripts! ---------------------------------------------------


  // fix CPT parent page highlighting when deeper in CPT section

  if ($("body").hasClass("single-reports")) {   // single-products is the name of my template page for the custom post type
    $("li.menu-item-3156").removeClass("current_page_parent");   // Removes the class current_page_parent from the <li> with the page-id of the Blog (News)
    $("li.menu-item-3169").addClass("current_page_parent");   // Adds the class current_page_parent to the <li> with the page-id of the Products page
  }

  if ($("body").hasClass("single-videos")) {   // single-products is the name of my template page for the custom post type
    $("li.menu-item-3156").removeClass("current_page_parent");   // Removes the class current_page_parent from the <li> with the page-id of the Blog (News)
    $("li.menu-item-3152").addClass("current_page_parent");   // Adds the class current_page_parent to the <li> with the page-id of the Products page
  }

  if ($("body").hasClass("category-blog")) {   // single-products is the name of my template page for the custom post type
    $("li.menu-item-3156").removeClass("current_page_parent");   // Removes the class current_page_parent from the <li> with the page-id of the Blog (News)
    // $("li.menu-item-3169").addClass("current_page_parent");   // Adds the class current_page_parent to the <li> with the page-id of the Products page
  }

})(jQuery); // Fully reference jQuery after this point.
