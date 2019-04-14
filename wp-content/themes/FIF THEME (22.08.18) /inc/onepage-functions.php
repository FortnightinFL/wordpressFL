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

/*--------------------------------------------------------------
                        Posts Shortcode
---------------------------------------------------------------*/

function posts_callback($atts=null, $content=null)
{
    $args = array("post_type" => "post", "orderby" => "date", "order" => "DESC", "post_status" => "publish");
    $posts = new WP_Query($args);
    ?>
        <div style="text-align: center">
    <?php
    if($posts->have_posts()):
        while($posts->have_posts()):
            $posts->the_post();
            ?>
                <div style="display: inline-block; width: 300px; border-color: #333; border-style: solid; border-width: 2px; margin-top: 15px;">
                    <a href="javascript:post_popup('<?php echo get_the_ID(); ?>')"><?php echo get_the_title(); ?></a>
                </div>
            <?php
            $post_array = array(get_the_title(), get_the_permalink(), get_the_date(), wp_get_attachment_url(get_post_thumbnail_id()));
            array_push($posts_array, $post_array);
        endwhile;
        else:
            echo "";
            die();
    endif;

    ?>
        </div>
    <?php
}

add_shortcode("posts", "posts_callback");

/*--------------------------------------------------------------
            Creating AJAX API to Retrieve Post Content
---------------------------------------------------------------*/

function post_content()
{
    $post_id = $_GET["post_id"];
    $content_post = get_post($post_id);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content;

    die();
}

add_action("wp_ajax_post_content", "post_content");
add_action("wp_ajax_nopriv_post_content", "post_content");

/*--------------------------------------------------------------
        Retrieving Post Content and Displaying as Popup
---------------------------------------------------------------*/

function posts_popup()
{
    ?>
        <script>
            function post_popup(id)
            {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php?action=post_content&post_id="+id);
                xhr.onload = function(){
                    var content = xhr.responseText;
                    alert(content);
                }
                xhr.send();
            }
        </script>
    <?php
}

add_action("wp_head", "posts_popup");
