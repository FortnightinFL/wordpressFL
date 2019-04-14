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
 	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
 	wp_register_style( 'fif_admin', get_stylesheet_directory_uri() . '/css/fif.admin.css', array() );

 	//register js admin section
 	wp_register_script( 'fif-admin-script', get_stylesheet_directory_uri() . '/js/fif.admin.js', array('jquery') );

 	$pages_array = array(
 		'toplevel_page_drummer_gallop',
 		'fif_page_fif_theme',
 		'fif_page_fif_contact',
 		'fif_page_fif_css'
 	);

  	//PHP 7

  	if( in_array( $hook, $pages_array ) ){

  		wp_enqueue_style( 'raleway-admin' );
  		wp_enqueue_style( 'fif_admin' );

  	}

  	if( 'toplevel_page_drummer_gallop' == $hook ){

  		wp_enqueue_media();

  		wp_enqueue_script( 'fif-admin-script' );

  	}

  	if ( 'fif_page_fif_css' == $hook ){

  		wp_enqueue_style( 'ace', get_stylesheet_directory_uri() . '/css/fif.ace.css', array() );

  		wp_enqueue_script( 'ace', get_stylesheet_directory_uri() . '/js/ace/ace.js', array('jquery') );
  		wp_enqueue_script( 'fif-custom-css-script', get_stylesheet_directory_uri() . '/js/fif.custom_css.js', array('jquery') );

  	}

  }
  add_action( 'admin_enqueue_scripts', 'fif_load_admin_scripts' );

 /*--------------------------------------------------------------
 >>> FRONT-END ENQUEUE SCRIPTS
 ---------------------------------------------------------------*/

 function fif_load_scripts(){

   // enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
	// enqueue child styles
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
  // enqueue fif Custom Styles
	wp_enqueue_style( 'fif', get_stylesheet_directory_uri() . '/css/fif.css', array() );
  // enqueue bootstrap
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array() );

  if (is_front_page( 'front-page') ) {

	  // front page CSS

		//wp_enqueue_style( 'homestyle', get_stylesheet_directory_uri_uri() . '/css/one-page.css', array() );

	} elseif ( is_page( 'about' ) ) {

  } elseif ( is_page( 'contact' ) ) {

	} elseif ( is_page( 'inflight' ) ) {

    // In-flight page CSS

    wp_enqueue_style( 'inflightcssSkel', get_stylesheet_directory_uri() . '/inflight/inflightcss/skel.css', array() );
    wp_enqueue_style( 'inflightcss', get_stylesheet_directory_uri() . '/inflight/inflightcss/inflightstyle.css', array() );
    wp_enqueue_style( 'inflightcssXlarg', get_stylesheet_directory_uri() . '/inflight/inflightcss/style-xlarge.css', array() );
  }
}

add_action( 'wp_enqueue_scripts', 'fif_load_scripts' );

function fif_load_JS() {

    wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
    wp_enqueue_script( 'fif', get_stylesheet_directory_uri() . '/js/fif.js', array('jquery') );

if (is_front_page( 'front-page') ) {

 // front page JS

} elseif ( is_page( 'about' ) ) {

} elseif ( is_page( 'contact' ) ) {

   // Contact page JS
   wp_enqueue_script( 'fif', get_stylesheet_directory_uri() . '/js/fif-contact.js', array('jquery') );

} elseif ( is_page( 'inflight' ) ) {

 // In-flight page JS

   wp_enqueue_script( 'inflightinit', get_stylesheet_directory_uri() . 'inflight/inflightjs/init.js', array( 'jqquery' ) );
   wp_enqueue_script( 'inflightdropmin', get_stylesheet_directory_uri() . 'inflight/inflightjs/jquery.dropotron.min.js', array( 'jqquery' ) );
   wp_enqueue_script( 'inflightjquerymin', get_stylesheet_directory_uri() . 'inflight/inflightjs/jquery.min.js', array( 'jqquery' ) );
   wp_enqueue_script( 'inflightscrollgressmin', get_stylesheet_directory_uri() . 'inflight/inflightjs/jquery.scrollgress.min.js', array( 'jqquery' ) );
   wp_enqueue_script( 'inflightinitscrolly', get_stylesheet_directory_uri() . 'inflight/inflightjs/jquery.scrolly.min.js', array( 'jqquery' ) );
   wp_enqueue_script( 'inflightinitslidertron', get_stylesheet_directory_uri() . 'inflight/inflightjs/jquery.slidertron.min.js', array( 'jqquery' ) );
   wp_enqueue_script( 'inflightinitskel', get_stylesheet_directory_uri() . 'inflight/inflightjs/skel-layers.min.js', array( 'jqquery' ) );
   wp_enqueue_script( 'inflightinitskelmin', get_stylesheet_directory_uri() . 'inflight/inflightjs/skel.min.js', array( 'jqquery' ) );

 }
}

add_action( 'wp_enqueue_scripts', 'fif_load_JS' );
