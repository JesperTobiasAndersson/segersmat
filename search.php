<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package SegersMat
 */

 get_header();
 ?>

 <?php
 if ( have_posts() ) : ?>

 <section class="search-page-area section-padding">
		 <div class="container wow fadeIn">
				 <div class="row">
 						<div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">

							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Sökresultat för &quot;%s&quot;', 'segersmat' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>

 						<?php
 						while ( have_posts() ) :
 							the_post();

 							get_template_part( 'template-parts/content', 'search' );

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
