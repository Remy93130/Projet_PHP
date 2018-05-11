<?php
$title = "Acceuil";
ob_start(); ?>
<?php
if ( isset( $_GET['error'] ) ) {
	if ( $_GET['error'] == 'wronglogin' ) {
		$strError = '<strong>Erreur ! </strong>Mauvais identifiant ou mot de passe';
	} elseif ( $_GET['error'] == 'nolog' ) {
		$strError = '<strong>Erreur ! </strong>Vous n\'êtes pas connecté';
	} elseif ( $_GET['error'] == 'notupdated' ) {
		$strError = '<strong>Erreur ! </strong>Les informations n\'ont pas été modifiées';
	}
}
?>

<div class="container">

<?php
if ( isset( $strError ) ) { ?>
	
		<div class="col-lg-8 offset-lg-2">
			<div class="alert alert-danger alert-dismissible">
				<button class="close" type="button" data-dismiss="alert">&times;</button>
				<?= $strError ?>
			</div>
		</div>
<?php } ?>

<h1 class="text-center">Accueil</h1>

</div>

<div class="modal fade" id="connexion">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Connexion</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post" action="index.php?action=connect">
					<label for="mail">Identifiant :</label>
					<input type="text" class="form-control" id="login" placeholder="Votre identifiant" name="login"><br>
					<label for="pwd">Mot de passe :</label>
					<input type="password" class="form-control" id="pwd" placeholder="Votre mot de passe" name="pwd"><br>
					<label for="type">Vous êtes :</label>
					<select name="type" class="form-control">
						<option value="etudiant">Etudiant</option>
						<option value="enseignant">Enseignant</option>
					</select><br>
					<button type="submit" class="btn btn-primary">Connexion</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
			</div>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();
require 'template.php';
?>