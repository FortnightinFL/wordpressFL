<h1>Fortnight In Florida Social Media Options</h1>
<?php settings_errors(); ?>
<?php

	$twitter_icon = esc_attr( get_option( 'twitter_handle' ) );
	$facebook_icon = esc_attr( get_option( 'facebook_handle' ) );
	$soundcloud_icon = esc_attr( get_option( 'soundcloud_handle' ) );
  $vimeo_icon = esc_attr( get_option( 'vimeo_handle' ) );
  $instagram_icon = esc_attr( get_option( 'instagram_handle' ) );
  $youtube_icon = esc_attr( get_option( 'youtube_handle' ) );
  $gplus_icon = esc_attr( get_option( 'gplus_handle' ) );

?>

<div class="fif-sidebar-preview">
	<div class="fif-sidebar">
    <div class="icons-wrapper">
			<?php if( !empty( $twitter_icon ) ): ?>
				<span class="fif-icon-sidebar fif-before fiftwitter"></span>
			<?php endif;
			if( !empty( $facebook_icon ) ): ?>
				<span class="fif-icon-sidebar fif-before fiffacebook2"></span>
			<?php endif;
			if( !empty( $soundcloud_icon ) ): ?>
				<span class="fif-icon-sidebar fif-before fifsoundcloud2"></span>
			<?php endif; ?>
      <?php if( !empty( $vimeo_icon ) ): ?>
				<span class="fif-icon-sidebar fif-before fifvimeo2"></span>
			<?php endif;
			if( !empty( $instagram_icon ) ): ?>
				<span class="fif-icon-sidebar fif-before fifinstagram"></span>
			<?php endif;
			if( !empty( $youtube_icon ) ): ?>
				<span class="fif-icon-sidebar fif-before fifyoutube"></span>
			<?php endif;
      if( !empty( $gplus_icon ) ): ?>
				<span class="fif-icon-sidebar fif-icon-sidebar--gplus fif-before fifgoogle-plus2"></span>
			<?php endif; ?>
		</div><!-- .icons-wrapper -->
	</div><!-- .fif-sidebar -->
</div><!-- .fif-sidebar-preview -->

<form id="submitForm" method="post" action="options.php" class="fif-general-form">
	<?php settings_fields( 'fif-settings-group' ); ?>
	<?php do_settings_sections( 'drummer_gallop' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>
