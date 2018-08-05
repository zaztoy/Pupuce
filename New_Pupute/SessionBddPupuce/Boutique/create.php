<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS PERSO -->
  <link href="./css/style.css" rel="stylesheet" media="all" type="text/css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <title>Chez Pupute</title>

  <!--********************************************************************************-->
  <!--************************************ NAVBAR ************************************-->
  <!--********************************************************************************-->
  <?php include('include/navbar.php'); ?>

</head>

<body>
    <div class="container">

                <div class="span10 offset1">
                    <div class="row">
                        <h3>Créer un compte client :</h3>
                    </div>

                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Nom</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Nom" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($loginError)?'error':'';?>">
                        <label class="control-label">Login</label>
                        <div class="controls">
                            <input name="login" type="text" placeholder="Login" value="<?php echo !empty($login)?$login:'';?>">
                            <?php if (!empty($loginError)): ?>
                                <span class="help-inline"><?php echo $loginError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($mdpError)?'error':'';?>">
                        <label class="control-label">Mot de passe</label>
                        <div class="controls">
                            <input name="mdp" type="text"  placeholder="Mot de passe" value="<?php echo !empty($mpd)?$mdp:'';?>">
                            <?php if (!empty($mdpError)): ?>
                                <span class="help-inline"><?php echo $mdpError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Valider</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>

<?php


//This is a function too good for see what is inside the objet !
function dd($var){
  echo "<pre>";
  print_r($var);
  echo '</pre>';
}

    require 'config.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $loginError = null;
        $mdpError = null;

        // keep track post values


        $name = $_POST['name'];
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($login)) {
            $loginError = 'Please enter login';
            $valid = false;
        }

        if (empty($mdp)) {
            $mdpError = 'Error';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $bdd->prepare("INSERT INTO `Clients` (`Name_Client`, `Login_client`, `Password_Client`) VALUES ('$name', '$login', '$mdp')");
            $sql->execute();



            Database::disconnect();
        }
    }
    dd($sql);
?>
