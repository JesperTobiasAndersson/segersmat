<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SegersMat
 */

get_header();
?>

<section class="error-text-area section-padding">
		<div class="container wow fadeIn">
				<div class="row">
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				</div>
		</div>
</section>

<?php
get_footer();
