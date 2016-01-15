jQuery(document).ready(function($) {

    // Color Scheme Options - These array names should match
    // the values in color_scheme of options.php
    
    // Vibrant Color Options
    var vibrant = new Array();
    vibrant['color1']='#07dfff';
    vibrant['color2']='#3cff07';
    vibrant['color3']='#fcff00';
    vibrant['color4']='#ff0090';
    
    // Light Color Options
    var pastel = new Array();
    pastel['color1']='#87cff4';
    pastel['color2']='#80e09e';
    pastel['color3']='#f9ffb5';
    pastel['color4']='#ffb5d3';
    
    // Light Color Options
	var light = new Array();
    light['color1']='#bfe7ef';
    light['color2']='#d2e8cd';
	light['color3']='#fbfbd7';
	light['color4']='#f9efef';
    
    // When the select box #base_color_scheme changes
    // of_update_color updates each of the color pickers
    $('#color_scheme').change(function() {
        colorscheme = $(this).val();
        if (colorscheme == 'vibrant') { colorscheme = vibrant; }
        if (colorscheme == 'pastel') { colorscheme = pastel; }
        if (colorscheme == 'light') { colorscheme = light; }
        for (id in colorscheme) {
            of_update_color(id,colorscheme[id]);
        }
    });
    
    // This does the heavy lifting of updating all the colorpickers and text
    function of_update_color(id,hex) {
        $('#' + id).wpColorPicker('color',hex);
    }
});
