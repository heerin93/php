<?php

//Je démarre ma $_SESSION pour pouvoir y accéder
session_start();

//je vérifie que je reçois le formulaire
if(isset($_POST['submit'])){

    //j'enregistre le login dans $_SESSION['login']
    $_SESSION['login'] = $_POST['login'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="page1.php"> Accueil</a>
    <a href="page2.php"> Compte </a>
    <a href="deco.php"> Déconnexion </a>

    <form action="" method="post">
        <input type="text" name="login">
        <input type="submit" name="submit">
    </form>

</body>
</html>