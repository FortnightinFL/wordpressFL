<?php
/**
 * Image Post Format
 *
 * @package FIF.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fif-format-image' ); ?>>

		<span class="post-type-standard-icon dashicons dashicons-camera text-center"></span>

		<div class="fif-content-topper"></div><!-- .fif-content-topper -->

	<header class="entry-header text-center background-image" style="background-image: url(<?php echo fif_get_attachment(); ?>);">

				<?php the_title('<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . ' " rel="bookmark">', '</a></h1>'); ?>

			<div class="entry-meta">
				<?php echo fif_posted_meta(); ?>
			</div><!--.entry-meta -->

			<div class="entry-excerpt image-caption">
				<?php the_excerpt(); ?>

		</div><!--.entry-content -->

	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php echo fif_posted_footer(); ?>
	</footer><!--.entry-footer -->

</article>
