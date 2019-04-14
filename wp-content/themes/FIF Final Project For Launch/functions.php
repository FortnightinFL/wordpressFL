<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}
/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

 require ( get_stylesheet_directory() . '/inc/enqueue.php' );

 require ( get_stylesheet_directory() . '/inc/contact-custom-post-type.php' );
 require ( get_stylesheet_directory() . '/inc/email-custom-post-type.php' );
 require ( get_stylesheet_directory() . '/inc/fif-signup.php' );
 require ( get_stylesheet_directory() . '/inc/fif-onepage-functions.php' );
 require ( get_stylesheet_directory() . '/inc/footer-widgets.php' );
 require ( get_stylesheet_directory() . '/inc/function-admin.php' );
 require ( get_stylesheet_directory() . '/inc/storefront-custom-functions.php' );
 require ( get_stylesheet_directory() . '/inc/theme-support.php' );
 require ( get_stylesheet_directory() . '/inc/widgets.php' );
