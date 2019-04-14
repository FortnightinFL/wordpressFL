<h1>Fortnight In Florida Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="fif-general-form">
  <?php settings_fields('fif-theme-support'); ?>
  <?php do_settings_sections('fif_theme'); ?>
  <?php submit_button();?>
</form><!-- .fif-general-form -->
