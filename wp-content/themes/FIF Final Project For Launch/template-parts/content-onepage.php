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

	<div class="image-overlay-onepage">

	<?php if(has_post_thumbnail()) {
	 $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true);
	} ?>

		<div class="backgroundThumb" style="background-image:url(<?php echo (($feat_image[0]))?>);" data-width="<?php echo (($feat_image[1]))?>" date-height="<?php echo (($feat_image[2]))?>"></div>

						<header class="entry-header-onepage text-center">

							<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>

						</header>

								<div class="onepage-content">


										<div class="entry-content clearfix">

											<?php the_content(); ?>

										</div><!-- .entry-content -->

									</div><!-- .onepage-content -->

			</div><!-- .image-overlay-onepage -->

			<div class="fif-more-news-btn">
				<form action="FIF/news">
				    <button type="submit" class="btn btn-default btn-lg btn-fif-form">More FIF News</button>
				</form>
			</div><!-- .fif-more-news-btn -->

</article>
