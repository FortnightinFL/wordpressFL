<?php
/*
 * The template for displaying search results pages.
 *
 * @package Storefront-child
 */

 get_header('onepage'); ?>
     <div class="search-container">
     <section id="primary" class="content-area">
         <main id="main" class="site-main" role="main">

         <div id="fif-search-form" class"search-form">
           <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
               <label>
                   <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                   <input type="search" class="search-field"
                       placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                       value="<?php echo get_search_query() ?>" name="s"
                       title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
               </label>
               <input type="submit" class="search-submit"
                   value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
           </form>
         </div><!-- .fif-search-form -->

         <?php if ( have_posts() ) : ?>

             <header class="page-header">
                 <span class="search-page-title"><?php printf( esc_html__( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></span>
             </header><!-- .page-header -->

             <?php /* Start the Loop */ ?>
             <?php while ( have_posts() ) : the_post(); ?>
             <span class="search-post-title"><?php the_title(); ?></span>
             <span class="search-post-excerpt"><?php the_excerpt(); ?></span>
             <span class="search-post-link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span>

             <?php endwhile; ?>

             <?php //the_posts_navigation(); ?>

         <?php else : ?>

             <?php //get_template_part( 'template-parts/content', 'none' ); ?>

         <?php endif; ?>

         <div class="fif-take-me-home-btn">
           <form action="<?php echo site_url(); ?>">
               <button type="submit" class="btn btn-default btn-lg btn-fif-form">Take Me Home</button>
           </form>
         </div><!-- .fif-more-news-btn -->

         </main><!-- #main -->
     </section><!-- #primary -->
 </div>
 <?php get_footer('onepage'); ?>
