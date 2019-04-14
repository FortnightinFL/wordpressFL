<?php
/**
 * fif. Admin
 *
 * @package fif.
 */
/*--------------------------------------------------------------
fif. Admin Page
---------------------------------------------------------------*/

function fif_add_admin_page() {
  //Generate fif Admin Page
  add_menu_page( 'fif Theme Options', 'Fortnight In Florida', 'manage_options', 'drummer_gallop', 'fif_theme_create_page', 'dashicons-admin-generic', 110);

  //Generate fif Admin Sub Pages
  add_submenu_page( 'drummer_gallop', 'fif Social Options', 'Socials', 'manage_options', 'drummer_gallop', 'fif_theme_create_page');
  add_submenu_page( 'drummer_gallop', 'fif Theme Options', 'Theme Options', 'manage_options', 'fif_theme','fif_theme_support_page');
  add_submenu_page( 'drummer_gallop', 'fif Contact Form', 'Contact Form', 'manage_options', 'fif_contact', 'fif_theme_form_page' );


}
add_action( 'admin_menu', 'fif_add_admin_page');

//Activate Custom settings
add_action( 'admin_init', 'fif_custom_settings');

function fif_custom_settings() {

  //Sidebar Options

  register_setting( 'fif-settings-group', 'twitter_handle', 'fif_sanitize_twitter_handle');
  register_setting( 'fif-settings-group', 'facebook_handle','fif_sanitize_facebook_handle');
  register_setting( 'fif-settings-group', 'gplus_handle','fif_sanitize_gplus_handle');
  register_setting( 'fif-settings-group', 'soundcloud_handle','fif_sanitize_soundcloud_handle');
  register_setting( 'fif-settings-group', 'vimeo_handle','fif_sanitize_vimeo_handle');
  register_setting( 'fif-settings-group', 'instagram_handle','fif_sanitize_instagram_handle');
  register_setting( 'fif-settings-group', 'youtube_handle','fif_sanitize_youtube_handle');
  register_setting( 'fif-settings-group', 'spotify_handle','fif_sanitize_spotify_handle');

  add_settings_section('fif-sidebar-options','Sidebar Options','fif_sidebar_options','drummer_gallop');

  add_settings_field( 'sidebar-twitter', 'Twitter', 'fif_sidebar_twitter', 'drummer_gallop', 'fif-sidebar-options');
  add_settings_field( 'sidebar-facebook', 'Facebook', 'fif_sidebar_facebook', 'drummer_gallop', 'fif-sidebar-options');
  add_settings_field( 'sidebar-gplus', 'Google+', 'fif_sidebar_gplus', 'drummer_gallop', 'fif-sidebar-options');
  add_settings_field( 'sidebar-soundcloud', 'Soundcloud', 'fif_sidebar_soundcloud', 'drummer_gallop', 'fif-sidebar-options');
  add_settings_field( 'sidebar-vimeo', 'Vimeo', 'fif_sidebar_vimeo', 'drummer_gallop', 'fif-sidebar-options');
  add_settings_field( 'sidebar-instagram', 'Instagram', 'fif_sidebar_instagram', 'drummer_gallop', 'fif-sidebar-options');
  add_settings_field( 'sidebar-youtube', 'YouTube', 'fif_sidebar_youtube', 'drummer_gallop', 'fif-sidebar-options');
  add_settings_field( 'sidebar-spotify', 'Spotify', 'fif_sidebar_spotify', 'drummer_gallop', 'fif-sidebar-options');

  //Theme Support Options

  register_setting( 'fif-theme-support', 'post_formats');
  register_setting( 'fif-theme-support', 'custom_header');
  register_setting( 'fif-theme-support', 'custom_background');

  add_settings_section( 'fif-theme-options', 'fif. Theme Options', 'fif_theme_options', 'fif_theme');

  add_settings_field( 'post-formats', 'Post Formats', 'fif_post_formats', 'fif_theme', 'fif-theme-options');
  add_settings_field( 'custom-header', 'Custom Header', 'fif_custom_header', 'fif_theme', 'fif-theme-options');
  add_settings_field( 'custom-background', 'Custom Background', 'fif_custom_background', 'fif_theme', 'fif-theme-options');

  //Contact Form Options

  register_setting( 'fif-contact-options', 'activate_contact' );

  add_settings_section( 'fif-contact-section', 'Contact Form', 'fif_contact_section', 'fif_contact');

  add_settings_field( 'activate-form', 'Activate Contact Form', 'fif_activate_contact', 'fif_contact', 'fif-contact-section' );

  //Custom CSS Options

  register_setting( 'fif-custom-css-options', 'fif_css', 'fif_sanitize_custom_css');

  add_settings_section( 'fif-custom-css-section', 'Custom CSS', 'fif_custom_css_section_callback', 'fif_css' );

  add_settings_field( 'custom-css', 'Insert your custom CSS', 'fif_custom_css_callback', 'fif_css', 'fif-custom-css-section');

}

