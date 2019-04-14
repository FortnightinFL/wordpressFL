<?php

/*

@package fif

	========================
		AJAX FUNCTIONS
	========================
*/

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

			$headers[] = 'From: '.get_bloginfo('name').' <'.$to.'>';// From: Fortnight In Florida <info@fortnightinflorida.com.com>
			$headers[] = 'Reply-To:'.$title.' <'.$email.'>';
			$headers[] = 'Content-type: text/html: charset=UTF-8';

			wp_mail( $to, $subject, $message, $headers );

			echo $postID;

		} else {
			echo 0;
		}

    die();

}
