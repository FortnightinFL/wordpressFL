<?php
/**
* Aside Post Format
*
* @package FIF.
*
*/

 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class( 'fif-format-aside' ); ?>>

     <span class="post-type-standard-icon dashicons dashicons-format-status text-center"></span>

     <div class="fif-content-topper"></div><!-- .fif-content-topper -->

	<div class="aside-container">

		<div class="row">

			<div class="col-xs-12 text-center">

        <?php if( has_post_thumbnail() ):
    				$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
    		?>

    			<div class="aside-featured background-image" style="background-image: url(<?php echo fif_get_attachment(); ?>);"></div>

    		<?php endif; ?>

			</div><!-- .col-xs-12 -->

			<div class="col-xs-12">

				<header class="entry-header">

					<div class="entry-meta">
						<?php echo fif_posted_meta(); ?>
					</div>

				</header>

				<div class="entry-content">

					<div class="entry-excerpt">
						<?php the_content(); ?>
					</div>

				</div><!-- .entry-content -->

			</div><!-- .col-xs-12 -->

		</div><!-- .row -->

			<footer class="entry-footer">

				<div class="row">

					<div class="col-xs-12">

						<?php echo fif_posted_footer(); ?>

					</div><!-- .col-xs-12 -->

				</div><!-- .row -->

			</footer>

		</div><!-- .aside-container -->

	</article>
