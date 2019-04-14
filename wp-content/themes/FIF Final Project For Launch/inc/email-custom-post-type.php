<?php
/**
 * Fortnight In Florida. Email Popup
 *
 * @package Fortnight In Florida.
 */

/*--------------------------------------------------------------
>>> Email Pop-Up Function
---------------------------------------------------------------*/

// //* Add email subscription popup section
// function wd_email_popup() {
// 	get_template_part( 'template-parts/email-popup' );
// }
//
// add_action( 'fif_after_footer', 'wd_email_popup' );
//
//
// function wd_enqueue_scripts() {
// 	wp_register_script( 'wd-cookie', get_stylesheet_directory_uri() . '/js/jquery.cookie.js' );
// 	wp_enqueue_script( 'wd-cookie' );
// }
//
// add_action( 'wp_enqueue_scripts', 'wd_enqueue_scripts' );

/*--------------------------------------------------------------
fif. Theme Custom Post Types
---------------------------------------------------------------*/

$mailing = get_option( 'activate_mailing' );
if( @$mailing == 1 ){

 add_action( 'init', 'fif_mailing_custom_post_type' );

	add_filter( 'manage_fifmailing_posts_columns', 'drummer_set_fifmailing_colunms' );
	add_action( 'manage_fifmailing_posts_custom_column', 'fif_mailing_custom_column', 10, 2 );

	add_action( 'add_meta_boxes', 'fif_mailing_add_meta_box');
	add_action( 'save_post', 'fif_save_mailing_email_data');
}

/* Mailing CPT */
function fif_mailing_custom_post_type() {
 $labels = array(
	 'name' 				    => 'Mailing List',
	 'singular_name' 	=> 'Mail List',
	 'menu_name'			  => 'Mailing List',
	 'name_admin_bar'	=> 'Mailing List'
 );

 $args = array(
	 'labels'			    => $labels,
	 'show_ui'			    => true,
	 'show_in_menu'		=> true,
	 'capability_type'	=> 'post',
	 'hierarchical'		=> false,
	 'menu_position'		=> 26,
	 'menu_icon'			  => 'dashicons-carrot',
	 'supports'			  => array( 'title', 'editor', 'author' )
 );

 register_post_type( 'fifmailing', $args );

}

function drummer_set_fifmailing_colunms( $columns ){
	$newColumns = array ();
	$newColumns ['title'] = 'Full Name';
	// $newColumns ['message'] = 'Message';
	$newColumns ['email'] = 'email';
	$newColumns ['date'] = 'Date';
	return $newColumns;
}

function fif_mailing_custom_column( $column, $post_id ){

	switch( $column ){

		// case 'message' :
		// //Message Column
		// 		echo get_the_excerpt();
		// 		break;

		case 'email' :
		//Email Column
				$email = get_post_meta( $post_id, '_mailing_email_value_key', true );
				echo '<a href="mailto: '.$email.'">'.$email.'</a>';
				break;
	}

}

/* MAILING META BOXES */

function fif_mailing_add_meta_box() {
	add_meta_box( 'mailing_email', 'User Email', 'fif_mailing_email_callback', 'fifmailing', 'side', 'default' );
}

function fif_mailing_email_callback( $post ) {
	wp_nonce_field( 'fif_save_mailing_email_data', 'fif_mailing_email_meta_box_nonce');

	$value = get_post_meta( $post->ID, '_mailing_email_value_key', true );

	echo '<label for="fif_mailing_email_feild">User Email Address: </label>';
	echo '<input type="email"id="fif_mailing_email_feild" name="fif_mailing_email_feild" value="'. esc_attr( $value ) .'" size="25" />';
}

function fif_save_mailing_email_data( $post_id ) {

	if( ! isset($_POST['fif_mailing_email_meta_box_nonce'] ) ){
		return;
	}

	if( ! wp_verify_nonce( $_POST['fif_mailing_email_meta_box_nonce'], 'fif_save_mailing_email_data') ) {
		return;
	}

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return;
	}

	if( ! current_user_can( 'edit_post', $post_id) ){
		return;
	}

	if( !isset( $_POST['fif_mailing_email_feild']) ){
		return;
	}

	$my_data = sanitize_text_field( $_POST['fif_mailing_email_feild']);

	update_post_meta( $post_id, '_mailing_email_value_key', $my_data);

}

/*--------------------------------------------------------------
fif. AJAX Functions
---------------------------------------------------------------*/

add_action( 'wp_ajax_nopriv_fif_save_user_mailing_form', 'fif_save_mailing' );
add_action( 'wp_ajax_fif_save_user_mailing_form', 'fif_save_mailing' );

function fif_save_mailing(){

	$title = wp_strip_all_tags($_POST['name']);
	$email = wp_strip_all_tags($_POST['email']);
	//$message = wp_strip_all_tags($_POST['message']);

	$args = array(
			'post_title' => $title,
			//'post_content' => $message,
			'post_author' => 1,
			'post_status' => 'publish',
			'post_type' => 'fifmailing',
			'meta_input' => array(
					'_mailing_email_value_key' => $email,
			),
	);

	$postID = wp_insert_post($args);

	if( $poseID !== 0){

		$to = get_bloginfo( 'admin_email' );
		$subject = 'fif. Mailing List Sign-up - '.$title;

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
fif. Mailing List Shortcode
---------------------------------------------------------------*/

 // Mailing Form shortcode
function fif_mailing_form( $atts, $content = null ) {

	//[mailing_form]

	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);

	//return HTML
	ob_start();
	include 'templates/mailing-form.php';
	return ob_get_clean();

}

add_shortcode( 'mailing_form', 'fif_mailing_form' );
