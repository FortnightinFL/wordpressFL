<?php
/**
 * The template for displaying the squeeze page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storefront-child
 */
get_header('inflight'); ?>

<div class="signup-grid-container">

  <?php if ( has_post_thumbnail() ): {
   $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true);
  } ?>

  <div class="backgroundThumb" style="background-image:url(<?php echo (($feat_image[0]))?>);" data-width="<?php echo (($feat_image[1]))?>" date-height="<?php echo (($feat_image[2]))?>">
  </div>

  <?php endif; ?>

  <div class="push-30 grid-40 mobile-grid-100">

    <div class="signup-title">

      <?php if ( have_posts() ) : ?>

        <?php /* The loop */ ?>

        <?php
        while ( have_posts() ) :
          the_post();?>

          <?php get_template_part( 'template-parts/content', 'signup' ); ?>

        <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

      <?php endif; ?>

    </div><!-- .signup-title -->

         <div class="signup-inner-con">
            <?php echo do_shortcode( '[signup_form]' ); ?>
         </div><!-- .signup-inner-con -->

  </div><!-- .push-30 grid-40 mobile-grid-100 -->

</div><!-- .signup-grid-container -->

<?php get_footer();
