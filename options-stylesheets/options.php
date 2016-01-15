<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-stylesheets';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Defined Stylesheet Paths
	// Use get_template_directory_uri if it's a parent theme

	$defined_stylesheets = array(
		"0" => "Default", // There is no "default" stylesheet to load
		get_stylesheet_directory_uri() . '/css/blue.css' => "Blue",
		get_stylesheet_directory_uri() . '/css/green.css' => "Green",
		get_stylesheet_directory_uri() . '/css/pink.css' => "Pink"
	);

	// Generated list of stylesheets in the "CSS" directory
	// Use template_directory paths if you're using a parent theme

	$alt_stylesheets = options_stylesheets_get_file_list(
		get_stylesheet_directory() . '/css/', // $directory_path
		'css', // $filetype
		get_stylesheet_directory_uri() . '/css/' // $directory_uri
	);

	$options = array();

	$options[] = array(
		"name" => "Stylesheets",
		"type" => "heading"
	);

	$options[] = array(
		"name" => "Select a Stylesheet to be Loaded",
		"desc" => "This is a manually defined list of stylesheets.",
		"id" => "stylesheet",
		"std" => "0",
		"type" => "select",
		"options" => $defined_stylesheets
	);

	$options[] = array(
		"name" => "Automatically Load List of Stylesheets",
		"desc" => 'In this example the css files in the "css" directory are automatically loaded into the option.',
		"id" => "auto_stylesheet",
		"type" => "select",
		"options" => $alt_stylesheets
	);

	$options[] = array(
		"desc" => '<p><b>Note</b>: The top option is the only one set up to switch out stylehsheets on the front end.<br>If you want the second "automatic" one to do this, look at the code in functions.php and change the option ids that are used.</p>',
		"type" => "info" );

	$options[] = array(
		"name" => "More Information",
		"desc" => '<p>You don\'t need to just use select boxes to display the options.  Image buttons or radio buttons would also work.<br>Feel free to adapt this for your own project.</p><p>If need a little more information, also check out <a href="http://wptheming.com/?p=2550">this post</a> on my site.</p>',
		"type" => "info"
	);

	return $options;
}