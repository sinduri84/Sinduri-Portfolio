<?php 
  define("TITLE", "RESUME");
  require 'includes/head.php';
  require 'includes/header.php';
?>

<div class="cv_pane">
	<embed id="cv_embed" src="assets/Sinduri_CV.pdf" type="application/pdf" width="100%"/>
	<a href="assets/Sinduri_CV.pdf" class=""><button type="button" class="btn btn-warning mr-auto">Download CV</button></a>
</div>

<?php 
  require 'includes/footer.php';
?>

<?php 
  require 'includes/tail.php';
?>