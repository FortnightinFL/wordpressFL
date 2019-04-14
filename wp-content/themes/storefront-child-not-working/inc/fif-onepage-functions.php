<?php
/**
 * fif. Onepage Functions
 *
 * @package fif.
 */

/*--------------------------------------------------------------
       Programmatically Creating and Setting Home Page
---------------------------------------------------------------*/

if(get_page_by_title("onepage") == null)
{
    $post = array(
        "post_title" => "onepage",
        "post_status" => "publish",
        "post_type" => "page",
        "menu_order" => "-100",
        "page_template" => "front-page.php"
    );

    wp_insert_post($post);

    $front_page = get_page_by_title("onepage");
    update_option("page_on_front",$front_page->ID);
    update_option("show_on_front","page");
}
