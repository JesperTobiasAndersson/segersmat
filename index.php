<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SegersMat
 */

get_header();
?>

<?php
if ( have_posts() ) : ?>

<section class="blog-page blog-area section-padding">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; // End of the loop. ?>

            <div class="page-pagination margin-top">
              <?php // Pagination
        			if( function_exists('wp_pagenavi') ) {
        				wp_pagenavi();
        			} else {
        				the_posts_navigation(array(
								    'prev_text' => __( 'Äldre poster', 'segersmat' ),
								    'next_text' => __( 'Nyare poster', 'segersmat' ),
								));
        			} ?>
            </div>

						</div>

						<?php get_sidebar(); ?>

				</div>
		</div>
</section>

<?php else : ?>

	<section class="error-text-area section-padding">
			<div class="container wow fadeIn">
					<div class="row">

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					</div>
			</div>
	</section>

<?php endif; ?>

<?php
get_footer();
