<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SegersMat
 */

get_header();
?>

<section class="blog-page blog-area section-padding">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; // End of the loop.
						?>

						</div>

						<?php get_sidebar(); ?>

				</div>
		</div>
</section>

<?php
get_footer();
