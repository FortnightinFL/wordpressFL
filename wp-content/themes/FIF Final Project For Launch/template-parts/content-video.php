<?php
/**
 * Video Post Format
 *
 * @package FIF.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fif-format-video'); ?>>

		<span class="post-type-standard-icon dashicons dashicons-video-alt3 text-center"></span>

		<div class="fif-content-topper"></div><!-- .fif-content-topper -->

	<header class="entry-header text-center">

		<div class="embed-responsive embed-responsive-16by9">
			<?php echo fif_get_embedded_media( array( 'video', 'iframe') ); ?>
	  </div>

		<?php the_title('<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . ' " rel="bookmark">', '</a></h1>'); ?>

		<div class="entry-meta">
			<?php echo fif_posted_meta(); ?>
		</div><!--.entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if( has_post_thumbnail() ):
				$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
		?>

		<a class="standard-featured-link" href="<?php the_permalink()?>">
			<div class="standard-featured background-image" style="background-image: url(<?php echo fif_get_attachment(); ?>);"></div>
		</a>

		<?php endif; ?>

	</div><!--.entry-content -->

	<div class="entry-excerpt">
			<?php the_excerpt(); ?>
	</div><!--.entry-content -->

	<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-fif"><?php _e( 'Read More' ); ?></a>
	</div>

	<footer class="entry-footer">
		<?php echo fif_posted_footer(); ?>
	</footer><!--.entry-footer -->

</article>
