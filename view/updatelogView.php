<?php
$title = "Acceuil";
ob_start(); ?>

<div class="container">
	<h1 class="text-center">Modification de vos identifiants</h1><br>
	<div class="col-lg-8 offset-lg-2">
		<form action="" method="post">
			<label>Votre nouveau login : </label>
			<input type="text" name="login" class="form-control"><br>
			<label>Votre nouveau mot de passe :</label>
			<input type="password" name="pwd" class="form-control"><br>
			<button type="submit" class="btn" style="margin-right: 1.5%">Confirmer</button>
			<button type="reset" class="btn" onclick="document.location.href='index.php?action=profile'">Retour</button>
		</form>
	</div>
</div>

<?php
$content = ob_get_clean();
require 'template.php';
?>