<?php
/**
 * fif. Admin
 *
 * @package fif.
 */
/*--------------------------------------------------------------
fif. Theme Support
---------------------------------------------------------------*/


/*--------------------------------------------------------------
fif. Fake Email Server (For Dev)
---------------------------------------------------------------*/

function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = 'b502f3bdf49408';
  $phpmailer->Password = '316cf43cb9cc6a';
}

add_action('phpmailer_init', 'mailtrap');
