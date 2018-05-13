<?php
$title = 'Resultat de la recherche';
ob_start();
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Résultat de la recherche</h1>
			<a href="index.php?action=searchBook" class="float-right">Refaire une recherche</a>
		</div>
	</div><br>
	<div class="col-lg-12">
		<?php if ( $_GET['choice'] == 'perio' ): ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Titre</th>
					<th>Thème</th>
					<th>Disponible</th>
					<th>Rangement</th>
					<th>Editeur</th>
					<th>Début parution</th>
					<th>Fin parution</th>
					<th>Fréquence parution</th>
				</tr>
			</thead>
			<tbody>
				<?php while ( $data = $dataBook->fetch() ): ?>
				<tr>
					<td><?= $data['0'] ?></td>
					<td><?= $data['1'] ?></td>
					<td><?= $data['2'] ?></td>
					<td><?= $data['3'] ?></td>
					<td><?= $data['4'] ?></td>
					<td><?= $data['5'] ?></td>
					<td><?= $data['6'] ?></td>
					<td><?= $data['7'] ?></td>
				</tr>
				<?php endwhile ?>
			</tbody>
		</table>
		<?php endif ?>
		<?php if ( $_GET['choice'] == 'nonperio' ): ?>
		<table class="table table-hover">
			<thead>
					<tr>
						<th>Titre</th>
						<th>Thème</th>
						<th>Disponible</th>
						<th>Rangement</th>
						<th>Editeur</th>
						<th>N° Volume</th>
						<th>Nombre de volume</th>
						<th>Date d'édition</th>
						<th>ISBN</th>
					</tr>
				</thead>
				<tbody>
					<?php while ( $data = $dataBook->fetch() ): ?>
					<tr>
						<td><?= $data['0'] ?></td>
						<td><?= $data['1'] ?></td>
						<td><?= $data['2'] ?></td>
						<td><?= $data['3'] ?></td>
						<td><?= $data['4'] ?></td>
						<td><?= $data['5'] ?></td>
						<td><?= $data['6'] ?></td>
						<td><?= $data['7'] ?></td>
						<td><?= $data['8'] ?></td>
					</tr>
					<?php endwhile ?>
				</tbody>
		</table>
		<?php endif ?>
		<?php if ( $_GET['choice'] == 'ouvrage' ): ?>
		<table class="table table-hover">
			<thead>
					<tr>
						<th>Titre</th>
						<th>Thème</th>
						<th>Disponible</th>
						<th>Rangement</th>
						<th>Editeur</th>
						<th>Auteur</th>
					</tr>
				</thead>
				<tbody>
					<?php while ( $data = $dataBook->fetch() ): ?>
					<tr>
						<td><?= $data['0'] ?></td>
						<td><?= $data['1'] ?></td>
						<td><?= $data['2'] ?></td>
						<td><?= $data['3'] ?></td>
						<td><?= $data['4'] ?></td>
						<td><?= $data['5'] ?></td>
					</tr>
					<?php endwhile ?>
				</tbody>
		</table>
		<?php endif ?>
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