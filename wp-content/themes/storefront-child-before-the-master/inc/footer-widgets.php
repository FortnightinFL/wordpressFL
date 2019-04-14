<?php
/**
 * Footer Social Media Icons
 *
 * @package FIF
 */

/*--------------------------------------------------------------
>>> Footer Social Media Widget
---------------------------------------------------------------*/

class FIF_Footer_Social_Widget extends WP_Widget {

  //Setup the Widget Name, Description, etc....
  public function __construct() {

    $widget_ops = array(
      'classname' => 'fif-social-footer-widget',
      'description' => 'Custom fif Social Media Widget'
    );
    parent::__construct( 'fif_social', 'fif. Social Media', $widget_ops );

  }

  //Back-end Display of Widget
  public function form( $instance ) {
    echo '<p><strong>No options for this Widget!</strong><br>You can control the fields of this widget from <a href="./admin.php?page=drummer_gallop"> this page</a></p>';
  }

  //Front-end Display of Widget
  public function widget(  $args, $instance ){

   $twitter_icon = esc_attr( get_option( 'twitter_handle' ) );
   $facebook_icon = esc_attr( get_option( 'facebook_handle' ) );
   $soundcloud_icon = esc_attr( get_option( 'soundcloud_handle' ) );
   $vimeo_icon = esc_attr( get_option( 'vimeo_handle' ) );
   $instagram_icon = esc_attr( get_option( 'instagram_handle' ) );
   $youtube_icon = esc_attr( get_option( 'youtube_handle' ) );
   $gplus_icon = esc_attr( get_option( 'gplus_handle' ) );
   $spotify_icon = esc_attr( get_option( 'spotify_handle' ) );

    echo $args['before_widget'];
    ?>
       <div class="text-right">
          <div class="image-container-footer">
                <div class="icons-wrapper icons-footer">

                    <?php if( !empty( $spotify_icon ) ): ?>
                      <a href="https://open.spotify.com/artist/<?php echo $spotify_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fif-spotify1"></span></a>
                    <?php endif;
                    if( !empty( $soundcloud_icon ) ): ?>
                      <a href="https://soundcloud.com/<?php echo $soundcloud_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fif-soundcloud1"></span></a>
                    <?php endif;
                    if( !empty( $youtube_icon ) ): ?>
                      <a href="https://youtube.com/<?php echo $youtube_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fif-youtube1"></span></a>
                    <?php endif;
                    if( !empty( $instagram_icon ) ): ?>
                      <a href="https://instagram.com/<?php echo $instagram_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fif-instagram1"></span></a>
                    <?php endif;
                    if( !empty( $twitter_icon ) ): ?>
                      <a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fif-twitter1"></span></a>
                    <?php endif;
                    if( !empty( $facebook_icon ) ): ?>
                      <a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fif-facebook1"></span></a>
                    <?php endif;
                    if( !empty( $vimeo_icon ) ): ?>
                      <a href="https://vimeo.com/<?php echo $vimeo_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon fif-vimeo1"></span></a>
                    <?php endif;
                    if( !empty( $gplus_icon ) ): ?>
                    <a href="https://plus.google.com/u/0/+<?php echo $gplus_icon; ?>" target="_blank"><span class="fif-icon-sidebar fif-icon-sidebar--gplus fif-icon fif-googleplus"></span></a>
                    <?php endif; ?>

          </div><!-- .image-container-footer -->
        </div><!-- .text-right -->
    <?php
    echo $args['after_widget'];
  }

}

add_action( 'widgets_init', function() {
 register_widget( 'fif_Footer_Social_Widget' );
} );
