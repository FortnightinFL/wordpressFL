<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storefront-child
 */

 get_header('store'); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

 			<?php
 			/**
 			 * Functions hooked in to homepage action
 			 *
 			 * @hooked storefront_homepage_content      - 10
 			 * @hooked storefront_product_categories    - 20
 			 * @hooked storefront_recent_products       - 30
 			 * @hooked storefront_featured_products     - 40
 			 * @hooked storefront_popular_products      - 50
 			 * @hooked storefront_on_sale_products      - 60
 			 * @hooked storefront_best_selling_products - 70
 			 */
 			do_action( 'homepage' ); ?>

 		</main><!-- #main -->
 	</div><!-- #primary -->
 <?php
 get_footer();
