<?php
/**
 * The template for displaying in-flight page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Storefront-child
 */

 get_header('inflight'); ?>

     <?php if ( have_posts() ) : ?>

       <?php /* The loop */ ?>

       <?php
       while ( have_posts() ) :
         the_post();?>

         <?php get_template_part( 'template-parts/content', 'inflight' ); ?>

       <?php endwhile; ?>

     <?php else : ?>

       <?php get_template_part( 'template-parts/content', 'none' ); ?>

     <?php endif; ?>

     <section id="cta" class="wrapper style3 take-me-home">
       <div class="fif-take-me-home-btn">
         <h2>I'M LOST! Please, fly me back to the home page...</h2>
         <form action="<?php echo site_url(); ?>">
             <button type="submit" class="btn btn-default btn-lg btn-fif-form">Take Off</button>
         </form>
       </div><!-- .fif-more-news-btn -->
     </section> <!-- wrapper style3  -->

	<?php get_footer('onepage');

  do_action( 'fif_after_footer' );?>
