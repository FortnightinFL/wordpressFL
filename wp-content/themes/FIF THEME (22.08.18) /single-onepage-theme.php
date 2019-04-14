<?php
    /*
        Template Name: Onepage Template
    */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
					$args = array("post__in" => array( 27, 50, 55, 62, 60, 109, 64, 58, 48  ), "post_type" => "page", "order" => "ASC", "orderby" => "post__in");

					$the_query = new WP_Query($args);

						if(have_posts()):while($the_query->have_posts()):$the_query->the_post();

						get_template_part( 'template-parts/content', 'onepage');

						endwhile;// End of the loop.

						endif;
					?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
