<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-theme-customizer';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		"First" => "First Option",
		"Second" => "Second Option",
		"Third" => "Third Option"
	);

	$options = array();

	$options[] = array(
		"name" => "Example Settings",
		"type" => "heading"
	);

	$options['example_text'] = array(
		"name" => "Text",
		"id" => "example_text",
		"std" => "Default Value",
		"type" => "text"
	);

	$options['example_select'] = array(
		"name" => "Select Box",
		"id" => "example_select",
		"std" => "First",
		"type" => "select",
		"options" => $test_array
	);

	$options['example_radio'] = array(
		"name" => "Radio Buttons",
		"id" => "example_radio",
		"std" => "Third",
		"type" => "radio",
		"options" => $test_array
	);

	$options['example_checkbox'] = array(
		"name" => "Input Checkbox",
		"desc" => "Saved as boolean false if unchecked.",
		"id" => "example_checkbox",
		"std" => "1",
		"type" => "checkbox"
	);

	$options['example_uploader'] = array(
		"name" => "Uploader Test",
		"desc" => "This creates a full size uploader that previews the image.",
		"id" => "example_uploader",
		"type" => "upload"
	);

	$options['example_colorpicker'] = array(
		"name" => "Colorpicker",
		"id" => "example_colorpicker",
		"std" => "#666666",
		"type" => "color"
	);

	return $options;
}

/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */

add_action( 'customize_register', 'options_theme_customizer_register' );

function options_theme_customizer_register( $wp_customize ) {

	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */

	$options = optionsframework_options();

	/* Basic */

	$wp_customize->add_section( 'options_theme_customizer_basic', array(
		'title' => __( 'Basic', 'options_theme_customizer' ),
		'priority' => 100
	) );

	$wp_customize->add_setting( 'options-theme-customizer[example_text]', array(
		'default' => $options['example_text']['std'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'options_theme_customizer_example_text', array(
		'label' => $options['example_text']['name'],
		'section' => 'options_theme_customizer_basic',
		'settings' => 'options-theme-customizer[example_text]',
		'type' => $options['example_text']['type']
	) );

	$wp_customize->add_setting( 'options-theme-customizer[example_select]', array(
		'default' => $options['example_select']['std'],
		'type' => 'option',
		'sanitize_callback' => '' // Create a custom sanitization callback to validate choices
	) );

	$wp_customize->add_control( 'options_theme_customizer_example_select', array(
		'label' => $options['example_select']['name'],
		'section' => 'options_theme_customizer_basic',
		'settings' => 'options-theme-customizer[example_select]',
		'type' => $options['example_select']['type'],
		'choices' => $options['example_select']['options'],
	) );

	$wp_customize->add_setting( 'options-theme-customizer[example_radio]', array(
		'default' => $options['example_radio']['std'],
		'type' => 'option',
		'sanitize_callback' => '' // Create a custom sanitization callback to validate choices
	) );

	$wp_customize->add_control( 'options_theme_customizer_example_radio', array(
		'label' => $options['example_radio']['name'],
		'section' => 'options_theme_customizer_basic',
		'settings' => 'options-theme-customizer[example_radio]',
		'type' => $options['example_radio']['type'],
		'choices' => $options['example_radio']['options']
	) );

	$wp_customize->add_setting( 'options-theme-customizer[example_checkbox]', array(
		'default' => $options['example_checkbox']['std'],
		'type' => 'option',
		'sanitize_callback' => 'optionsframework_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'options_theme_customizer_example_checkbox', array(
		'label' => $options['example_checkbox']['name'],
		'section' => 'options_theme_customizer_basic',
		'settings' => 'options-theme-customizer[example_checkbox]',
		'type' => $options['example_checkbox']['type']
	) );

	/* Extended */

	$wp_customize->add_section( 'options_theme_customizer_extended', array(
		'title' => __( 'Extended', 'options_theme_customizer' ),
		'priority' => 110
	) );

	$wp_customize->add_setting( 'options-theme-customizer[example_uploader]', array(
		'type' => 'option',
		'sanitize_callback' => 'optionsframework_sanitize_file_url'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'example_uploader', array(
		'label' => $options['example_uploader']['name'],
		'section' => 'options_theme_customizer_extended',
		'settings' => 'options-theme-customizer[example_uploader]'
	) ) );

	$wp_customize->add_setting( 'options-theme-customizer[example_colorpicker]', array(
		'default' => $options['example_colorpicker']['std'],
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'   => $options['example_colorpicker']['name'],
		'section' => 'options_theme_customizer_extended',
		'settings'   => 'options-theme-customizer[example_colorpicker]'
	) ) );

}


if ( ! function_exists( 'optionsframework_sanitize_checkbox' ) ) :
/**
 * Sanitize a checkbox to only allow 0 or 1
 *
 * @since  1.0.0.
 *
 * @param  boolean    $value    The unsanitized value.
 * @return boolean				The sanitized boolean.
 */
function optionsframework_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
		return 1;
    } else {
		return 0;
    }
}
endif;

if ( ! function_exists( 'optionsframework_sanitize_file_url' ) ) :
/**
 * Sanitize the url of uploaded media.
 *
 * @since 1.0.0.
 *
 * @param  string    $value      The url to sanitize
 * @return string    $output     The sanitized url.
 */
function optionsframework_sanitize_file_url( $url ) {
	$output = '';
	$filetype = wp_check_filetype( $url );
	if ( $filetype["ext"] ) {
		$output = esc_url( $url );
	}
	return $output;
}
endif;

if ( ! function_exists( 'sanitize_hex_color' ) ) :
/**
 * Sanitizes a hex color.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 3.4.0
 *
 * @param string $color
 * @return string|null
 */
function sanitize_hex_color( $color ) {
	if ( '' === $color )
		return '';
	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
	return null;
}
endif;