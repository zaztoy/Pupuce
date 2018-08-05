

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Chez PUPUTE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nos amis les bêtes</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="./shop.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Alimentation</a>
          <a class="dropdown-item" href="#">Medication</a>
          <a class="dropdown-item" href="#">Jeux</a>
        </div>
      </li>
      <li class="nav-item">

        <!--********************************************************************************-->
        <!--****************************** BUTTON CONNEXION ********************************-->
        <!--********************************************************************************-->

        <input type="button" name="nomDeLaVariable" value="Connexion" onclick="javascript:location.href='login.php'">

      </li>
      <li class="nav-item">

        <!--********************************************************************************-->
        <!--****************************** BUTTON DECONNEXION ********************************-->
        <!--********************************************************************************-->

        <input type="button" name="nomDeLaVariable" value="Deconnexion" onclick="javascript:location.href='logout.php'">

      </li>
    </ul>
  </div>
</nav>
<!--********************************************************************************-->
<!--*********************************END NAVBAR ************************************-->
<!--********************************************************************************-->
