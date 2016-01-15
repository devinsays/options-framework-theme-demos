<?php

/*
 * Note: Options Panel Sidebar is a child theme of Options Framework Theme
 * So all the functions from the parent theme are also inherited
 *
 * This demo theme adds a sidebar to the options panel
 */

/*
 * This function adds the html that will appear in the sidebar module of the
 * options panel.  Feel free to alter this how you see fit.
 */

add_action( 'optionsframework_after', 'optionscheck_display_sidebar' );

function optionscheck_display_sidebar() { ?>
	<div id="optionsframework-sidebar">
		<div class="metabox-holder">
			<div class="postbox">
				<h3>Options Panel Sidebar</h3>
					<div class="inside">
						<p>Here's where you could display some relevant information about the options panel.</p>
						<p>For instance, you might want to add a donate button.</p>
						<p>Or perhaps you want to let people know where to <a href="http://wptheming.com">go for support</a>.</p>
					</div>
			</div>
		</div>
	</div>
<?php }

/*
 * This function loads an additional CSS file for the options panel
 * which allows us to style the sidebar
 */

 if ( is_admin() ) {
    $of_page= 'appearance_page_options-framework';
    add_action( "admin_print_styles-$of_page", 'optionsframework_custom_css', 100);
}

function optionsframework_custom_css () {
	wp_enqueue_style(
		'optionsframework-custom-css',
		get_stylesheet_directory_uri() .'/css/options-custom.css'
	);
}
