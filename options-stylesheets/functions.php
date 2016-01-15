<?php

/*
 * Note: Options Stylesheets is a child theme of Options Check
 * So all the functions from the parent theme are also inherited
 */

 /*
 * The CSS file selected in the options panel 'stylesheet' option
 * is loaded on the theme front end
 *
 * If you'd prefer to use the 'auto_stylesheet' option, replace
 * of_get_option('stylesheet') with of_get_option('auto_stylesheet')
 *
 * If the "Default" option is selected, "0" is returned (equivalent to false),
 * which means no files will be registered or enqueued
 */

function options_stylesheets_alt_style()   {
	if ( of_get_option( 'stylesheet' ) ) {
		wp_enqueue_style( 'options_stylesheets_alt_style', of_get_option('stylesheet'), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'options_stylesheets_alt_style' );

/**
 * Returns an array of all files in $directory_path of type $filetype.
 *
 * The $directory_uri + file name is used for the key
 * The file name is the value
 */

function options_stylesheets_get_file_list( $directory_path, $filetype, $directory_uri ) {
	$alt_stylesheets = array();
	$alt_stylesheet_files = array();
	if ( is_dir( $directory_path ) ) {
		$alt_stylesheet_files = glob( $directory_path . "*.$filetype");
		foreach ( $alt_stylesheet_files as $file ) {
			$file = str_replace( $directory_path, "", $file);
			$alt_stylesheets[ $directory_uri . $file] = $file;
		}
	}
	return $alt_stylesheets;
}