<?php
/**
 * Email Pop-up Template
 *
 * @package storefront
 */
 ?>

<div class="email-popup-con">

     <div class="email-popup-inner-con">
          <div class="email-popup-img-con">
               <img src="http://localhost:8888/FIF/wp-content/uploads/2018/08/kut4fuxuto4-shane-hauser.jpg" alt="Email Subscribe Image">
               <div class="message-overlay-con">
                    <div class="message">Join Our Mailing List</div>
                    <div class="nothanks">No Thanks</div>
               </div>
          </div>
          <?php echo do_shortcode( '[mailing_form]' ); ?>
     </div>

</div>

<script>
jQuery(document).ready(function() {
  // Functionality that controls hiding/showing the email signup lightbox
  // Check to see if cookie is set prior to showing email signup after 5 second delay
  if( Cookies.get('noti') !== 'closed' ) {
    jQuery('.email-popup-con').delay(5000).fadeIn(1000);
  }
  // If user closes lightbox set cookie for 30 days to not show again
  jQuery('.nothanks').click(function() {
    Cookies.set('noti', 'closed', { expires: 30 });
    jQuery('.email-popup-con').fadeOut();
  });
  // Hides the email submit form 3 seconds after a successful submission and sets 1 year cookie to disable popup
  jQuery(document).bind('?????', function(event, FormID ){
    if( FormID == 3) {
      Cookies.set('noti', 'closed', { expires: 365 });
      setTimeout(function() {
        jQuery('.email-popup-con').fadeOut();
      }, 3000);
    }
  });
});
</script>
