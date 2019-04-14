<?php
/*
    Template Name: Front-Page.
*/

get_header(); ?>

<div id="primary" class="site-content">
    <div id="content" role="main">

        <?php
            $args = array("post__in" => array( 27, 50, 266, 62, 60, 109, 64, 48  ), "post_type" => "page", "order" => "ASC", "orderby" => "post__in");
            $the_query = new WP_Query($args);
        ?>
        <?php if(have_posts()):while($the_query->have_posts()):$the_query->the_post(); ?>
        <?php get_template_part('template-parts/content', 'onepage'); ?>
        <?php endwhile; // End of the loop. ?>
        <?php endif; ?>

    </div><!-- #content -->
</div><!-- #primary -->

<div class="fif-social-wrapper">

    <div class="fif-follow-spotify">
        <iframe src="https://embed.spotify.com/follow/1/?uri=spotify:artist:6rAdr6N0K8zfMTufUvOqnp&size=basic&theme=dark&show-count=0" width="200" height="25" id="spotify" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
    </div><!-- .fif-follow-spotify -->

    <div class="fif-follow-social-media">
        <?php the_widget('fif_Social_Home_Widget'); ?>
    </div><!-- .fif-follow-social-media -->

</div><!-- .fif-social-wrapper -->

<?php get_footer('onepage'); ?>

<!-- <?php //do_action( 'fif_after_footer' );?> -->