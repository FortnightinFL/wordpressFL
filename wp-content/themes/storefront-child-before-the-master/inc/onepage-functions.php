<?php
/**
 * fif. Onepage Functions
 *
 * @package fif.
 */
/*--------------------------------------------------------------
     Programmatically Creating and Setting Home Page
---------------------------------------------------------------*/

if(get_page_by_title("Home") == null)

{
    $post = array(
        "post_title" => "Home",
        "post_status" => "publish",
        "post_type" => "page",
        "menu_order" => "-100",
        "page_template" => "single-page-theme.php"
    );

    wp_insert_post($post);

    $home_page = get_page_by_title("Home");

    update_option("page_on_front",$home_page->ID);
    update_option("show_on_front","page");
}
