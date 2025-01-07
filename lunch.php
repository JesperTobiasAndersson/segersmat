<?php
/**
 * Template Name: Lunchmenyer
 *
 * The template for displaying lunch menus
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SegersMat
 */

get_header();
?>

<section class="style-two menus-area section-padding" id="lunchmeny">
		<div class="container wow fadeIn">
					<div class="row">
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<div class="area-title text-center">
											<h2>Lunchmeny</h2>
											<h3>Dagens lunch <?php if( get_field('sm_lunch_price', 'options') ): ?><span><?php the_field('sm_lunch_price', 'options'); ?> kr</span><?php endif; ?></h3>
									</div>
									<?php if( get_field('sm_lunch_info', 'options') ): ?><div class="lunch-info text-center"><?php the_field('sm_lunch_info', 'options'); ?></div><?php endif; ?>
							</div>
					</div>

					<div class="row">
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<div class="food-menu-list-menu">
											<ul>
													<li class="filter active" data-filter="all">Alla dagar</li>
													<li class="filter" data-filter=".Monday">Måndag</li>
													<li class="filter" data-filter=".Tuesday">Tisdag</li>
													<li class="filter" data-filter=".Wednesday">Onsdag</li>
													<li class="filter" data-filter=".Thursday">Torsdag</li>
													<li class="filter" data-filter=".Friday">Fredag</li>
											</ul>
									</div>
							</div>
					</div>

					<div class="row">
						<div class="main-lunch-menu col-md-6 col-lg-6 col-sm-12 col-xs-12">

							<div class="menu-header text-center">
								<h3>Veckomeny</h3>
								<p>Serveras specifika dagar</p>
							</div>

							<div class="row food-menu-page-list">

									<div class="mix col-md-12 col-lg-12 col-sm-12 col-xs-12 single-menu Monday">
											<div class="single-menu-details">
													<!--<div class="food-menu-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lunch-icon.png" alt=""></div>-->
													<div class="food-menu-details">
														<?php if( get_field('sm_week_1_menu', 'options') ): ?>
															<h3>Måndag <span class="menu-price">v<?php the_field('sm_menu_week_1', 'options'); ?></span></h3>
															<p class="menu-speacification"><?php the_field('sm_week_1_menu', 'options'); ?></p>
														<?php else: ?>
															<h3>Måndag <span class="menu-price">v<?php echo date('W'); ?></span></h3>
															<p class="menu-speacification"><em>Det finns ingen meny för måndag denna vecka. Det kan bero på att det är helgdag eller att vi av andra anledningar har stängt.</em></p>
														<?php endif; ?>
													</div>
											</div>
									</div>
									<div class="mix col-md-12 col-lg-12 col-sm-12 col-xs-12 single-menu Tuesday">
											<div class="single-menu-details">
													<!--<div class="food-menu-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lunch-icon.png" alt=""></div>-->
													<div class="food-menu-details">
														<?php if( get_field('sm_week_2_menu', 'options') ): ?>
															<h3>Tisdag <span class="menu-price">v<?php the_field('sm_menu_week_2', 'options'); ?></span></h3>
															<p class="menu-speacification"><?php the_field('sm_week_2_menu', 'options'); ?></p>
														<?php else: ?>
															<h3>Tisdag <span class="menu-price">v<?php echo date('W'); ?></span></h3>
															<p class="menu-speacification"><em>Det finns ingen meny för tisdag denna vecka. Det kan bero på att det är helgdag eller att vi av andra anledningar har stängt.</em></p>
														<?php endif; ?>
													</div>
											</div>
									</div>
									<div class="mix col-md-12 col-lg-12 col-sm-12 col-xs-12 single-menu Wednesday">
											<div class="single-menu-details">
													<!--<div class="food-menu-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lunch-icon.png" alt=""></div>-->
													<div class="food-menu-details">
														<?php if( get_field('sm_week_3_menu', 'options') ): ?>
															<h3>Onsdag <span class="menu-price">v<?php the_field('sm_menu_week_3', 'options'); ?></span></h3>
															<p class="menu-speacification"><?php the_field('sm_week_3_menu', 'options'); ?></p>
														<?php else: ?>
															<h3>Onsdag <span class="menu-price">v<?php echo date('W'); ?></span></h3>
															<p class="menu-speacification"><em>Det finns ingen meny för onsdag denna vecka. Det kan bero på att det är helgdag eller att vi av andra anledningar har stängt.</em></p>
														<?php endif; ?>
													</div>
											</div>
									</div>
									<div class="mix col-md-12 col-lg-12 col-sm-12 col-xs-12 single-menu Thursday">
											<div class="single-menu-details">
													<!--<div class="food-menu-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lunch-icon.png" alt=""></div>-->
													<div class="food-menu-details">
														<?php if( get_field('sm_week_4_menu', 'options') ): ?>
															<h3>Torsdag <span class="menu-price">v<?php the_field('sm_menu_week_4', 'options'); ?></span></h3>
															<p class="menu-speacification"><?php the_field('sm_week_4_menu', 'options'); ?></p>
														<?php else: ?>
															<h3>Torsdag <span class="menu-price">v<?php echo date('W'); ?></span></h3>
															<p class="menu-speacification"><em>Det finns ingen meny för torsdag denna vecka. Det kan bero på att det är helgdag eller att vi av andra anledningar har stängt.</em></p>
														<?php endif; ?>
													</div>
											</div>
									</div>
									<div class="mix col-md-12 col-lg-12 col-sm-12 col-xs-12 single-menu Friday">
											<div class="single-menu-details">
													<!--<div class="food-menu-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lunch-icon.png" alt=""></div>-->
													<div class="food-menu-details">
														<?php if( get_field('sm_week_5_menu', 'options') ): ?>
															<h3>Fredag <span class="menu-price">v<?php the_field('sm_menu_week_5', 'options'); ?></span></h3>
															<p class="menu-speacification"><?php the_field('sm_week_5_menu', 'options'); ?></p>
														<?php else: ?>
															<h3>Fredag <span class="menu-price">v<?php echo date('W'); ?></span></h3>
															<p class="menu-speacification"><em>Det finns ingen meny för fredag denna vecka. Det kan bero på att det är helgdag eller att vi av andra anledningar har stängt.</em></p>
														<?php endif; ?>
													</div>
											</div>
									</div>
							</div>

						</div>
						<div class="alt-lunch-menu col-md-6 col-lg-6 col-sm-12 col-xs-12">

							<div class="menu-header text-center">
								<h3>Alternativ meny</h3>
								<p>Serveras alla veckodagar</p>
							</div>

							<?php	// check if the repeater field has rows of data
							if( have_rows('sm_lunches_alt', 'options') ): ?>

								<div class="row food-menu-list">

									<?php // loop through the rows of data
									while ( have_rows('sm_lunches_alt', 'options') ) : the_row(); ?>

											<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 single-menu">
													<div class="single-menu-details">
															<!--<div class="food-menu-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lunch-icon.png" alt=""></div>-->
															<div class="food-menu-details">
																<h3><?php the_sub_field('alt_name', 'options'); ?> <span class="menu-price"><?php the_sub_field('price', 'options'); ?> kr</span></h3>
																<p class="menu-speacification"><?php the_sub_field('menu', 'options'); ?></p>
															</div>
													</div>
											</div>

									<?php endwhile; ?>

									</div>

							<?php else : ?>

									<div class="row food-menu-list">
										<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
											<p><em>Det finns inga alternativa lunchmenyer för tillfället.</em></p>
										</div>
									</div>

							<?php endif; ?>

						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
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
