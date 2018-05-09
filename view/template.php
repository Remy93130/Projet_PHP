<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="margin-bottom: 3%">
	<a class="navbar-brand" href="index.php">Bibliothèque</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li>
				<a class="nav-link" href="index.php">Accueil <i class="fas fa-home"></i></a>
			</li>
			<li>
				<a class="nav-link" href="#">Rechercher un livre <i class="fas fa-search"></i></a>
			</li>
			<li>
				<a class="nav-link" href="#">A propos <i class="fas fa-info-circle"></i></a>
			</li>
			<li>
				<a class="nav-link" href="index.php?action=loginAdmin">Espace Administration</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<?php
			if ( isset( $_SESSION['id'] ) ) { ?>
			<li><a class="nav-link" href="index.php?action=profile">Mon profil <i class="fas fa-user"></i></a></li>
			<li><a class="nav-link" href="index.php?action=logout">Deconnexion <i class="fas fa-sign-out-alt"></i></a></li>
			<?php } else { ?>
			<li><a class="nav-link" href="#" data-toggle="modal" data-target="#connexion">Se connecter <i class="fas fa-sign-in-alt"></i></a></li>
			<?php } ?>
		</ul>
	</div>  
</nav>
<?= $content ?>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">


</body>
</html>