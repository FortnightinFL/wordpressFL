<?php
/**
 * fif. Tag Cloud Widget
 *
 * @package fif.
 */
/*--------------------------------------------------------------
											Cloud Tag Sizes
---------------------------------------------------------------*/

function fif_widget_tag_cloud_args( $args ) {
 $args['largest'] = 170;
 $args['smallest'] = 90;
 $args['unit'] = '%';
 return $args;
} //fif_widget_tag_cloud_args

add_filter( 'widget_tag_cloud_args', 'fif_widget_tag_cloud_args' );
