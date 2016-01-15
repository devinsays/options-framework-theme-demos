<?php
/**
 * The main template file.
 *
 * This theme for showing how color palettes can work with the Options Framework
 *
 * @package Options Stylesheets
 */

get_header(); ?>

	<article>

		<header class="entry-header">
			<h1 id="site-title">Options Stylesheets</h1>
			<p>Use of_get_option($id,$default) to return option values.</p>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<h3>Stylesheet Loaded</h3>

			<p>For this demo we are only loading the stylesheet set in the option with the id "stylesheet".</p>
			<p>The path to that stylesheet is:<br/>
			<b><?php echo of_get_option( 'stylesheet', false ); ?></b>
			</p>

			<p>If you see "0", that means the default is being used.</p>

			<h3>Automatic Stylesheet Loader</h3>

			<p>Here's all the options available in the automatic stylesheet loader.  If you add a new file to the "css" directory, you'll see it show up here:</p>

			<?php
			$alt_stylesheets = options_stylesheets_get_file_list(
					get_stylesheet_directory() . '/css/', // $directory_path
					'css', // $filetype
					get_stylesheet_directory_uri() . '/css/' // $directory_uri
			); ?>

			<?php print_r( $alt_stylesheets ); ?>

		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php get_footer(); ?>