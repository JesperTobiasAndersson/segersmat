<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SegersMat
 */

$blogclass_single = 'single-blog-page single-blog text-justify';
$blogclass_index = 'single-blog text-center';
?>

<?php if ( is_home() || is_archive() ) { ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('post-content single-blog text-center wow fadeIn'); ?>>
<?php } else { ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('post-content single-blog-page single-blog text-justify wow fadeIn'); ?>>
<?php } ?>
		<div class="blog-image">
			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail('news-img');
			} else { ?>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/default-648x400.jpg" alt="" />
			<?php } ?>
		</div>
		<div class="blog-details">
				<div class="title-and-meta">
						<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
						<p class="post-meta">Av <a href="#"><?php the_author(); ?></a> | <a href="<?php the_permalink(); ?>"><?php the_time('j M, Y'); ?></a></p>
				</div>
				<div class="blog-content">
					<?php if ( is_home() || is_archive() ) {
						the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="read-more">Läs mer</a>
					<?php } else {
						the_content();
					} ?>
				</div>
		</div>
</div>
<?php if ( is_single() ) { ?>
<div class="tags-and-social-bar wow fadeIn">
		<div class="tags">
				<?php the_tags( '<h3><i class="fa fa-tags" aria-hidden="true"></i></h3><ul><li>', '</li><li>', '</li></ul>' ); ?>
		</div>
		<div class="single-post-social-bar text-right">
			<?php if( get_field('sm_share_btns', 'options') ): ?>
				<h3>DELA</h3>
					<?php $smshare = get_field('sm_share_btns', 'options');
					echo do_shortcode($smshare);
			endif; ?>
		</div>
</div>
<?php } ?>
