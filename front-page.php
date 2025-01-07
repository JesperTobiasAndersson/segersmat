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

<?php if( get_field('sm_frontpage_enable_vision', 'options') ): ?>
<!--ABOUT AREA-->
<section class="about-area section-padding" id="vision">
		<div class="container wow fadeIn">
				<div class="row">
					<?php $visionID = get_field('sm_frontpage_content_vision', 'options'); ?>

					<?php // WP_Query arguments
					$vision_args = array(
						'page_id' => $visionID,
					);

					// The Query
					$vision_query = new WP_Query( $vision_args );

					// The Loop
					if ( $vision_query->have_posts() ) {
						while ( $vision_query->have_posts() ) {
							$vision_query->the_post(); ?>

							<?php the_content(); ?>

						<?php }
					} else { ?>

						<div class="col-md-12">
							<p>Välj en sida för denna sektion under <strong>Admin &rsaquo; Segers Mat &rsaquo; Startsida &rsaquo; Vår vision</strong>.</p>
						</div>

					<?php }

					// Restore original Post Data
					wp_reset_postdata(); ?>

				</div>
		</div>
</section>
<!--ABOUT AREA END-->
<?php endif; ?>

<?php if( get_field('sm_frontpage_enable_catering', 'options') ): ?>
<!--PROMOTIONS AREA-->
<section class="promotions-area section-padding" id="catering">
		<div class="promotion-area-bg" style="background: url(<?php the_field('sm_frontpage_catering_img', 'options'); ?>);"></div>
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="area-title text-center">
										<h2>Catering</h2>
										<h3>Ditt val av catering</h3>
								</div>
						</div>
				</div>

				<?php $post_objects = get_field('sm_frontpage_content_catering', 'options');

				if( $post_objects ): ?>

				<div class="row">

					    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT)
					        setup_postdata($post); ?>

									<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
											<div class="single-promotions text-center">
													<div class="promotions-img">
															<?php the_post_thumbnail('news-img-small'); ?>
													</div>
													<div class="promotions-details">
															<h4><?php the_title(); ?></h4>
															<a href="<?php the_permalink(); ?>" class="read-more">Läs mer</a>
													</div>
											</div>
									</div>

					    <?php endforeach;
					    wp_reset_postdata(); // reset the $post object so the rest of the page works correctly ?>

			</div>

			<div class="row">
				<?php if( get_field('sm_frontpage_read_more_catering', 'options') ): ?><div class="col-md-12 text-center"><a href="<?php the_field('sm_frontpage_read_more_catering', 'options'); ?>" class="more-btn">Mer om vår Catering</a></div><?php endif; ?>
			</div>

			<?php else: ?>
			<div class="row">
				<div class="col-md-12">
						<div class="single-promotions text-center">
								<div class="promotions-details">
										<p style="color:#fff;">Ange vilket innehåll som ska visas i denna sektion under <strong>Admin &rsaquo; Segers Mat &rsaquo; Startsida &rsaquo; Catering</strong>.</p>
								</div>
						</div>
				</div>
			</div>
			<?php endif; ?>

		</div>
</section>
<!--PROMOTIONS AREA END-->
<?php endif; ?>

