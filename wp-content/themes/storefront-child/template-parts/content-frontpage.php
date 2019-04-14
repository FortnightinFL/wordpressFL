<?php
/**
 * Page Front Page Blog Post
 *
 * @package FIF.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('front-page-posts'); ?>>

	<div class="post-image-onepage-news">

	</div><!-- .post-image-onepage-news -->

	<header class="entry-header text-center news">

		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>

	</header>

	<div class="entry-content clearfix news">

		<?php the_excerpt(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer news">
		<?php  ?>
	</footer>

</article>
