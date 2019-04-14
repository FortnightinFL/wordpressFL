<?php
/**
 * Quote Post Format
 *
 * @package FIF.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('fif-format-quote'); ?>>

		<span class="post-type-standard-icon dashicons dashicons-format-quote text-center"></span>

	<div class="fif-content-topper"></div><!-- .fif-content-topper -->

	<header class="entry-header text-center">

	<div class"row">
		<div class"col-sm-10 col-md-8 col-sm-offsdet-1 col-md-offset-2">

			<h1 class="quote-content"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h1>
			<?php the_title('<h2 class="quote-author">-', '-</h2>'); ?>

		</div><!-- col-md-8 -->
	</div><!-- .row -->

	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php echo fif_posted_footer(); ?>
	</footer><!--.entry-footer -->

</article>
