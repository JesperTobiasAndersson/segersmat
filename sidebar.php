<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SegersMat
 */
?>

<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
		<div class="blog-sidebar">
			<?php // Get booking widgets
				if ( !dynamic_sidebar( 'sidebar-main' ) ) : endif;
			?>
		</div>
</div>
