<?php
/**
 * fif. Admin
 *
 * @package fif.
 */

 /*--------------------------------------------------------------
fif. Fake Email Server (For Dev Only)
---------------------------------------------------------------*/

// function mailtrap($phpmailer) {
//   $phpmailer->isSMTP();
//   $phpmailer->Host = 'smtp.mailtrap.io';
//   $phpmailer->SMTPAuth = true;
//   $phpmailer->Port = 2525;
//   $phpmailer->Username = 'b502f3bdf49408';
//   $phpmailer->Password = '316cf43cb9cc6a';
// }
// 
// add_action('phpmailer_init', 'mailtrap');

 /*--------------------------------------------------------------
 fif. Theme Custom Post Types
 ---------------------------------------------------------------*/

 $contact = get_option( 'activate_contact' );
 if( @$contact == 1 ){

 	add_action( 'init', 'fif_contact_custom_post_type' );

   add_filter( 'manage_fifcontact_posts_columns', 'drummer_set_fifcontact_colunms' );
   add_action( 'manage_fifcontact_posts_custom_column', 'fif_ccontact_custom_column', 10, 2 );

   add_action( 'add_meta_boxes', 'fif_contact_add_meta_box');
   add_action( 'save_post', 'fif_save_contact_email_data');
 }

 /* CONTACT CPT */
 function fif_contact_custom_post_type() {
 	$labels = array(
 		'name' 				    => 'Messages',
 		'singular_name' 	=> 'Message',
 		'menu_name'			  => 'Messages',
 		'name_admin_bar'	=> 'Message'
 	);

 	$args = array(
 		'labels'			    => $labels,
 		'show_ui'			    => true,
 		'show_in_menu'		=> true,
 		'capability_type'	=> 'post',
 		'hierarchical'		=> false,
 		'menu_position'		=> 26,
 		'menu_icon'			  => 'dashicons-email-alt',
 		'supports'			  => array( 'title', 'editor', 'author' )
 	);

 	register_post_type( 'fifcontact', $args );

 }

 function drummer_set_fifcontact_colunms( $columns ){
   $newColumns = array ();
   $newColumns ['title'] = 'Full Name';
   $newColumns ['message'] = 'Message';
   $newColumns ['email'] = 'email';
   $newColumns ['date'] = 'Date';
   return $newColumns;
 }

 function fif_ccontact_custom_column( $column, $post_id ){

   switch( $column ){

     case 'message' :
     //Message Column
         echo get_the_excerpt();
         break;

     case 'email' :
     //Email Column
         $email = get_post_meta( $post_id, '_contact_email_value_key', true );
         echo '<a href="mailto: '.$email.'">'.$email.'</a>';
         break;
   }

 }

 /* CONTACT META BOXES */

 function fif_contact_add_meta_box() {
   add_meta_box( 'contact_email', 'User Email', 'fif_contact_email_callback', 'fifcontact', 'side', 'default' );
 }

 function fif_contact_email_callback( $post ) {
   wp_nonce_field( 'fif_save_contact_email_data', 'fif_contact_email_meta_box_nonce');

   $value = get_post_meta( $post->ID, '_contact_email_value_key', true );

   echo '<label for="fif_contact_email_feild">User Email Address: </label>';
   echo '<input type="email"id="fif_contact_email_feild" name="fif_contact_email_feild" value="'. esc_attr( $value ) .'" size="25" />';
 }

 function fif_save_contact_email_data( $post_id ) {

   if( ! isset($_POST['fif_contact_email_meta_box_nonce'] ) ){
     return;
   }

   if( ! wp_verify_nonce( $_POST['fif_contact_email_meta_box_nonce'], 'fif_save_contact_email_data') ) {
     return;
   }

   if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
     return;
   }

   if( ! current_user_can( 'edit_post', $post_id) ){
     return;
   }

   if( !isset( $_POST['fif_contact_email_feild']) ){
     return;
   }

   $my_data = sanitize_text_field( $_POST['fif_contact_email_feild']);

   update_post_meta( $post_id, '_contact_email_value_key', $my_data);

 }

 /*--------------------------------------------------------------
 fif. AJAX Functions
 ---------------------------------------------------------------*/

add_action( 'wp_ajax_nopriv_fif_save_user_contact_form', 'fif_save_contact' );
add_action( 'wp_ajax_fif_save_user_contact_form', 'fif_save_contact' );

function fif_save_contact(){

   $title = wp_strip_all_tags($_POST['name']);
   $email = wp_strip_all_tags($_POST['email']);
   $message = wp_strip_all_tags($_POST['message']);

   $args = array(
       'post_title' => $title,
       'post_content' => $message,
       'post_author' => 1,
       'post_status' => 'publish',
       'post_type' => 'fifcontact',
       'meta_input' => array(
           '_contact_email_value_key' => $email,
       ),
   );

   $postID = wp_insert_post($args);

   if( $poseID !== 0){

     $to = get_bloginfo( 'admin_email' );
     $subject = 'fif. Contact Form - '.$title;

     $headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>';// From: Fortnight In Florida <info@fortnightinflorida.com>
     $headers[] = 'Reply-To:'.$title.' <'.$email.'>';
     $headers[] = 'Content-type: text/html: charset=UTF-8';

     wp_mail( $to, $subject, $message, $headers );

     echo $postID;

   } else {
     echo 0;
   }

   die();

}

/*--------------------------------------------------------------
fif. Contact Shortcode
---------------------------------------------------------------*/

 // Contact Form shortcode
function fif_contact_form( $atts, $content = null ) {

	//[contact_form]

	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);

	//return HTML
	ob_start();
	include 'templates/contact-form.php';
	return ob_get_clean();

}

add_shortcode( 'contact_form', 'fif_contact_form' );
