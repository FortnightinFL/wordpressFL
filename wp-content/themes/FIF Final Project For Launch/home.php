<?php
/*
 * Template Name: Blog Page.
 *
 */

 get_header('onepage'); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

      <?php if ( have_posts() ) : ?>

        <?php /* The loop */ ?>

        <?php
        while ( have_posts() ) :
          the_post();?>

          <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

        <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

      <?php endif; ?>

 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php
 get_footer('onepage');

 do_action( 'fif_after_footer' );
