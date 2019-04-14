<?php
/*
 * Template Name: News Page
 *
 * @package Storefront-child
 */

 get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

 		<?php if ( have_posts() ) :

      get_template_part( 'content', 'news' );

 		else :

 			get_template_part( 'loop' );

 		endif; ?>

 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 do_action( 'storefront_sidebar' );
 get_footer();
