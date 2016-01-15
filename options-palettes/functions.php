<?php
/*
 * Note: Options Palettes is a child theme of Options Check
 * So all the functions from the parent theme are also inherited
 */

/*
 * In this theme demo an additional javascript is needed by the
 * Options Panel to switch the colors when someone changes the
 * color_scheme select box option.
 *
 * You can also use this same method for loading any other custom
 * javascript you might want for the options.
 */

if ( is_admin() ) {
    $of_page = 'appearance_page_options-framework';
    add_action( "admin_print_scripts-$of_page", 'optionsframework_custom_js', 0 );
}

/*
 * The script loaded is inside /js/options-custom.js
 * If you are using a parent theme instead of a child theme
 * make sure to use get_template_directory_uri() instead.
 */

function optionsframework_custom_js () {
	wp_enqueue_script(
		'optionsframework_custom_js',
		get_stylesheet_directory_uri() . '/js/options-custom.js',
		array( 'jquery' )
	);
}