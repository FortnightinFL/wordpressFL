<?php
/**
 * fif. Widgets
 *
 * @package fif.
 */

 /*--------------------------------------------------------------
 Widget Class
 --------------------------------------------------------------*/

 class fif_Profile_Widget extends WP_Widget {

   //Setup the Widget Name, Description, etc....
   public function __construct() {

     $widget_ops = array(
       'classname' => 'fif-profile-widget',
       'description' => 'Custom fif Profile Widget'
     );
     parent::__construct( 'fif_profile', 'fif. Profile', $widget_ops );

   }

   //Back-end Display of Widget
   public function form( $instance ) {
     echo '<p><strong>No options for this Widget!</strong><br>You can control the fields of this widget from <a href="./admin.php?page=drummer_gallop"> this page</a></p>';
   }

   //Front-end Display of Widget
   public function widget(  $args, $instance ){

    $picture = esc_attr( get_option( 'profile_picture' ) );
   	$firstName = esc_attr( get_option( 'first_name' ) );
   	$lastName = esc_attr( get_option( 'last_name' ) );
   	$fullName = $firstName . ' ' . $lastName;
   	$description = esc_attr( get_option( 'user_description' ) );

   	$twitter_icon = esc_attr( get_option( 'twitter_handle' ) );
   	$facebook_icon = esc_attr( get_option( 'facebook_handle' ) );
   	$soundcloud_icon = esc_attr( get_option( 'soundcloud_handle' ) );
    $vimeo_icon = esc_attr( get_option( 'vimeo_handle' ) );
    $instagram_icon = esc_attr( get_option( 'instagram_handle' ) );
    $youtube_icon = esc_attr( get_option( 'youtube_handle' ) );
    $gplus_icon = esc_attr( get_option( 'gplus_handle' ) );

     echo $args['before_widget'];
     ?>
        <div class="text-center">
           <div class="image-container">
             <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
           </div>
              <h1 class="fif-username"><?php print $fullName; ?></h1>
                <h2 class="fif-description"><?php print $description; ?></h2>
                 <div class="icons-wrapper">
                     <?php if( !empty( $twitter_icon ) ): ?>
                       <a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fiftwitter"></span></a>
                     <?php endif;
                     if( !empty( $soundcloud_icon ) ): ?>
                       <a href="https://soundcloud.com/<?php echo $soundcloud_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fifsoundcloud2"></span></a>
                     <?php endif;
                     if( !empty( $facebook_icon ) ): ?>
                       <a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fiffacebook2"></span></a>
                     <?php endif;
                     if( !empty( $instagram_icon ) ): ?>
                       <a href="https://instagram.com/<?php echo $instagram_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fifinstagram"></span></a>
                     <?php endif;
                     if( !empty( $vimeo_icon ) ): ?>
                       <a href="https://vimeo.com/<?php echo $vimeo_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fifvimeo2"></span></a>
                     <?php endif;
                     if( !empty( $gplus_icon ) ): ?>
                     <a href="https://plus.google.com/u/0/+<?php echo $gplus_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon-sidebar--gplus fif-icon fifgoogle-plus2"></span></a>
                     <?php endif;
                     if( !empty( $youtube_icon ) ): ?>
                       <a href="https://youtube.com/<?php echo $youtube_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fifyoutube"></span></a>
				             <?php endif; ?>
           </div><!-- .image-container -->
         </div><!-- .text-center -->
     <?php
     echo $args['after_widget'];
   }

}

 add_action( 'widgets_init', function() {
 	register_widget( 'fif_Profile_Widget' );
 } );

 /*
 	Edit Default WordPress Widgets
 */

 function fif_tag_cloud_font_change( $args ) {

 	$args['smallest'] = 8;
 	$args['largest'] = 8;

 	return $args;

 }
 add_filter( 'widget_tag_cloud_args', 'fif_tag_cloud_font_change' );

 function fif_list_categories_output_change( $links ) {

 	$links = str_replace('</a> (', '</a> <span>', $links);
 	$links = str_replace(')', '</span>', $links);

 	return $links;

 }
 add_filter( 'wp_list_categories', 'fif_list_categories_output_change' );

 /*
 	Save Posts Views
 */
 function fif_save_post_views( $postID ) {

 	$metaKey = 'fif_post_views';
 	$views = get_post_meta( $postID, $metaKey, true );

 	$count = ( empty( $views ) ? 0 : $views );
 	$count++;

 	update_post_meta( $postID, $metaKey, $count );

 }
 remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

 /****************************************************************************
 Functions file for our child theme. Registers three widget areas
 ****************************************************************************/

 function wpmu_register_widgets() {

 	// single post - after content widget area
 	register_sidebar( array(
 		'name' => __( 'Single Post After Content', 'wpmu' ),
 		'id' => 'single-after-content-widget-area',
 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
 		'after_widget' => '</div>',
 		'before_title' => '<h3 class="widgettitle">',
 		'after_title' => '</h3>'
 	));

 	// category archive - before content widget area
 	register_sidebar( array(
 		'name' => __( 'Category Archive Before Content', 'wpmu' ),
 		'id' => 'category-before-content-widget-area',
 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
 		'after_widget' => '</div>',
 		'before_title' => '<h3 class="widgettitle">',
 		'after_title' => '</h3>'
 	));

 	// custom page template - before content widget area
 	register_sidebar( array(
 		'name' => __( 'Widgetized Page Before Content', 'wpmu' ),
 		'id' => 'widgetized-page-before-content-widget-area',
 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
 		'after_widget' => '</div>',
 		'before_title' => '<h3 class="widgettitle">',
 		'after_title' => '</h3>'
 	));

 	// custom page template - after content widget area
 	register_sidebar( array(
 		'name' => __( 'Widgetized Page After Content', 'wpmu' ),
 		'id' => 'widgetized-page-after-content-widget-area',
 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
 		'after_widget' => '</div>',
 		'before_title' => '<h3 class="widgettitle">',
 		'after_title' => '</h3>'
 	));

 }
 add_action( 'widgets_init', 'wpmu_register_widgets' );
