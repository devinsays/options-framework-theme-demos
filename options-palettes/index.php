<?php
/**
 * The main template file.
 *
 * This theme for showing how color palettes can work with the Options Framework
 *
 * @package Options Palettes
 */

get_header(); ?>

	<article>

		<header class="entry-header">
			<h1 id="site-title">Options Palettes</h1>
			<p>Use of_get_option($id,$default) to return option values.</p>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<h3>Colors</h3>

			<p>Here's the color palette that's been selected:<br/>
			<b><?php echo of_get_option('color_scheme','vibrant'); ?></b>
			</p>

			<div id="blocks">
			<figure id="color1">
	  			<span style="background:<?php echo of_get_option('color1'); ?>"></span>
	  			<figcaption>color1: <?php echo of_get_option('color1'); ?></figcaption>
			</figure>
			<figure id="color2">
	  			<span style="background:<?php echo of_get_option('color2'); ?>"></span>
	  			<figcaption>color2: <?php echo of_get_option('color2'); ?></figcaption>
			</figure>
			<figure id="color3">
	  			<span style="background:<?php echo of_get_option('color3'); ?>"></span>
	  			<figcaption>color3: <?php echo of_get_option('color3'); ?></figcaption>
			</figure>
			<figure id="color4">
	  			<span style="background:<?php echo of_get_option('color4'); ?>"></span>
	  			<figcaption>color4: <?php echo of_get_option('color4'); ?></figcaption>
			</figure>
			</div>

		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php get_footer(); ?>