<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SegersMat
 */

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <?php if ( is_front_page() ) { ?>
      <script type="text/javascript">
      jQuery(function($){
        $('.food-menu-list').mixItUp({
          load: {
            filter: '.<?php sm_todays_lunch(); ?>'
          }
        });
      });
      </script>
    <?php } ?>
    <?php the_field('sm_code_header_code','options'); ?>
</head>

<body id="home" <?php body_class(); ?>>

    <!--[if lt IE 8]>
        <p class="browserupgrade">Du använder en <strong>föråldrad</strong> webbläsare. Vänligen <a href="http://browsehappy.com/">uppdatera din webbläsare</a> för att förbättra din upplevelse.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"><i class="fa fa-cutlery"></i></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area">
      <?php if ( !is_front_page() ) {
        sm_page_headers();
      } ?>
        <div class="header-top-area">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-9">
                            <div class="call-to-action">
                              <?php if ( get_field('sm_contact_page', 'options') ) { ?>
                                <p><i class="fa fa-envelope-o"></i> <a href="<?php the_field('sm_contact_page', 'options'); ?>">Kontakt</a></p>
                              <?php }
                              if ( get_field('sm_contact_tel_01', 'options') || get_field('sm_contact_tel_02', 'options') ) { ?>
                                <p><i class="fa fa-phone"></i> <a href="tel:<?php the_field('sm_contact_tel_01', 'options'); ?>"><?php the_field('sm_contact_tel_name_01', 'options'); ?> <?php the_field('sm_contact_tel_01', 'options'); ?></a><?php if ( get_field('sm_contact_tel_02', 'options') ) { ?> / <a href="tel:<?php the_field('sm_contact_tel_02', 'options'); ?>"><?php the_field('sm_contact_tel_name_02', 'options'); ?> <?php the_field('sm_contact_tel_02', 'options'); ?></a><?php } ?></p>
                              <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-3">
                            <div class="top-social-bookmark">
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
                                    <a class="social-link <?php echo $social_value; ?>" href="<?php the_sub_field('sm_social_link'); ?>" title="<?php echo sprintf(esc_html_x( '%s på','on as Segers Mat on the social network' ,'segersmat' ), get_bloginfo('name')); ?> <?php echo $social_label; ?>" target="_blank"><i class="fa fa-<?php echo $social_value; ?>" aria-hidden="true"></i></a>
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
            </div>

            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <button class="collapsed navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-scrollspy">
                                <span class="sr-only">Meny</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
								<?php if( get_field('sm_logo_header_dark') ) { ?>
                            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><img src="<?php the_field('sm_logo_header_dark'); ?>" alt="logo"></a>
                            <?php } else { ?>
                              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_small_black.png" alt="logo"></a>
                            <?php } ?>
                            <?php if( get_field('sm_logo_white.png') ) { ?>
                            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><img src="<?php the_field('sm_logo_header_white'); ?>" alt="logo"></a>
                            <?php } else { ?>
                              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand white"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_small_white.png" alt="logo"></a>
                            <?php } ?>
							</div>
                        <div class="collapse navbar-collapse bs-example-js-navbar-scrollspy">
                            <div class="search-form-area">
                                <div class="search-form-overlay"></div>
                                <a class="search-form-trigger" href="#search-form">Sök<span></span></a>
                                <div id="search-form" class="search-form">
                                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                                        <input type="search" name="s" id="s" placeholder="Ange sökord och tryck enter...">
                                    </form>
                             </div>
                           
							</div>
                            <?php
                            wp_nav_menu( array(
            									'theme_location' 	=> 'mainmenu',
            									'container' 			=> '',
            									'items_wrap' => '<ul id="nav" class="nav navbar-nav cl-effect-11 %2$s">%3$s</ul>'
            								) ); ?>
                        
                  
                </nav>
            </div>
            <!--END MAINMENU AREA END-->
        </div>

        <?php if ( is_front_page() ) { ?>

        <!--HHOME SLIDER AREA-->
        <div class="slider-area">
            <div class="pogoSlider">

              <?php // WP_Query arguments
              $nr_slides = get_field('sm_frontpage_nr_slides');
              $order_slides = get_field('sm_frontpage_order_slide');
              $slider_args = array(
              	'post_type'              => array( 'slides' ),
              	'posts_per_page'         => $nr_slides,
              	'orderby'                => $order_slides,
              );

              // The Query
              $slider_query = new WP_Query( $slider_args );

              // The Loop
              if ( $slider_query->have_posts() ) {
              	while ( $slider_query->have_posts() ) {
              		$slider_query->the_post();

                  $slide_image = get_field('sm_slide_img');
                  ?>

                  <div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background:url(<?php echo $slide_image['sizes'][ 'slider-img' ]; ?>) no-repeat scroll 0 0 / cover;">
                      <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700"><?php the_title(); ?></h2>
                      <h1 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="1500"><?php the_field('sm_subheading'); ?></h1>
                      <h3 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="2300"><a href="<?php the_field('sm_btn_url'); ?>"><?php the_field('sm_btn_text'); ?></a></h3>
                  </div>

                <?php }
              } else { ?>

                <div class="pogoSlider-slide">
              	   <h2 class="pogoSlider-slide-element">Felmeddelande</h2>
                   <p>Du måste ange minst två slides för att denna sektion ska fungera</p>
                </div>
                <div class="pogoSlider-slide">
               	   <h2 class="pogoSlider-slide-element">Felmeddelande</h2>
                    <p>Du måste ange minst två slides för att denna sektion ska fungera</p>
                </div>

              <?php }

              // Restore original Post Data
              wp_reset_postdata(); ?>

            </div>
        </div>
        <!--HOME SLIDER AREA END-->

        <?php }
        if ( !is_front_page() ) { ?>

        <!--PAGE BARNER AREA-->
        <div class="page-barner-area">
            <div class="container wow fadeIn">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="barner-text">
                            <h1><?php if ( is_home() || is_single() ) { ?>
                              Senaste <span>nytt</span>
                            <?php } elseif ( is_page() ) {
                              the_title();
                            } elseif ( is_404() ) { ?>
                              404 <span>Kunde inte hittas</span>
                            <?php } elseif ( is_archive() ) {
                              the_archive_title();
                            } elseif ( is_search() ) { ?>
                              Sök
                            <?php } ?>
                            </h1>
                            <?php if(function_exists('bcn_display')) { ?>
                            <ul class="page-location">
                              <?php bcn_display(); ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--PAGE BARNER AREA END-->

        <?php } ?>

    </header>
    <!--END TOP AREA-->
