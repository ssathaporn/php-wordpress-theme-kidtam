jQuery(document).ready(function($){
  var grid = $('.grid');

  // home isotope
  grid.imagesLoaded().progress( function() {
    grid.isotope({
      layoutMode: 'fitRows',
      itemSelector: '.grid-item',
      percentPosition: true
    });
  });

});
