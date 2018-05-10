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
			<form action="index.php?action=addBook" method="post">
				<input name="type" value="nonperio" hidden>
				<input name="abr" value="<?= $_POST['motmat'] ?>" hidden>
				<input name="pos" value="<?= $_POST['pos'] ?>" hidden>
				<input name="title" value="<?= $_POST['title'] ?>" hidden>
				<input name="theme" value="<?= $_POST['theme'] ?>" hidden>
				<input name="editor" value="<?= $_POST['editor'] ?>" hidden>
				<label for="nvol">Volume :</label>
				<input class="form-control" type="text" name="nvol"><br>
				<label for="nbvol">Nombre de volume :</label>
				<input class="form-control" type="text" name="nbvol"><br>
				<label for="year">Année d'édition :</label>
				<input class="form-control" type="text" name="year"><br>
				<label for="isbn">ISBN :</label>
				<input class="form-control" type="text" name="isbn"><br>
				<button class="btn btn-success" type="submit">Valider</button>
				<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
			</form>
		</div>
		<div class="col-lg-4">
			<h1 class="text-center">Ajout d'un périodique :</h1><br>
			<form action="index.php?action=addBook" method="post">
				<input name="type" value="perio" hidden>
				<input name="abr" value="<?= $_POST['motmat'] ?>" hidden>
				<input name="pos" value="<?= $_POST['pos'] ?>" hidden>
				<input name="title" value="<?= $_POST['title'] ?>" hidden>
				<input name="theme" value="<?= $_POST['theme'] ?>" hidden>
				<input name="editor" value="<?= $_POST['editor'] ?>" hidden>
				<label for="start">Période début (année) :</label>
				<input class="form-control" type="text" name="start"><br>
				<label for="pend">Pédiode fin (année) :</label>
				<input class="form-control" type="text" name="pend" placeholder="Laisser vide si nul"><br>
				<label for="timep">Pédiodicité :</label>
				<input class="form-control" type="text" name="timep"><br>
				<button class="btn btn-success" type="submit">Valider</button>
				<button class="btn btn-danger" type="reset" style="margin-left: 5%">Réinitialiser</button>
			</form>
		</div>
		<div class="col-lg-4">
			<h1 class="text-center">Ajout d'un ouvrage :</h1><br>
			<form action="index.php?action=addBook" method="post">
				<input name="type" value="ouvrage" hidden>
				<input name="abr" value="<?= $_POST['motmat'] ?>" hidden>
				<input name="pos" value="<?= $_POST['pos'] ?>" hidden>
				<input name="title" value="<?= $_POST['title'] ?>" hidden>
				<input name="theme" value="<?= $_POST['theme'] ?>" hidden>
				<input name="editor" value="<?= $_POST['editor'] ?>" hidden>
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