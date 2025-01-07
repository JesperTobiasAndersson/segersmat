<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SegersMat
 */

?>

<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
		<div class="error-text text-center">
				<div class="error-main-hidding">
						<h2>Oops!</h2>
						<?php if ( is_search() ) { ?>
							<h5>Inga resultat kunde hittas för din sökning &quot;<strong><?php echo get_search_query(); ?></strong>&quot;</h5>
						<?php } else { ?>
							<h5>Sidan kunde inte hittas. Försök med något av följande</h5>
						<?php } ?>
				</div>
				<div class="single-sidebar-widget">
						<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
								<input type="search" name="s" id="s" placeholder="Sök..." value="<?php echo get_search_query(); ?>">
								<button type="submit"><i class="fa fa-search"></i></button>
						</form>
				</div>
				<?php if ( is_search() ) { ?>
					<p>Försök med andra sökord eller gå till</p>
				<?php } else { ?>
					<p>Försök med en sökning eller gå till</p>
				<?php } ?>
				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Startsidan</a> alternativt <a href="<?php the_field('sm_contact_page', 'options'); ?>">kontakta oss</a></p>
		</div>
</div>
