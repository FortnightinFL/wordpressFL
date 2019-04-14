<?php
/*
 * Template Name: 404 Page
 *
 * @package Storefront-child
 */
 ?>

<?php get_header('onepage'); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

			<div class="error-404 not-found">

				<div class="page-content">

          <div class="dan-gif"></div>

					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Dan! Dan! DAN! DANNNN!', 'storefront' ); ?></h1>
					</header><!-- .page-header -->

					<p><?php esc_html_e( 'Opps, Dan seems to be ignoring you at the moment. No bother, why don&#39;t you try searching, or check out the links below.', 'storefront' ); ?></p>

          <div id="fif-search-form" class"search-form">
            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <label>
                    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                    <input type="search" class="search-field"
                        placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                        value="<?php echo get_search_query() ?>" name="s"
                        title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                </label>
                <input type="submit" class="search-submit"
                    value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
            </form>
          </div><!-- .fif-search-form -->

          <div class="404-options">
            <ul>
              <li>We can take you straight back to the comfort and safety of our home page, by clicking <a href="<?php echo site_url(); ?>" class="404-home">here.</a></li>
              <li>Contact Us by clicking here <a href="<?php echo site_url(); ?>/#post-48" class="404-contact">Contact Support.</a></li>
              <li>Or you can view some of our recent posts below.</li>
            </ul>
          </div><!-- .404-options -->

          <div class"404-recent-post-wrapper">

            <div class"404-recent-post-title">
              <h3>Recent Posts</h3>
            </div><!-- .404-recent-post-title -->

            <div class"404-recent-posts">
              <ul>
                <?php query_posts('posts_per_page=5'); if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <li><a href="<?php the_permalink() ?>" title="Permalink for : <?php the_title(); ?>"><?php the_title(); ?></a>
                <?php endwhile; endif; ?>
              </ul>
            </div><!-- .404-recent-posts -->

         </div><!-- .404-recent-post-wrapper -->


					<?php if ( storefront_is_woocommerce_activated() ) {

						echo '<section aria-label="' . esc_html__( 'Popular Products', 'storefront' ) . '">';

							echo '<h2>' . esc_html__( 'Popular Products', 'storefront' ) . '</h2>';

							$shortcode_content = storefront_do_shortcode(
								'best_selling_products', array(
									'per_page' => 4,
									'columns'  => 4,
								)
							);

							echo $shortcode_content; // WPCS: XSS ok.

						echo '</section>';
					}
					?>

          <div class="fif-take-me-home-btn">
    				<form action="<?php echo site_url(); ?>">
    				    <button type="submit" class="btn btn-default btn-lg btn-fif-form">Take Me Home</button>
    				</form>
    			</div><!-- .fif-more-news-btn -->

				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('onepage'); ?>
