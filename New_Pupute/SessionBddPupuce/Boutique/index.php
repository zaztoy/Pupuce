<?php
// So, I try to make the administrator part, with the class, request ... but nothing works, I delete all
// for have something ! 




// j'inclue ici mon fichier commun à toutes mes pages afin de centraliser/factoriser les infos dans un soucis de maintenabilité
include 'include/AppTop.php';
// Si je n'inclue pas ce fichier dans AppTop.php c'est parce que je ne veux pas que ma page login soit sécurisée (car sinon on rentre dans une boucle infinie de redirection jusqu'à la mort du PC)
// include 'include/secure.php';

//is_file teste si le fichier donné en paramètre existe
if(is_file("session/".$_SESSION["sessions"])){
  // print_r ($_SESSION);
  $serialize = implode("", @file("session/".$_SESSION["sessions"]));
  // je déserialize : Crée une variable PHP à partir d'une valeur linéarisée
  $users = unserialize($serialize);
  print_r ($users);
}

// je créé une requete sql privilégiez les requètes préparées me permettant de trouver les Users dont le login et le MDP sont ceux rentrés par l'utilisateurs
// Limit 1 permet d'arreter la recherche dès que la requete a trouvé une correspondance.
$sql = "SELECT * FROM `Clients` WHERE `Login_Client` = '".$users->_login."' AND `Password_Client` = '".$users->_mdp."' LIMIT 1;";
// I send my request



//This is a function too good for see what is inside the objet !
// function dd($var){
//   echo "<pre>";
//   print_r($var);
//   echo '</pre>';
// }

$users_data = $bdd->query($sql);

//si j'ai aucun retour je renvoi vers login.php
if($users_data->rowCount() == 0){
  unlink("session/".$_SESSION["sessions"]);
} else {
  $user1 = $users_data->fetch();
  // dd($user1);
  $user = new Users($user1['Login_Client'], $user1['Password_Client'], $user1['Name_Client'], $user1['ID_Client']);
  // $serialize = serialize($user)
  // dd($user);

  // Je sauvegarde toutes les données de mon utilisateur dans la session et pas seulement le login et mdp
  // $fp = fopen("session/".$_SESSION["sessions"],"w");
  // write($fp, $serialize);
  // fclose($fp);
  // print_r('$user');
}


?>

<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
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

  <!--********************************************************************************-->
  <!--*********************************** SLIDESHOW **********************************-->
  <!--********************************************************************************-->

  <div class="bg-dark rounded">
    <div class="container col-md-5 ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> Minou Minou</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"> Ouaf !</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"> Crounch ..</li>
        </ol>

        <div class="carousel-inner">

          <div class="carousel-item active">
            <img class="d-block" src="./img/cat-3431519_640.jpg" alt="First slide">
          </div>

          <div class="carousel-item">
            <img class="d-block" src="./img/dog-690176_640.jpg" alt="Second slide">
          </div>

          <div class="carousel-item">
            <img class="d-block" src="./img/hamster-3528444_640.jpg" alt="Third slide">
          </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </div>
  <!--********************************************************************************-->
  <!--******************************* END SLIDESHOW **********************************-->
  <!--********************************************************************************-->

  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="text-center para">Bienvenue chez Pupute <?php echo $user->_login; ?> (<?php echo $user->_id; ?>) !</h1>

        <p class="text-center para">
          "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque<br />
          laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi<br />
          architecto beatae vitae dicta sunt explicabo.<br />
          Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,<br />
          sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.<br />
          Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, <br />
          sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.<br />
          Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,<br />
          nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit<br />
          esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
          <?php
          // J'ai créé un fichier permettant d'afficher simplement mes msg et potentiellement commun à tous les fichiers : j'ai créé un composent réutilisable
          include 'include/component/alert.php';

          // je créé un Users vide avec seulement son id
          // $userTest = new Users("","","", 2);
          // echo "Id de userTest : " . $userTest->_id."<br>";
          // // ici je récupère les infos contenues dans la bdd dont le lien est passé en argument
          // $userTest->getInfoById($bdd);
          // echo "Nom de userTest : " . $userTest->_nom."<br>";
          // ?>
          <pre>
            <?php //print_r(Users::getAll($bdd)); ?>
          </pre>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>

  </body>
  </html>
