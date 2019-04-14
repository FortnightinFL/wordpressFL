<?php
/**
 * fif Change the default breakpoint of woocommerce
 *
 * @package fif.
 */
/*--------------------------------------------------------------
											Cloud Tag Sizes
---------------------------------------------------------------*/

// Change Woocommerce css breaktpoint from max width: 768px to 767px

function woo_custom_breakpoint($px) {
  $px = '974px';
  return $px;
}

add_filter('woocommerce_style_smallscreen_breakpoint','woo_custom_breakpoint');
