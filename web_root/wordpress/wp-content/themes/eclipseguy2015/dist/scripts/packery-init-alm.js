!function(e){e(function(){var a=!0;e.fn.almComplete=function(n){function r(){console.log("triggering packery"),o.packery("reloadItems")}if(e(".masonrywrapper").length){var o=e(".masonrywrapper ul");a?(a=!1,o.packery({itemSelector:".masonryitem"}),Typekit.load({active:r,inactive:r})):r(),o.imagesLoaded(function(){o.packery()})}}})}(jQuery);
//# sourceMappingURL=packery-init-alm.js.map