<?php if( get_field('sm_frontpage_enable_menus', 'options') ): ?>
<!--MENUS AREA-->
<section class="style-two menus-area gray-bg section-padding" id="lunchmeny">
		<div class="container wow fadeIn">
					<div class="row">
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<div class="area-title text-center">
											<h2>Lunchmeny</h2>
											<h3>Dagens lunch <?php if( get_field('sm_lunch_price', 'options') ): ?><span><?php the_field('sm_lunch_price', 'options'); ?> kr</span><?php endif; ?></h3>
									</div>
							</div>
					</div>

					<div class="row">
							<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
									<div class="food-menu-list-menu">
											<ul>
													<li class="filter" data-filter="all">Alla dagar</li>
													<li class="filter" data-filter=".Monday">Måndag</li>
													<li class="filter" data-filter=".Tuesday">Tisdag</li>
													<li class="filter" data-filter=".Wednesday">Onsdag</li>
													<li class="filter" data-filter=".Thursday">Torsdag</li>
													<li class="filter" data-filter=".Friday">Fredag</li>
													<li class="filter" data-filter=".weekend">Helgdagar</li>
											</ul>
									</div>
							</div>
					</div>
					<div class="row food-menu-list">
							<div class="mix col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12 single-menu Monday">
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
							<div class="mix col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12 single-menu Tuesday">
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
							<div class="mix col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12 single-menu Wednesday">
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
							<div class="mix col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-xs-12 single-menu Thursday">
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
							<div class="mix col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12 single-menu Friday">
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

							<div class="mix col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12 single-menu weekend">
									<div class="single-menu-details">
											<!--<div class="food-menu-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lunch-icon.png" alt=""></div>-->
											<div class="food-menu-details">
												<?php if( get_field('sm_weekend_info', 'options') ): ?>
													<h3>Helgdagar</h3>
													<p class="menu-speacification"><em><?php the_field('sm_weekend_info', 'options'); ?></em></p>
												<?php else: ?>
													<h3>Helgdagar</h3>
													<p class="menu-speacification"><em>Det finns ingen information tillgänglig.</em></p>
												<?php endif; ?>
											</div>
									</div>
							</div>

							<?php if( get_field('sm_frontpage_read_more_menus', 'options') ): ?>
								<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
									<p>Det finns även alternativa menyer alla dagar. För mer information om priser och alternativa menyer, klicka nedan.</p>
									<p><a href="<?php the_field('sm_frontpage_read_more_menus', 'options'); ?>" class="more-btn">Mer information</a></div></p>
								</div>
							<?php endif; ?>

				</div>
		</div>
</section>
<!--MENUS AREA END-->
<?php endif; ?>

<?php if( get_field('sm_frontpage_enable_instagram', 'options') ): ?>
<!--INSTAGRAM FEED-->
<section class="instagram-area section-padding">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="area-title text-center">
										<h4>Följ <span style="color:#9FAB67;">Segers Mat</span> på Instagram</h4>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="instagram-feed-content text-center">
										<div class="instagram-feed">
											<?php // Get booking form
												 $instacode = get_field('sm_frontpage_instagram_code','options');
												 if ( $instacode !='' ) {
												 		echo do_shortcode($instacode);
												 } else {
													 	echo '<p>Du måste ange kod för Instagram under <strong>Admin &rsaquo; Segers Mat &rsaquo; Startsida &rsaquo; Instagram</strong>.';
												 } ?>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>
<!--INSTAGRAM FEED END-->
<?php endif; ?>

<?php if( get_field('sm_frontpage_enable_booking', 'options') ): ?>
<!--RESERVATION AREA-->
<section class="reservation-area section-padding" id="boka">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-12 col-lg-12">
								<div class="area-title text-center">
										<h2>Boka</h2>
										<h3>Boka catering</h3>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12">

							<?php // Get booking form
								 $bookingform = get_field('sm_frontpage_formcode','options');
								 if ( $bookingform !='' ) {
								 		echo do_shortcode($bookingform);
								 } else {
									 	echo '<div class="row"><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center"><p>Du måste ange en formulärkod under <strong>Admin &rsaquo; Segers Mat &rsaquo; Startsida &rsaquo; Bokningsformulär</strong>.</p></div></div>';
								 } ?>

						</div>
				</div>
				<div class="row">
					<?php // Get booking widgets
						if ( !dynamic_sidebar( 'booking-widgets' ) ) : endif;
					?>
				</div>
		</div>
</section>
<!--RESERVATION AREA END-->
<?php endif; ?>

<?php if( get_field('sm_frontpage_enable_newsletter', 'options') ): ?>
<!--EVENT AREA-->
<section class="event-area section-padding" id="nyhetebrev">
		<div class="event-area-bg" style="background: url(<?php the_field('sm_frontpage_newsletter_img', 'options'); ?>);"></div>
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="area-title text-center">
										<h2>Nyhetsbrev</h2>
										<h3>Håll dig uppdaterad</h3>
								</div>
						</div>
				</div>
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
						<div class="contact-form">
							<?php // Get booking form
								 $newsform = get_field('sm_frontpage_formcode_news','options');
								 if ( $newsform !='' ) {
										echo do_shortcode($newsform);
								 } else {
										echo '<div class="row"><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center"><p>Du måste ange en formulärkod under <strong>Admin &rsaquo; Segers Mat &rsaquo; Startsida &rsaquo; Nyhetsbrev</strong>.</p></div></div>';
								 } ?>
						</div>
				</div>
		</div>
