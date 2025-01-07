<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SegersMat
 */

get_header();
?>

<section class="about-area section-padding">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-sm-12 col-xs-12">

							<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'page' );

							endwhile; // End of the loop.
							?>

							<div class="single-post-social-bar page-social text-center">
							<?php if( get_field('sm_share_btns', 'options') ):
									$smshare = get_field('sm_share_btns', 'options');
									echo do_shortcode($smshare);
							endif; ?>
							</div>

						</div>
			</div>
	</div>
</section>

<?php
get_footer();
