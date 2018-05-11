<?php
$title = "Rechercher un livre";
ob_start();
?>

<div class="container">
	<h1 class="text-center">Rechercher un livre</h1><br>
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h2>Rechercher un périodique</h2><br>
			<form action="index.php?action=resultBook&choice=perio" method="post">
				<input name="validForm" hidden>
				<label for="title">Titre :</label>
				<input class="form-control" type="text" name="title"><br>
				<label for="theme">Thème :</label>
				<input class="form-control" type="text" name="theme"><br>
				<label for="editor">Editeur :</label>
				<input class="form-control" type="text" name="editor"><br>
				<label for="perio">Périodicité :</label>
				<input class="form-control" type="text" name="perio"><br>
				<label class="form-check-label">
					<input type="checkbox" class="form-control-input" name="dispo" value="1">
					Chercher uniquement les livres disponibles.
				</label><br><br>
				<button class="btn btn-success" type="submit">Rechercher</button>
			</form>
		</div>
	</div><br><hr><br>
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h2>Rechercher un ouvrage</h2><br>
			<form action="index.php?action=resultBook&choice=ouvrage" method="post">
				<input name="validForm" hidden>
				<label for="title">Titre :</label>
				<input class="form-control" type="text" name="title"><br>
				<label for="theme">Thème :</label>
				<input class="form-control" type="text" name="theme"><br>
				<label for="editor">Editeur :</label>
				<input class="form-control" type="text" name="editor"><br>
				<label for="author">Auteur :</label>
				<input class="form-control" type="text" name="author"><br>
				<label class="form-check-label">
					<input type="checkbox" class="form-control-input" name="dispo" value="1">
					Chercher uniquement les livres disponibles.
				</label><br><br>
				<button class="btn btn-success" type="submit">Rechercher</button>
			</form>
		</div>
	</div><br><hr><br>
	<div class="row" style="margin-bottom: 3%">
		<div class="col-lg-8 offset-lg-2">
			<h2>Rechercher une œuvre non périodique</h2>
			<form action="index.php?action=resultBook&choice=nonperio" method="post">
				<input name="validForm" hidden>
				<label for="title">Titre :</label>
				<input class="form-control" type="text" name="title"><br>
				<label for="theme">Thème :</label>
				<input class="form-control" type="text" name="theme"><br>
				<label for="editor">Editeur :</label>
				<input class="form-control" type="text" name="editor"><br>
				<label for="vol">Nombre de volume :</label>
				<input class="form-control" type="text" name="vol"><br>
				<label for="edit">Année d'édition :</label>
				<input class="form-control" type="text" name="edit"><br>
				<label for="isbn">ISBN :</label>
				<input class="form-control" type="text" name="isbn"><br>
				<label class="form-check-label">
					<input type="checkbox" class="form-control-input" name="dispo" value="1">
					Chercher uniquement les livres disponibles.
				</label><br><br>
				<button class="btn btn-success" type="submit">Rechercher</button>
			</form>
		</div>
	</div>
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
require_once 'template.php';
?>