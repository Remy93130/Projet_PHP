<?php
$title = "Profil";
ob_start(); ?>

<div class="container">
	<h1 class="text-center"><strong>Votre profil</strong></h1><hr>
	<div class="row" style="margin-top: 5%">
		<div class="col-lg-8 offset-lg-2">
			<h2 class="text-center">Vos informations :</h2><br>
			<table class="info-user">
				<tr>
					<td><b>Votre nom : </b></td>
					<td><?= $_SESSION['nom'] ?></td>
				</tr>
				<tr>
					<td><b>Votre prenom : </b></td>
					<td><?= $_SESSION['prenom'] ?></td>
				</tr>
				<tr>
					<td><b>Votre statut : </b></td>
					<td><?= $_SESSION['typeUser'] ?></td>
				</tr>
				<tr>
					<td><b>Date de votre dernier pret : </b></td>
					<td><?= $_SESSION['derPret'] ?></td>
				</tr>
				<?php if ( $_SESSION['interdit'] ) { ?>
					<tr style="color: red">
						<td><b>Vous êtes en interdit pour encore : </b></td>
						<td><?= $_SESSION['interdit'] ?> jours</td>
					</tr>
				<?php } ?>
				<?php if ( isset( $_SESSION['book'] ) ) { ?>
				<tr>
					<td><b>Livre actuellement emprunter : </b></td>
					<td><?= $_SESSION['book'] ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td><b>Nombre d'emprunt au total : </b></td>
					<td><?= $_SESSION['nbEmprunt'] ?></td>
				</tr>
				<tr>
					<td><b>Votre adresse : </b></td>
					<td><?= $_SESSION['rue'] . ", " . $_SESSION['ville'] ?></td>
				</tr>
				<?php if ( $_SESSION['typeUser'] == 'enseignant' ) { ?>
				<tr>
					<td><b>Votre numéro de téléphone : </b></td>
					<td><?= $_SESSION['tel'] ?></td>
				</tr>
				<?php }else { ?>
				<tr>
					<td><b>Votre niveau d'étude : </b></td>
					<td><?= $_SESSION['etud'] ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div><br><hr><br>
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<h2 class="text-center">Action :</h2><br>
			<p><a href="index.php?action=updatelog">Modifier vos identifiant</a></p>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();
require 'template.php';
?>