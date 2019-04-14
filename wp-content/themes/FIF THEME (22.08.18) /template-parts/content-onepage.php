<?php
/**
 * Template part for displaying page content in page-onepage.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storefront-child
 */

?>

<article id="post-<?php the_ID(); ?>" class="article-onepage article-has-backgroundThumb">

	<?php if(has_post_thumbnail()) {
	 $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true);
	} ?>

	<div class="onepagelayer">

		<div class="backgroundThumb" style="background-image:url(<?php echo (($feat_image[0]))?>);" data-width="<?php echo (($feat_image[1]))?>" date-height="<?php echo (($feat_image[2]))?>"></div>

				<div class="onepage-content">

						<header class="entry-header-onepage text-center">

							<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>

						</header>

						<div class="entry-content clearfix text-center">

							<?php the_content(); ?>

						</div><!-- .entry-content -->

					</div><!-- .onepage-content -->

		</div><!-- .onepagelayer -->

</article>
