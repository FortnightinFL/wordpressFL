<?php
/**
 * Standard Post Format
 *
 * @package FIF.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('fif-epk-page'); ?>>

	<div class="fif-content-topper"></div><!-- .fif-content-topper -->

	<header class="entry-header text-center">

		<h1><?php the_title(); ?></h1>

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

	<div class="entry-content-no-thumb">
			<?php the_content(); ?>
	</div><!--.entry-content-no-thumb -->

</article>
