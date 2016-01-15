<?php
/**
 * The main template file.
 *
 * This theme is purely for the purpose of testing theme options in Options Framework plugin.
 *
 * @package Options Typography
 */

get_header(); ?>

	<article>

		<header class="entry-header">
			<h1 id="site-title">Options Typography</h1>
			<p>Use of_get_option($id,$default) to return option values.</p>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<h3>About Typography</h3>

			<p>This example theme shows how typography options might be integrated into a project.</p>

			<hr>

			<h3>Site Title Font</h3>

            <dl>
            <dt>of_get_option('site_title_font'):</dt>
            <dd>
            <?php $typography = of_get_option('site_title_font');
            if ($typography) {
                echo '<ul>';
                foreach ($typography as $i=>$param) {
                    echo '<li>'.$i . ' = ' . $param.'</li>';
                }
				echo '</ul>';
            } else {
                echo "no entry";
            } ?>
            </dd>
            </dl>

            <h3>Header Font</h3>

            <dl>
            <dt>of_get_option('header_font'):</dt>
            <dd>
            <?php $typography = of_get_option('header_font');
            if ($typography) {
                echo '<ul>';
                foreach ($typography as $i=>$param) {
                    echo '<li>'.$i . ' = ' . $param.'</li>';
                }
				echo '</ul>';
            } else {
                echo "no entry";
            } ?>
            </dd>
            </dl>

			<h3>Body Font</h3>

            <dl>
            <dt>of_get_option('body_font'):</dt>
            <dd>
            <?php $typography = of_get_option('body_font');
            if ($typography) {
                echo '<ul>';
                foreach ($typography as $i=>$param) {
                    echo '<li>'.$i . ' = ' . $param.'</li>';
                }
				echo '</ul>';
            } else {
                echo "no entry";
            } ?>
            </dd>
            </dl>

            <h3>Link Color</h3>

            <dl>
            <dt>of_get_option('link_color'):</dt>
            <dd
            <span style="color:<?php echo of_get_option('link_color', '#bada55' ); ?>">
            <b><?php echo of_get_option('link_color', 'no entry' ); ?></b>
            </span><br>
            <a href="#">Example Link</a>
            </dd>
            </dl>

			<h3>Link Hover Color</h3>

            <dl>
            <dt>of_get_option('link_hover_color')</dt>
            <dd
            <span style="color:<?php echo of_get_option('link_hover_color', '#bada55' ); ?>">
            <b><?php echo of_get_option('link_hover_color', 'no entry' ); ?></b>
            </span><br>
            <a href="#">Hover to View</a>
            </dd>
            </dl>

            <hr>

            <h3>Selected Google Fonts</h3>

            <p class="google-font">Sample Text With the Selected Google Font</p>

            <dl>
            <dt>of_get_option('google_font'):</dt>
            <dd>
            <?php $typography = of_get_option('google_font');
            if ($typography) {
                echo '<ul>';
                echo '<li>size = ' . $typography['size'] . '</li>';
                echo '<li>face = ' . $typography['face'] . '</li>';
                echo '<li>color = ' . $typography['color'] . '</li>';
            } else {
                echo "no entry";
            } ?>
            </dd>
            </dl>

            <h3>System Fonts and Google Fonts Mixed</h3>

            <p class="google-mixed">Example of Selected Font</p>

            <dl>
            <dt>of_get_option('google_mixed'):</dt>
            <dd>
            <?php $typography = of_get_option('google_mixed');
            if ($typography) {
                echo '<ul>';
                echo '<li>size = ' . $typography['size'] . '</li>';
                echo '<li>face = ' . $typography['face'] . '</li>';
                echo '<li>color = ' . $typography['color'] . '</li>';
            } else {
                echo "no entry";
            } ?>
            </dd>
            </dl>

            <h3>System Fonts and Google Fonts Mixed (2)</h3>

            <p class="google-mixed-2">Example of Selected Font</p>

            <dl>
            <dt>of_get_option('google_mixed_2'):</dt>
            <dd>
            <?php $typography = of_get_option('google_mixed_2');
            if ($typography) {
                echo '<ul>';
                echo '<li>size = ' . $typography['size'] . '</li>';
                echo '<li>face = ' . $typography['face'] . '</li>';
                echo '<li>color = ' . $typography['color'] . '</li>';
            } else {
                echo "no entry";
            } ?>
            </dd>
            </dl>

		</div><!-- .entry-content -->
	</article><!-- #post-0 -->

<?php get_footer(); ?>