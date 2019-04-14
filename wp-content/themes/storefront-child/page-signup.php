<?php
/**
 * The template for displaying the squeeze page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storefront-child
 */
get_header('signup'); ?>

<div class="signup-grid-container">

  <div class="push-30 grid-40 mobile-grid-100">

    <div class="signup-title">
      <h1>Are you tired of the daily grind?</h1>
      <p>For a limited time only, join our mailing list and recieve TWO free unreleased tracks!</p>
    </div><!-- .signup-title -->

         <div class="signup-inner-con">
            <?php echo do_shortcode( '[signup_form]' ); ?>
         </div><!-- .signup-inner-con -->

  </div><!-- .push-30 grid-40 mobile-grid-100 -->

</div><!-- .signup-grid-container -->

<?php get_footer();
