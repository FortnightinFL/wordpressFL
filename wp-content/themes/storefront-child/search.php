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
         <div class="search-page-form" id="ss-search-page-form"><?php get_search_form(); ?></div>

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

         <div class="search-actions">
              <a href="<?php echo site_url(); ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>&nbsp;Take Me Home </a>
         </div><!-- .search-actions -->

         </main><!-- #main -->
     </section><!-- #primary -->
 </div>
 <?php //get_sidebar(); ?>
 <?php get_footer('onepage'); ?>
