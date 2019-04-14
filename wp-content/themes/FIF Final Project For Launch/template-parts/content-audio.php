<?php
/**
 * Audio Post Format
 *
 * @package FIF.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fif-format-audio' ); ?>>

		<span class="post-type-standard-icon dashicons dashicons-format-audio text-center"></span>

		<div class="fif-content-topper"></div><!-- .fif-content-topper -->

	<header class="entry-header">

		<?php the_title('<h1 class="entry-title"><a href=" ' . esc_url( get_permalink() ) . ' " rel="bookmark">', '</a></h1>'); ?>

		<div class="entry-meta">
			<?php echo fif_posted_meta(); ?>
		</div><!--.entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

	<?php echo fif_get_embedded_media( array('audio', 'iframe') ); ?>

  </div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo fif_posted_footer(); ?>
	</footer><!--.entry-footer -->

</article>
