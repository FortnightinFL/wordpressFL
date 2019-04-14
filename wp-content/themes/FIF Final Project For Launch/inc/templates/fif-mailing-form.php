<h1>Fortnight In Florida Mailing List Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Mailing List Form inside a Page or Post</p>
<p><code>[mailing_form]</code></p>

<form method="post" action="options.php" class="fif-general-form">
  <?php settings_fields('fif-mailing-options'); ?>
  <?php do_settings_sections('fif_mailing'); ?>
  <?php submit_button();?>
</form><!-- .fif-general-form -->
