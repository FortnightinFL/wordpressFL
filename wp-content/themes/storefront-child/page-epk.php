<?php
/**
 * The template for displaying the EPK Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storefront-child
 */
get_header('fifotherpages'); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) : ?>

      <?php /* The loop */ ?>

      <?php
      while ( have_posts() ) :
        the_post();?>

        <?php get_template_part( 'template-parts/content', 'epk'); ?>

      <?php endwhile; ?>

    <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer('onepage');
