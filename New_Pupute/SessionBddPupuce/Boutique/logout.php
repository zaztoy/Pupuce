<?php
//je lance ma session
session_start();
// je détruit ma session
session_destroy();
// si j'utilise la POO je détruit le fichier de session
unlink("session/".$_SESSION["sessions"]);
// je redirige vers une page de mon site
header("Location: index.php");
exit;
echo "string";
