<!DOCTYPE html>
<html>
<head>
	<title>Ajout livre</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
<div class="container-fluid">
	<div class="row" style="margin-top: 5%">
		<div class="col-lg-4">
			<h1 class="text-center">Ajout d'un livre :</h1><br>
			<form action="" method="post">
				<label for="nvol">Volume :</label>
				<input class="form-control" type="text" name="nvol"><br>
				<label for="nbvol">Nombre de volume :</label>
				<input class="form-control" type="text" name="nbvol"><br>
				<label for="year">Année d'édition :</label>
				<input class="form-control" type="" name="year"><br>
				<label for="isbn">ISBN :</label>
				<input class="form-control" type="text" name="isbn"><br>
				<button class="btn btn-success" type="submit">Valider</button>
				<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
			</form>
		</div>
		<div class="col-lg-4">
			<h1 class="text-center">Ajout d'un périodique :</h1><br>
			<form action="" method="post">
				<label for="start">Période début (année) :</label>
				<input class="form-control" type="" name="start"><br>
				<label for="end">Pédiode fin (année) :</label>
				<input class="form-control" type="" name="end" placeholder="Laisser vide si nul"><br>
				<label for="time">Pédiodicité :</label>
				<input class="form-control" type="" name="time"><br>
				<button class="btn btn-success" type="submit">Valider</button>
				<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
			</form>
		</div>
		<div class="col-lg-4">
			<h1 class="text-center">Ajout d'un ouvrage :</h1><br>
			<form action="" method="post">
				<label for="aut">Auteur :</label>
				<input class="form-control" type="text" name="aut"><br>
				<button class="btn btn-success" type="submit">Valider</button>
				<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
			</form>
		</div>
	</div>	
</div>
</body>
</html>