//fif. Admin CALL BACKS

function fif_post_formats_callback( $input ){
  return $input;
}

function fif_theme_options(){
  echo 'Activate and Deactivate specific Theme Support Options';
}

function fif_contact_section(){
  echo 'Activate and Deactivate the Built-in Contact Form';
}

function fif_custom_css_section_callback(){
  echo 'Customise fif. with your own CSS';
}

//Custom CSS
function fif_custom_css_callback() {
	$css = get_option( 'fif_css' );
	$css = ( empty($css) ? '/* fif. Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="fif_css" name="fif_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

//Contact Form
function fif_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}

function fif_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

//Custom Header/Background
function fif_custom_header() {
	$options = get_option( 'custom_header' );
  $checked = ( @$options[$format] == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function fif_custom_background() {
	$options = get_option( 'custom_background' );
  $checked = ( @$options[$format] == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

//Sidebar Options Functions

function fif_sidebar_options() {
  echo 'Customise My Sidebar Options';
}
function fif_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}

}
function fif_sidebar_name() {
  $firstName = esc_attr(get_option( 'first_name') );
  $lastName = esc_attr(get_option( 'last_name') );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function fif_sidebar_description() {
  $description = esc_attr(get_option( 'user_description') );
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Write something smart." />';
}
function fif_sidebar_twitter(){
  $twitter = esc_attr(get_option( 'twitter_handle') );
  echo '<input type="text" name="twitter_handle" value="'.$twitter.'" placeholder="@Twitter" /> <p class="description">Input Your Twitter username without the @ character.</p>';
}
function fif_sidebar_facebook(){
  $facebook = esc_attr(get_option( 'facebook_handle') );
  echo '<input type="text" name="facebook_handle" value="'.$facebook.'" placeholder="@facebook" /> <p class="description">Input Your facebook username without the @ character.</p>';
}
function fif_sidebar_gplus(){
  $gplus = esc_attr(get_option( 'gplus_handle') );
  echo '<input type="text" name="gplus_handle" value="'.$gplus.'" placeholder="Google+" /> <p class="description">Input Your Google+ username.</p>';
}
function fif_sidebar_soundcloud(){
  $soundcloud = esc_attr(get_option( 'soundcloud_handle') );
  echo '<input type="text" name="soundcloud_handle" value="'.$soundcloud.'" placeholder="soundcloud" /> <p class="description">Input Your soundcloud username.</p>';
}
function fif_sidebar_instagram(){
  $instagram = esc_attr(get_option( 'instagram_handle') );
  echo '<input type="text" name="instagram_handle" value="'.$instagram.'" placeholder="@Instagram" /> <p class="description">Input Your Instagram username without the @ character.</p>';
}
function fif_sidebar_vimeo(){
  $vimeo = esc_attr(get_option( 'vimeo_handle') );
  echo '<input type="text" name="vimeo_handle" value="'.$vimeo.'" placeholder="Vimeo" /> <p class="description">Input Your Vimeo username.</p>';
}
function fif_sidebar_youtube(){
  $youtube = esc_attr(get_option( 'youtube_handle') );
  echo '<input type="text" name="youtube_handle" value="'.$youtube.'" placeholder="YouTube" /> <p class="description">Input Your YouTube username.</p>';
}
function fif_sidebar_spotify(){
  $spotify = esc_attr(get_option( 'spotify_handle') );
  echo '<input type="text" name="spotify_handle" value="'.$spotify.'" placeholder="Spotify" /> <p class="description">Input Your Spotify Profile Name.</p>';
}

//Sanitization Settings

function fif_sanitize_twitter_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}
function fif_sanitize_facebook_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}
function fif_sanitize_gplus_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}
function fif_sanitize_soundcloud_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}
function fif_sanitize_instagram_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}
function fif_sanitize_vimeo_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}
function fif_sanitize_youtube_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}
function fif_sanitize_spotify_handle( $input ){
  $output = sanitize_text_field( $input );
  $output = str_replace('@','', $output);
  return $output;
}

//CSS Sanitize Text Area
function fif_sanitize_custom_css( $input ){
  $output = esc_textarea( $input );
  return $output;
}

//Template submenu functions
function fif_theme_create_page() {
	require_once( get_stylesheet_directory() . '/inc/templates/fif-admin.php' );
}

function fif_theme_support_page() {
	require_once( get_stylesheet_directory() . '/inc/templates/fif-theme-support.php' );
}

function fif_theme_form_page() {
	require_once( get_stylesheet_directory() . '/inc/templates/fif-contact-form.php' );
}

function fif_theme_settings_page() {
	require_once( get_stylesheet_directory() . '/inc/templates/fif-custom-css.php' );
}
