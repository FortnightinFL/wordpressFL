<?php
/*
    Template Name: Single Page Theme Page
*/

get_header(); ?>

<div id="primary" class="site-content">
    <div id="content" role="main">
        <?php
            $args = array("post__in" => array( 27, 50, 55, 62, 60, 109, 64, 48  ), "post_type" => "page", "order" => "ASC", "orderby" => "post__in");
            $the_query = new WP_Query($args);
        ?>
        <?php if(have_posts()):while($the_query->have_posts()):$the_query->the_post(); ?>
        <?php get_template_part('template-parts/content', 'onepage'); ?>
        <?php endwhile; // End of the loop. ?>
        <?php endif; ?>

    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>

<?php
