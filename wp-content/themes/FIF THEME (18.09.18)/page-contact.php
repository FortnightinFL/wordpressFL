
<?php
/**
 * The template for displaying the contact page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storefront-child
 */

 get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

 			<div class="container">

 				<?php

 					if( have_posts() ):

 						while( have_posts() ): the_post();

 							get_template_part( 'template-parts/content', 'contact' );

 						endwhile;

 					endif;

 				?>

 			</div><!-- .container -->

 		</main>
 	</div><!-- #primary -->

 <?php get_footer();
