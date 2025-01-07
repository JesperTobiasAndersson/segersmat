<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SegersMat
 */

?>

<!--FOOER AREA-->
<div class="footer-area" id="contact">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="footer-top section-padding text-center">
									<?php if( get_field('sm_logo_branding_footer') ) { ?>
										<div class="footer-logo">
												<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('sm_logo_branding_footer'); ?>" alt="logo"></a>
										</div>
									<?php } else { ?>
										<div class="footer-logo">
												<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/big_logo_white.png" alt=""></a>
										</div>
									<?php } ?>
										<div class="footer-address">
												<p><?php the_field('sm_contact_address', 'options'); ?></p>
												<p><a href="<?php the_field('sm_contact_page', 'options'); ?>">Kontakt</a></p>
												<p><a href="tel:<?php the_field('sm_contact_tel_01', 'options'); ?>"><?php the_field('sm_contact_tel_name_01', 'options'); ?> <?php the_field('sm_contact_tel_01', 'options'); ?></a><?php if ( get_field('sm_contact_tel_02', 'options') ) { ?><br><a href="tel:<?php the_field('sm_contact_tel_02', 'options'); ?>"><?php the_field('sm_contact_tel_name_02', 'options'); ?> <?php the_field('sm_contact_tel_02', 'options'); ?></a><?php } ?></p>
										</div>
										<div class="footer-social-bookmark">
											<?php
											// check if the social repeater field has rows of data
											if( have_rows('sm_contact_social', 'options') ): ?>
												<ul>
													<?php 	// loop through the rows of data
													while ( have_rows('sm_contact_social', 'options') ) : the_row();
													// Get both value and choice label
													$social_field = get_sub_field_object('sm_social_service');
													$social_value = $social_field['value'];
													$social_label = $social_field['choices'][ $social_value ];
													?>
													<li>
														<a class="social-link <?php echo $social_value; ?>" href="<?php the_sub_field('sm_social_link'); ?>" title="<?php echo sprintf(esc_html_x( '%s på','on as Geekninjas on the social network' ,'segersmat' ), get_bloginfo('name')); ?> <?php echo $social_label; ?>" target="_blank"><i class="fa fa-<?php echo $social_value; ?>" aria-hidden="true"></i></a>
													</li>
													<?php endwhile; ?>
													<li>
														<a class="social-link rss" href="<?php echo esc_url( get_bloginfo('rss2_url') ); ?>" title="<?php echo sprintf(esc_html_x( 'Prenumerera på %s RSS-flöde','name of the site' ,'segersmat' ), get_bloginfo('name')); ?>"> <i class="fa fa-rss" aria-hidden="true"></i></a>
													</li>
												</ul>
											<?php endif; ?>
										</div>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
								<div class="footer-menu">
										<ul>
												<li><a href="<?php the_field('sm_integrity_cookies_page', 'options'); ?>">Cookies</a></li>
												<li><a href="<?php the_field('sm_integrity_integrity_policy', 'options'); ?>">Intergritetspolicy</a></li>
												<li><a href="<?php the_field('sm_contact_page', 'options'); ?>">Kontakt</a></li>
										</ul>
								</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
								<div class="footer-copyright">
										<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Segers Mat</a>.</p>
								</div>
						</div>
				</div>
		</div>
</div>
<!--FOOER AREA END-->

<?php wp_footer(); ?>
<?php the_field('sm_code_footer_code','options'); ?>

</body>
</html>
