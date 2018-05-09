<?php
$title = "Espace Administrateur";
ob_start(); ?>

<div class="container">
	<h1 class="text-center">Espace administration</h1>
	<h5 class="text-center" style="color: grey">Connexion</h5>
	<div class="row" style="margin-top: 5%">
		<div class="col-lg-8 offset-lg-2">
			<form action="index.php?action=loginadm" method="post">
				<div class="form-group">
					<label for="login">Nom d'utilisateur :</label>
					<input type="text" class="form-control" id="login" placeholder="Votre nom d'utilisateur" name="login">
				</div>
				<div class="form-group">
					<label for="pwd">Mot de passe :</label>
					<input type="password" class="form-control" id="pwd" placeholder="Votre mot de passe" name="pwd">
				</div>
				<button type="submit" class="btn btn-primary">Connexion</button>
			</form>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();
require 'template.php';
?>