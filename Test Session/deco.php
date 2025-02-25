<?php

//je démarre ma session pour pouvoir y accéder
session_start();

// je détruis ma session : j'efface ce que j'avais enregistré dans $_SESSION
session_destroy();

//redirection vers l'accueil
header('Location:page1.php')

?>