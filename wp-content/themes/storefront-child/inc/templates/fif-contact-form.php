<h1>Fortnight In Florida Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or Post</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="fif-general-form">
  <?php settings_fields('fif-contact-options'); ?>
  <?php do_settings_sections('fif_contact'); ?>
  <?php submit_button();?>
</form><!-- .fif-general-form -->
