<?php
/**
 * fif. Admin
 *
 * @package fif.
 */
/*--------------------------------------------------------------
                Store Front Custom Functions
---------------------------------------------------------------*/

//Functions hooked into storefront_header action

function fif_remove_storefront_header_hooks() {

  remove_action( 'storefront_header', 'storefront_header_container', 0);
  // remove_action( 'storefront_header', 'storefront_skip_links', 5);
  remove_action( 'storefront_header', 'storefront_social_icons', 10);
  remove_action( 'storefront_header', 'storefront_site_branding', 20);
  remove_action( 'storefront_header', 'storefront_secondary_navigation', 30);
  remove_action( 'storefront_header', 'storefront_product_search', 40);
  remove_action( 'storefront_header', 'storefront_header_container_close', 41);
  // remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42);
  // remove_action( 'storefront_header', 'storefront_primary_navigation', 50);
  // remove_action( 'storefront_header', 'storefront_header_cart', 60);
  remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68);

}//custom_remove_storefront_header

add_action( 'init', 'fif_remove_storefront_header_hooks' );

//Remove ‘designed by WooThemes’ in the footer

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
} //custom_remove_footer_credit

//Add A Custom Div to the Footer

function custom_storefront_credit() {
	?>
	<div class="site-info">
		&copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
	</div><!-- .site-info -->
	<?php
} //custom_storefront_credit

add_action( 'init', 'custom_remove_footer_credit', 10 );

//Remove breadcrumbs for Storefront theme

function wc_remove_storefront_breadcrumbs() {
  remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
}//wc_remove_storefront_breadcrumbs

add_action( 'init', 'wc_remove_storefront_breadcrumbs');
