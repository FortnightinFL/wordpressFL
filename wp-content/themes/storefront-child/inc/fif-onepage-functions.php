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

/*--------------------------------------------------------------
              Calling the Posts to the Onepage
---------------------------------------------------------------*/

function posts_callback($atts=null, $content=null)
{
    $args = array("post_type" => "post", "orderby" => "date", "order" => "DESC", "post_status" => "publish");
    $posts = new WP_Query($args);
    ?>

    <?php
    if($posts->have_posts()):
        while($posts->have_posts()):
            $posts->the_post();
            ?>

            <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

          <?php endwhile; ?>

        <?php else : ?>
          <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

    <?php
}
add_shortcode("posts", "posts_callback");

/*--------------------------------------------------------------
                        Read More///
---------------------------------------------------------------*/

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"><p>...Read the full article</p></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
