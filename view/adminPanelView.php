<?php
$title = 'Panel Administrateur';
ob_start();
?>
<div class="col-sm-9 col-8">
	<div id="ajout">
		<h1>Ajouter un adhérent</h1><br>
		<div class="row">
			<div class="col-sm-6">
				<h3>Ajout d'un étudiant :</h3>
				<form method="post" action="">
					<input name="type" value="etudiant" hidden>
					<label for="login">Login :</label>
					<input class="form-control" type="text" name="login"><br>
					<label for="pwd">Mot de passe provisoire :</label>
					<input class="form-control" type="text" name="pwd" value="toor"><br>
					<label for="name">Nom :</label>
					<input class="form-control" type="text" name="name"><br>
					<label for="prenom">Prénom :</label>
					<input class="form-control" type="text" name="prenom"><br>
					<label for="city">Ville :</label>
					<input class="form-control" type="text" name="city"><br>
					<label for="rue">Rue :</label>
					<input class="form-control" type="text" name="rue"><br>
					<label for="cp">Code Postal :</label>
					<input class="form-control" type="text" name="cp"><br>
					<label for="cursus">Cursus</label>
					<input class="form-control" type="text" name="cursus"><br>
					<button class="btn btn-success" type="submit">Valider</button>
					<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
				</form>
			</div>
			<div class="col-sm-6">
				<h3>Ajout d'un professeur :</h3>
				<form method="post" action="">
					<input name="type" value="professeur" hidden>
					<label for="login">Login :</label>
					<input class="form-control" type="text" name="login"><br>
					<label for="pwd">Mot de passe provisoire :</label>
					<input class="form-control" type="text" name="pwd" value="toor"><br>
					<label for="name">Nom :</label>
					<input class="form-control" type="text" name="name"><br>
					<label for="prenom">Prénom :</label>
					<input class="form-control" type="text" name="prenom"><br>
					<label for="city">Ville :</label>
					<input class="form-control" type="text" name="city"><br>
					<label for="rue">Rue :</label>
					<input class="form-control" type="text" name="rue"><br>
					<label for="cp">Code Postal :</label>
					<input class="form-control" type="text" name="cp"><br>
					<label for="tel">Téléphone</label>
					<input class="form-control" type="text" name="tel"><br>
					<button class="btn btn-success" type="submit">Valider</button>
					<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
				</form>
			</div>
		</div>
	</div>
	<hr>
	<div id="editeur">
		<h1>Ajout d'éditeur</h1><br>
		<form method="post" action="index.php?action=addEditeur">
			<label for="name">Nom éditeur :</label>
			<input class="form-control" type="text" name="name"><br>
			<label for="phone">Numéro éditeur :</label>
			<input class="form-control" type="" name="phone">
			<label for="rue">Rue éditeur :</label>
			<input class="form-control" type="text" name="rue"><br>
			<label for="cp">Code postal éditeur :</label>
			<input class="form-control" type="text" name="cp"><br>
			<label for="city">Ville éditeur :</label>
			<input class="form-control" type="text" name="city"><br>
			<button class="btn btn-success" type="submit">Valider</button>
			<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
		</form>
	</div>
	<hr>
	<div id="matiere">
		<h1>Ajout de mot-matière</h1><br>
		<form method="post" action="index.php?action=addMotMat">
			<label for="abr">Abrégé (4 caractères) :</label>
			<input class="form-control" type="text" name="abr"><br>
			<label for="name">Matière :</label>
			<input class="form-control" type="text" name="mat"><br>
			<button class="btn btn-success" type="submit">Valider</button>
			<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
		</form>
	</div>
	<div id="livre">
		<h1>Ajouter un livre</h1><br>
		<form>
			<label for="motmat">Mot Matière :</label>
			<select class="form-control" name="motmat">
				<?php while ($data = $dataMotMat->fetch()): ?>
				<option value="<?= $data['0'] ?>"><?= $data['1'] ?></option>
				<?php endwhile ?>
			</select><br>
			<label for="pos">Rangement du livre :</label>
			<input class="form-control" type="text" name="pos"><br>
			<label for="title">Titre du livre :</label>
			<input class="form-control" type="text" name="title"><br>
			<label for="theme">Thème du livre :</label>
			<input class="form-control" type="text" name="theme"><br>
			<label for="editor">Editeur du livre :</label>
			<select class="form-control" name="editor">
				<?php while ($data = $dataEditor->fetch()): ?>
				<option value="<?= $data['0'] ?>"><?= $data['1'] ?></option>
				<?php endwhile ?>
			</select>
		</form>
	</div>
	<div id="retard">
		<h1>Les retards sur les rendus de production :</h1>
		<table class="table" style="margin-top: 5%">
			<thead>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Jour de retard</th>
			</thead>
			<tbody>
				<?php while ( $data = $dataLate->fetch() ):?>
				<tr>
					<td><?= $data['0'] ?></td>
					<td><?= $data['1'] ?></td>
					<td><?= $data['2'] ?></td>
				</tr>
				<?php endwhile ?>
			</tbody>
		</table>
	</div>
</div>
<?php
$content = ob_get_clean();
require_once 'templateAdmin.php';
?>