<?php
//je démarre ma session
session_start();
// j'inclue mes variable de configuration
include_once 'include/config.php';

// je passe par un autoloader pour charger les classes contenues dans le dossier include/class
require 'include/Autoloader.php';
Autoloader::register();
?>
