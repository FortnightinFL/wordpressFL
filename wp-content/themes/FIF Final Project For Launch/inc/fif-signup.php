<?php
/**
 * fif. Sign-up Functions
 *
 * @package fif.
 */

 /*--------------------------------------------------------------
 fif. Signup Page
 ---------------------------------------------------------------*/

 /*--------------------------------------------------------------
 fif. AJAX Functions
 ---------------------------------------------------------------*/

 add_action( 'wp_ajax_nopriv_fif_save_user_signup_form', 'fif_save_signup' );
 add_action( 'wp_ajax_fif_save_user_signup_form', 'fif_save_signup' );

 function fif_save_signup(){

 	$title = wp_strip_all_tags($_POST['name']);
 	$email = wp_strip_all_tags($_POST['email']);

 	$args = array(
 			'post_title' => $title,
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
 		$subject = 'fif. New Mailing List Sign-up - '.$title;

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
 fif. Signup List Shortcode
 ---------------------------------------------------------------*/

  // Mailing Form shortcode
 function fif_signup_form( $atts, $content = null ) {

 	//[signup_form]

 	//get the attributes
 	$atts = shortcode_atts(
 		array(),
 		$atts,
 		'signup_form'
 	);

 	//return HTML
 	ob_start();
 	include 'templates/signup-form.php';
 	return ob_get_clean();

 }

 add_shortcode( 'signup_form', 'fif_signup_form' );