</section>
<!--EVENT AREA END-->
<?php endif; ?>

<?php if( get_field('sm_frontpage_enable_we_are', 'options') ): ?>
<!--TEAM AREA-->
<section class="team-area section-padding" id="om">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="area-title text-center">
										<h2>Vi</h2>
								</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12">

							<?php

							// check if the repeater field has rows of data
							if( have_rows('sm_frontpage_profile','options') ): ?>

							<div class="row">

							 	<?php // loop through the rows of data
							    while ( have_rows('sm_frontpage_profile','options') ) : the_row(); ?>

							        <?php // Get user meta data
											$ususerID = get_sub_field('person');
											$personname = get_the_author_meta( 'display_name',$ususerID );
											?>

											<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
											<div class="single-team-member text-center">
													<div class="team-member-img wow fadeIn">
														<?php if ( get_field('sm_profile_img','user_'. $ususerID ) ) { ?>
															<img src="<?php the_field('sm_profile_img', 'user_'. $ususerID ); ?>" alt="profilbild">
														<?php } else { ?>
															<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-user.jpg" alt="profilbild">
														<?php } ?>
													</div>
													<div class="member-details">
															<h3><?php echo $personname; ?></h3>
															<p><?php the_field('sm_profil_title', 'user_'. $ususerID ); ?></p>
													</div>
											</div>
											</div>

							    <?php endwhile; ?>

									<?php if( get_field('sm_frontpage_read_more_about', 'options') ): ?><div class="col-md-12 text-center"><a href="<?php the_field('sm_frontpage_read_more_about', 'options'); ?>" class="more-btn">Mer om oss</a></div><?php endif; ?>

								</div>

							<?php else : ?>

							    <div class="row"><div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center"><p>Du måste lägg till personer under <strong>Admin &rsaquo; Segers Mat &rsaquo; Startsida &rsaquo; Det här är vi</strong>.</p></div></div>

							<?php endif; ?>

						</div>
				</div>
		</div>
</section>
<!--TEAM AREA END-->
<?php endif; ?>

<?php if( get_field('sm_frontpage_enable_news', 'options') ): ?>
<!--BLOG AREA-->
<section class="blog-area section-padding" id="nyheter">
		<div class="container wow fadeIn">
				<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
								<div class="area-title text-center">
										<h2>Nyheter</h2>
										<h3>Senaste nytt</h3>
								</div>
						</div>
				</div>
				<div class="row">

					<?php // WP_Query arguments
					$news_args = array(
						'posts_per_page' => '2',
					);

					// The Query
					$news_query = new WP_Query( $news_args );

					// The Loop
					if ( $news_query->have_posts() ) {
						while ( $news_query->have_posts() ) {
							$news_query->the_post(); ?>

							<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
									<div class="single-post text-center">
											<div class="blog-post-img ">
												<?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('news-img-small');
												} else { ?>
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-750x550.png" alt="" />
												<?php } ?>
											</div>
											<div class="post-details">
													<div class="category-links"><?php the_category(' '); ?></div>
													<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<p class="post-meta"><a href="<?php the_permalink(); ?>"><?php the_time('j F, Y'); ?></a></p>
											</div>
									</div>
							</div>

						<?php }
					} else { ?>

						<div class="col-md-12">
								<div class="single-post text-center">
										<div class="post-details">
												<p>Det finns inga nyheter att visa här än.</p>
										</div>
								</div>
						</div>

					<?php }

					// Restore original Post Data
					wp_reset_postdata(); ?>

				</div>
		</div>
</section>
<!--BLOG AREA END-->
<?php endif; ?>

<?php
get_footer();
