<?php
/**
 * Template Name: Gallerisida
 *
 * The template for displaying ACF Gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SegersMat
 */

get_header();
?>

<section class="gallery-area section-padding">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-sm-12 col-xs-12 text-center">

							<?php
							while ( have_posts() ) :
								the_post();

								the_content();

							endwhile; // End of the loop.
							?>

							<?php // Get gallery items
							$galleryitems = get_field('sm_gallery','options');

							if( $galleryitems && is_array( $galleryitems ) ):
							        foreach( $galleryitems as $galleryitem ): ?>
												<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 single-menu">
														<div class="food-menu-img">
																<a href="<?php echo $galleryitem['url']; ?>" class="menu-popup" data-effect="mfp-zoom-out"  title="<?php echo $galleryitem['caption']; ?>"><img src="<?php echo $galleryitem['sizes']['gallery-img-thumb']; ?>" alt="<?php echo $galleryitem['alt']; ?>"></a>
														</div>
												</div>
							        <?php
											endforeach; ?>
							<?php else: ?>
								<div class="no-images text-center">
									<p>Det finns inga bilder att visa än.</p>
									<?php if ( is_user_logged_in() ) { ?><p>Skapa ett galleri under <strong>Admin &rsaquo; Galleri</strong> för att visa era bilder här.</p><?php } ?>
								</div>
							<?php endif; ?>

						</div>

						<div class="col-sm-12 col-xs-12 text-center">
							<div class="single-post-social-bar page-social text-center clearfix">
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
