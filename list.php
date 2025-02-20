<?php
//Démo sélect en BDD : récupérer les données de la BDD
//déclaration des variables d'affichage
$usersList ='';

//1ère étape : création de l'objet de connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=users', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//try ... catch()
try {
    //2ème étape : on prépare le select
    $req = $bdd->prepare('SELECT `login`, email, age FROM users');
    //3ème étape : exécution de la requête
    $req->execute();
    //4ème étape : récupérer les données de la BDD
    $data = $req->fetchAll();
    echo '<pre>';
    print_r($data); //ce qui est renvoyé par la BDD est un tableau contenant d'autres 
    // petits tableaux
    echo '</pre>';
    // pour afficher les data, on fait une boucle sur un tableau pour créer un <li> par enregistrement
    foreach($data as $user){
        $usersList = $usersList."<li>{$user['login']} : {$user['email']} - {$user['age']} ans </li>";
    }

}catch(EXEPTION $e){
    $usersList = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?= $usersList ?>
    </ul>
</head>
<body>
    
</body>
</html>