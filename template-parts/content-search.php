<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SegersMat
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('single-event clearfix'); ?>>
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="event-img">
				<?php the_post_thumbnail('gallery-img-thumb'); ?>
			</div>
		<?php } ?>
		<div class="event-content">
				<div class="event-details">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
				</div>
		</div>
</div>
