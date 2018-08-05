<?php
// j'inclue ici mon fichier commun à toutes mes pages afin de centraliser/factoriser les infos dans un soucis de maintenabilité
include 'include/AppTop.php';
// include 'secure.php';


// traitement du formulaire
if(isset($_POST) && !empty($_POST)){

	// si on utilise la POO
	// je créé un nouveau Users avec les données rentrées dans le formulaire
	$users = new Users($_POST["Login"], $_POST["mdp"]);
	// je serialize mon objet : je génère une représentation stockable d'une valeur
	// C'est une technique pratique pour stocker ou passer des valeurs PHP entre scripts, sans perdre leur structure ni leur type.
	$serialize = serialize($users);

	// je stocke dans un fichier le contenue de $serialize
	// Attention le dossier session que j'utilise (vous pouvez stocker le fichier où vous voulez) doit être accessible en écriture pour tout le monde (chmod 777)
	// Attention le nom du fichier doit être unique de manière certaine
	// Si le nom de fichier est commun a toutes les instances des objets comme c'est le cas ici cela veux dire que tous le monde peux se connecter et donc adieu la sécurité

	// j'ouvre un fichier en écriture
	// je créé un nom de fichier unique que je garde en mémoire
	$_SESSION["sessions"] = sha1(time());
	$fp = fopen("session/".$_SESSION["sessions"],"w");
	// j'écris dedans le contenus de mon objet
	fwrite($fp, $serialize);
	// je ferme mon fichier
	fclose($fp);

	// dans tous les cas je redirige vers la page qui m'intéresse
	header("Location: index.php");
	exit;
}

?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <br>
    <div class="container">
    	<div class="row">
    		<div class="col">
    			<?php include 'include/component/alert.php'; ?>
    			<form class="form-signin" method="post" action="login.php">
			      <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>
			      <label for="inputEmail" class="sr-only">Login</label>
			      <input name="Login" type="text" id="inputEmail" class="form-control" placeholder="Login" required autofocus autocomplete="off">
			      <label for="inputPassword" class="sr-only">Password</label>
			      <input name="mdp" type="password" id="inputPassword" class="form-control" placeholder="Password" required autocomplete="off">
			      <br>
			      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
					  <input type="button" name="New" value="Nouveau client" onclick="javascript:location.href='create.php'">
			    </form>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
