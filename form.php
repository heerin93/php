<?php
    /*//traitement de mon formulaire
    if(isset($_POST['box'])){
        //boucle pour parcourir chaque case cochée
        foreach($_POST['box'] as $value){
            echo "<p> id de la box : $value </p>";
        } 
    }else {
            echo "<p> Veuillez cocher une ou plusieurs cases </p>";
    }*/

    //exemple de superglobales POST
    /* 
    $_POST = [
        'login' => 'Test',
        'password => '12345',
        'submit' => 'submit'
    ]
*/
    //varaibles d'affichage
    $login = '';
    $message = '';

    //traitement de mon formulaire de connexion
    //vérifier si le formulaire est bien submit
    if(isset($_POST['submitConnexion'])) {
        //on vérifie que les données en post ne sont pas vides
        //isset() : fonction qui vérifie que la viariable existe et n'est pas nulle
        //empty() : fonction qui vérifie qu'une variable est vide
        if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])){
            $login = $_POST['login'];
        }
    }

    //traitement du formulaire d'inscription
        //vérifier si le formulaire est bien submit
        if(isset($_POST['submitInscription'])) {
            //on vérifie que les données en post ne sont pas vides
            //isset() : fonction qui vérifie que la viariable existe et n'est pas nulle
            //empty() : fonction qui vérifie qu'une variable est vide
            if(isset($_POST['loginInscription']) && !empty($_POST['loginInscription']) && isset($_POST['passwordInscription']) && !empty($_POST['passwordInscription'])){
                $message = "Inscription effectuée avec succès";
            }
        }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon formulaire</title>
</head>
<body>
   <!-- <form action = "resultat.php" method="post">
        <p>Veuillez saisir votre nom :</p>
        <input type="text" name="nom">
        <br>
        <input type="text" name="prenom">
        <br>
        <input type ="submit" value="Envoyer">
    </form> -->
    <!--<form action = "" method="post">
        <p>Veuillez saisir votre nom :</p>
        <input type="checkbox" name="box[]" value="1"/>1</p>
        <br>
        <input type="checkbox" name="box[]" value="2"/>2</p>
        <br>
        <input type="checkbox" name="box[]" value="3"/>3</p>
        <br>
        <input type="checkbox" name="box[]" value="4"/>4</p>
        <br>
        <input type ="submit" name ="submit" value="Envoyer">
    </form>
    <h4>Liste des checkbox cochées</h4> -->
    <h2><?= $login ?></h2>
    <h1>Connexion</h1>
    <form action="" method="post">
        <input type="text" name="login">
        <input type="text" name="password">
        <input type="submit" name="submitConnexion">
    </form>

    <h1> Inscription </h1>
    <form action="" method="post">
        <input type="text" name="loginInscription">
        <input type="text" name="passwordInscription">
        <input type="submit" name="submitInscription">
    </form>
        <p> <?= $message ?></p>
</body>
</html>