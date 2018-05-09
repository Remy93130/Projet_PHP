<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<style type="text/css">
	body {
		position: relative;
		overflow-x: hidden;
	}
	ul.nav-pills {
		top: 20%;
		position: fixed;
	}
	div.col-8 div {
		min-height: 800px;
	}
	#title {
		position: fixed;
		color: white;
		margin-top: 1%;
		font-size: 32px;
	}
	#back {
		position: fixed;
		bottom: 0;
	}
</style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
	<div class="row">
		<nav class="col-sm-3 col-4" id="myScrollspy" style="background-color: #343a40; font-size: 24px;">
			<h1 id="title">Panel administrateur</h1><br>
			<ul class="nav nav-pills flex-column text-center" style="padding-left: 3%">
				<li class="nav-item">
					<a class="js-scrollTo nav-link active" href="#ajout">Ajouter un adhérent</a>
				</li>
				<li class="nav-item">
					<a class="js-scrollTo nav-link" href="#editeur">Ajouter un éditeur</a>
				</li>
				<li class="nav-item">
					<a class="js-scrollTo nav-link" href="#matiere">Créer une matière</a>
				</li>
				<li class="nav-item">
					<a class="js-scrollTo nav-link" href="#livre">Ajouter un livre</a>
				</li>
				<li class="nav-item">
					<a class="js-scrollTo nav-link" href="#retard">Voir les retards</a>
				</li>
			</ul>
			<a id="back" href="index.php">Retour au menu</a>
		</nav>
		<?= $content ?>
	
</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
<script>
	$(document).ready(function() {
		$('.js-scrollTo').on('click', function() {
			var page = $(this).attr('href');
			var speed = 750;
			$('html, body').animate( { scrollTop: $(page).offset().top }, speed );
			return false;
		});
	});
</script>

</body>
</html>