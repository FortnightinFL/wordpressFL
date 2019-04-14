<?php
/**
 * Fortnight In Florida. functions and definitions
 *
 * @package Fortnight In Florida.
 */

 /*--------------------------------------------------------------
 >>> Admin Enqueue Functions
 ---------------------------------------------------------------*/

 function fif_load_admin_scripts( $hook ){
 	//echo $hook;

 	//register css admin section
 	wp_register_style( 'fif_admin', get_stylesheet_directory_uri() . 'assets/css/fif.admin.css', array() );

 	//register js admin section
 	wp_register_script( 'fif-admin-script', get_stylesheet_directory_uri() . 'assets/fif-js/fif.admin.js', array('jquery') );

 	$pages_array = array(
 		'toplevel_page_drummer_gallop',
 		'fif_page_fif_theme',
 		'fif_page_fif_contact',
 		'fif_page_fif_css'
 	);

  	//PHP 7

  	if( in_array( $hook, $pages_array ) ){

  		wp_enqueue_style( 'fif_admin' );

  	}

  	if( 'toplevel_page_drummer_gallop' == $hook ){

  		wp_enqueue_media();

  		wp_enqueue_script( 'fif-admin-script' );

  	}


  }//fif_load_admin_scripts

  add_action( 'admin_enqueue_scripts', 'fif_load_admin_scripts' );

 /*--------------------------------------------------------------
 >>> FRONT-END ENQUEUE SCRIPTS
 ---------------------------------------------------------------*/

function fif_load_scripts(){

   //Custom CSS
   wp_enqueue_style( 'fif_style' , get_stylesheet_directory_uri() . '/css/fif.css', array() );
   wp_enqueue_style( 'bootstrap-theme-style', '/wp-content/themes/' . get_stylesheet() . '/assets/bootstrap/css/bootstrap.min.css' );
   // Custom JS
   wp_enqueue_script( 'fif', get_stylesheet_directory_uri() . '/js/fif.js', array('jquery') );
   wp_enqueue_script( 'bootstrap-min-script', '/wp-content/themes/' . get_stylesheet() . '/assets/bootstrap/js/bootstrap.min.js', array(), true );

 if (is_page( 'inflight') ) {

   // Dequeue CSS in-flight page only

   wp_dequeue_style( 'parent-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
   wp_deregister_style( 'parent-theme' );
   wp_dequeue_style( 'child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
   wp_deregister_style( 'child-theme' );

   wp_dequeue_style( 'fif', get_stylesheet_directory_uri() . '/css/fif.css', array() );
   wp_dequeue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array() );

   // Dequeue JS in-flight page only

   wp_dequeue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
   wp_dequeue_script( 'fif', get_stylesheet_directory_uri() . '/js/fif.js', array('jquery') );

   // In-flight page CSS

   wp_register_style( 'inflightcssSkel', get_stylesheet_directory_uri() . '/assets/inflight/inflightcss/inflight-skel.css', array() );
   wp_enqueue_style( 'inflightcssSkel' );
   wp_register_style( 'inflightcss', get_stylesheet_directory_uri() . '/assets/inflight/inflightcss/inflight-style.css', array() );
   wp_enqueue_style( 'inflightcss' );
   wp_register_style( 'inflightstylexlarge', get_stylesheet_directory_uri() . '/assets/inflight/inflightcss/inflight-style-xlarge.css', array() );
   wp_enqueue_style( 'inflightstylexlarge' );

   // In-flight page JS

   wp_enqueue_script( 'inflightJqueryMin', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/jquery.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'inflightdroptron', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/jquery.dropotron.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'inflightScrollmin', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/jquery.scrollgress.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'inflightScrolly', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/jquery.scrolly.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'inflightSlidertron', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/jquery.slidertron.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'inflightSkelMin', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/skel.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'inflightSkelLayers', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/skel-layers.min.js', array( 'jquery' ) );
   wp_enqueue_script( 'inflightinit', get_stylesheet_directory_uri() . '/assets/inflight/inflightjs/init.js', array( 'jquery' ) );

 }//if (is_page( 'inflight')

 elseif (is_page( 'signup') ) {

   // In-flight page CSS
   wp_enqueue_style( 'signupcss', get_stylesheet_directory_uri() . '/assets/signup/signupcss/signup-style.css', array() );

   // In-flight page JS
   wp_enqueue_script( 'signupjs', get_stylesheet_directory_uri() . '/assets/signup/signupjs/signup.js', array( 'jquery' ) );

 }//elseif (is_page( 'signup')


}//function fif_load_scripts()

add_action( 'wp_enqueue_scripts', 'fif_load_scripts' );


/*--------------------------------------------------------------
>>> Add WP Native Dashicons
---------------------------------------------------------------*/

//Enqueue the Dashicons script
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
