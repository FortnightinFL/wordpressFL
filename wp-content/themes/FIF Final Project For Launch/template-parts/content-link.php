<?php
/**
 * link Post Format
 *
 * @package FIF.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('fif-format-link'); ?>>

		<span class="post-type-standard-icon dashicons dashicons-admin-site text-center"></span>

		<div class="fif-content-topper"></div><!-- .fif-content-topper -->

	<header class="entry-header text-center">

		<?php
		$link = fif_grab_url();
		the_title('<h1 class="entry-title"><a href="'. $link .'" target="_blank">', '<div class="link-icon"><span class="dashicons dashicons-admin-links"</span></div></a></h1>');
		?>

	</header><!-- .entry-header -->

</article>
