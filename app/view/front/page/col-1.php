<!DOCTYPE html>
<html class="no-js" lang="id">
<?php $this->getThemeElement('page/html/head',$__forward); ?>
<?php if($this->config->environment == 'production'){ ?>
  <?php $this->getThemeElement('page/html/gtag', $__forward) ?>
<?php } ?>
<body>
  <?php $this->getThemeElement('page/html/navbar',$__forward); ?>
  <?php $this->getThemeContent(); ?>
  <?php $this->getThemeElement('page/html/footer',$__forward); ?>

  <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
  <?php $this->getJsFooter(); ?>

  <!-- Load and execute javascript code used only in this page -->
  <script>
  document.addEventListener("DOMContentLoaded", function(event) {
    <?php $this->getJsReady(); ?>
    <?php $this->getJsContent(); ?>
  });
  </script>
</body>
</html>
