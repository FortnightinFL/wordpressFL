<?php

/*

@package fif

	===============================
		Storefront Custom Functions
	===============================
*/

/* How to remove the search bar from the header */

function custom_remove_storefront_header() {
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

} //custom_remove_storefront_header

add_action( 'init', 'custom_remove_storefront_header' );

/* Storefront Nav for Shop and other pages  */

function fif_remove_storefront_header_shop_hooks() {

// remove_action( 'storefront_header_shop', 'storefront_header_container', 0);
// remove_action( 'storefront_header_shop', 'storefront_skip_links', 5);
// remove_action( 'storefront_header_shop', 'storefront_social_icons', 10);
// remove_action( 'storefront_header_shop', 'storefront_site_branding', 20);
// remove_action( 'storefront_header_shop', 'storefront_secondary_navigation', 30);
// remove_action( 'storefront_header_shop', 'storefront_product_search', 40);
// remove_action( 'storefront_header_shop', 'storefront_header_container_close', 41);
// remove_action( 'storefront_header_shop', 'storefront_primary_navigation_wrapper', 42);
// remove_action( 'storefront_header_shop', 'storefront_primary_navigation', 50);
// remove_action( 'storefront_header_shop', 'storefront_header_cart', 60);
// remove_action( 'storefront_header_shop', 'storefront_primary_navigation_wrapper_close', 68);

} //fif_remove_storefront_header_shop_hooks

add_action( 'init', 'fif_remove_storefront_header_shop_hooks' );

/* Remove ‘designed by WooThemes’ in the footer */

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
} //custom_remove_footer_credit

function custom_storefront_credit() {
	?>
	<div class="site-info">
		&copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
	</div><!-- .site-info -->
	<?php
} //custom_storefront_credit

add_action( 'init', 'custom_remove_footer_credit', 10 );
