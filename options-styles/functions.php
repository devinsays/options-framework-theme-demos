<?php

/*
 * Note: Options Styles is a child theme of Options Framework Theme
 * So all the functions from the parent theme are also inherited
 */

 /*
 * In this demo an additional css file is loaded into the
 * Options Panel in order to override specific default styling
 */

if ( is_admin() ) {
    $of_page = 'appearance_page_options-framework';
    add_action( "admin_print_styles-$of_page", 'optionsframework_custom_css', 100 );
}

/*
 * The css loaded is inside /css/options-custom.css
 * If you are using a parent theme instead of a child theme
 * make sure to use get_template_directory_uri() instead.
 */

function optionsframework_custom_css () {
	wp_enqueue_style(
		'optionsframework-custom-css',
		get_stylesheet_directory_uri() . '/css/options-custom.css'
	);
}