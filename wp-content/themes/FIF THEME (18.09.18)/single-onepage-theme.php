<?php
    /*
        Template Name: Onepage Template
    */

get_header('onepage'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="fif-follow-spotify">
					<iframe src="https://embed.spotify.com/follow/1/?uri=spotify:artist:6rAdr6N0K8zfMTufUvOqnp&size=basic&theme=dark&show-count=0" width="200" height="25" id="spotify" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
			</div>

			<?php
					$args = array("post__in" => array( 27, 50, 55, 62, 60, 109, 64, 48  ), "post_type" => "page", "order" => "ASC", "orderby" => "post__in");

					$the_query = new WP_Query($args);

						if(have_posts()):while($the_query->have_posts()):$the_query->the_post();

						get_template_part( 'template-parts/content', 'onepage');

						endwhile;// End of the loop.

						endif;
					?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('onepage');
