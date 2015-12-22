jQuery(document).ready(function() {

    var images = jQuery('.zoomslide img'); //caches the query when dom is ready
    var CELL_WIDTH = 150;
    
        
    jQuery( "#slider" ).slider({
        step: 5,
        min: 70,
        max: 200,
        value: 100,
        slide: function(event, ui) {
            var size = (CELL_WIDTH * ui.value / 100) + "px";
            images.stop(true).animate({width: size, height: size }, 250);
        }
    });

});