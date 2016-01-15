<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-typography';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => 'Typography Settings',
		'type' => 'heading'
	);

	// Available Options for Header Font
	$typography_options_headers = array(
		'sizes' => array( '18','23','27','31' ),
		'faces' => array(
			'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
			'"Arial Black", arial, sans-serif' => 'Arial Black',
			'"Avant Garde", sans-serif' => 'Avant Garde' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' )
	);

	$typography_mixed_fonts = array_merge(
		options_typography_get_os_fonts(),
		options_typography_get_google_fonts()
	);
	asort( $typography_mixed_fonts );

	$options[] = array(
		'name' => 'Site Title Font',
		'desc' => 'Select the site title font',
		'id' => 'site_title_font',
		'std' => array('size' => '27px','color' => '#000000'),
		'type' => 'typography',
		'options' => $typography_options_headers
	);

	$options[] = array(
		'name' => 'Header Font',
		'desc' => 'Select the headline font (h1,h2,h3 etc)',
		'id' => 'header_font',
		'std' => array('size' => '18px','color' => '#000000'),
		'type' => 'typography',
		'options' => $typography_options_headers
	);

	// Available Options for Body Font
	$typography_options_body = array(
		'sizes' => array( '12','13','14','15','16','17' ),
		'faces' => array(
			'georgia, serif' => 'Georgia',
			'palatino, serif' => 'Palatino',
			'garamond, serif' => 'Garamond',
		),
		'styles' => false
	);

	$options[] = array(
		'name' => 'Body Font',
		'desc' => 'This font is used for all body text.',
		'id' => 'body_font',
		'std' => array('size' => '13px','face' => 'georgia, serif','color' => '#333333'),
		'type' => 'typography',
		'options' => $typography_options_body
	);

	$options[] = array(
		'name' => 'Link color',
		"desc" => "Select the color for links.",
		"id" => "link_color",
		"std" => "#bada55",
		"type" => "color"
	);

	$options[] = array(
		'name' => 'Link hover color',
		"desc" => 'Select the hover color for links.',
		"id" => "link_hover_color",
		"std" => "#ff00a6",
		"type" => "color"
	);

	$options[] = array(
		'name' => 'Disable Styles',
		'desc' => 'Disable option styles and use theme defaults.',
		'id' => 'disable_styles',
		'std' => false,
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => 'Google Fonts',
		'type' => 'heading'
	);

	$options[] = array(
		"name" => "About Google Fonts",
		"desc" => '<p>Google fonts can be included in the fonts array just like other fonts.  However, you\'ll still need to check which ones are selected and load those on the front end so that they can be used. Google has <a href="https://developers.google.com/webfonts/docs/getting_started#Quick_Start">more information about this</a>.</p><p>I also have a <a href="http://wptheming.com/?p=2545">post on my site</a> that explains how this code work in more detail.</p>',
		"type" => "info"
	);

	$options[] = array(
		'name' => 'Selected Google Fonts',
		'desc' => 'Fifteen of the top google fonts.',
		'id' => 'google_font',
		'std' => array( 'size' => '36px', 'face' => 'Rokkitt, serif', 'color' => '#00bc96'),
		'type' => 'typography',
		'options' => array(
			'faces' => options_typography_get_google_fonts(),
			'styles' => false
		)
	);

	$options[] = array(
		'name' => 'System Fonts and Google Fonts Mixed',
		'desc' => 'Google fonts mixed with system fonts.',
		'id' => 'google_mixed',
		'std' => array( 'size' => '32px', 'face' => 'Georgia, serif', 'color' => '#f15081'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false
		)
	);

	$options[] = array(
		'name' => 'System Fonts and Google Fonts Mixed (2)',
		'desc' => 'Google fonts mixed with system fonts.',
		'id' => 'google_mixed_2',
		'std' => array( 'size' => '28px', 'face' => 'Arvo, serif', 'color' => '#ee9f23'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false
		)
	);

	return $options;
}