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

   // enqueue parent styles
	// wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
	// // enqueue child styles
	// wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
  // // enqueue bootstrap
	// wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array() );
  //
  // // Theme JS
  wp_enqueue_style( 'fif_style' , get_stylesheet_directory_uri() . '/sass/fif.css', array() );
  //
  // wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
  wp_enqueue_script( 'fif', get_stylesheet_directory_uri() . '/assets/fif-js/fif.js', array('jquery') );
  //
  // if (is_front_page( 'front-page') ) {
  //
	// } elseif ( is_page( 'onepage' ) ) {
  //
  //   // enqueue fif Custom Styles
  //   wp_enqueue_style( 'fif', get_stylesheet_directory_uri() . '/css/fif.css', array() );
  //
	// } elseif ( is_page( 'inflight' ) ) {
  //
  //   // Dequeue CSS in-flight page only
  //
  //   wp_dequeue_style( 'parent-theme' );
  //   wp_deregister_style( 'parent-theme' );
  //   wp_dequeue_style( 'child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
  //   wp_deregister_style( 'child-theme' );
  //   wp_dequeue_style( 'fif', get_stylesheet_directory_uri() . '/css/fif.css', array() );
  //   wp_dequeue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array() );
  //
  //   // Dequeue JS in-flight page only
  //
  //   wp_dequeue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
  //   wp_dequeue_script( 'fif', get_stylesheet_directory_uri() . '/js/fif.js', array('jquery') );
  //
  //   // In-flight page CSS
  //
  //   wp_register_style( 'inflightcssSkel', get_stylesheet_directory_uri() . '/inflight/inflightcss/inflight-skel.css', array() );
  //   wp_enqueue_style( 'inflightcssSkel' );
  //   wp_register_style( 'inflightcss', get_stylesheet_directory_uri() . '/inflight/inflightcss/inflight-style.css', array() );
  //   wp_enqueue_style( 'inflightcss' );
  //   wp_register_style( 'inflightstylexlarge', get_stylesheet_directory_uri() . '/inflight/inflightcss/inflight-style-xlarge.css', array() );
  //   wp_enqueue_style( 'inflightstylexlarge' );
  //
  //   // In-flight page JS
  //
  //   wp_enqueue_script( 'inflightJqueryMin', get_stylesheet_directory_uri() . '/inflight/inflightjs/jquery.min.js', array( 'jquery' ) );
  //   wp_enqueue_script( 'inflightdroptron', get_stylesheet_directory_uri() . '/inflight/inflightjs/jquery.dropotron.min.js', array( 'jquery' ) );
  //   wp_enqueue_script( 'inflightScrollmin', get_stylesheet_directory_uri() . '/inflight/inflightjs/jquery.scrollgress.min.js', array( 'jquery' ) );
  //   wp_enqueue_script( 'inflightScrolly', get_stylesheet_directory_uri() . '/inflight/inflightjs/jquery.scrolly.min.js', array( 'jquery' ) );
  //   wp_enqueue_script( 'inflightSlidertron', get_stylesheet_directory_uri() . '/inflight/inflightjs/jquery.slidertron.min.js', array( 'jquery' ) );
  //   wp_enqueue_script( 'inflightSkelMin', get_stylesheet_directory_uri() . '/inflight/inflightjs/skel.min.js', array( 'jquery' ) );
  //   wp_enqueue_script( 'inflightSkelLayers', get_stylesheet_directory_uri() . '/inflight/inflightjs/skel-layers.min.js', array( 'jquery' ) );
  //   wp_enqueue_script( 'inflightinit', get_stylesheet_directory_uri() . '/inflight/inflightjs/init.js', array( 'jquery' ) );
  //
  // }
}

add_action( 'wp_enqueue_scripts', 'fif_load_scripts' );
