<?php

//import des ressources
include './utils/functions.php';
//include du model
include './model/model_article.php';

//déclarer des variables d'affichage
$message ="";
$title = "Ajouter un nouvel article";

//vérifier qu'on reçoit le formulaire
if(isset($_POST["submit"])) { //on vérifie qu'on puisse bien envoyer le formulaire
    if( // vérifie s'il y a des champs vides
        isset($_POST["nom_article"]) && !empty ($_POST["nom_article"])&&
        isset($_POST["description_article"])&& !empty ($_POST["description_article"])&&
        isset($_POST["prix_article"]) && !empty ($_POST["prix_article"])
    ){ 
    } else {
        $message = "Merci de remplir tous les champs";
    }
    if(filter_var($_POST["prix_article"], FILTER_VALIDATE_FLOAT)){ //vérifier le format du prix, qu'il soit bien en chiffre
    } else {
        $message = "Merci de mettre un prix valide";
    } // On nettoie les données pour enlever tout code malveillant
    $name = nettoyage($_POST["nom_article"]);
    $content = nettoyage($_POST["description_article"]);
    $prix = nettoyage($_POST["prix_article"]);

    $bdd = DBconnect();

    $message = articleAdd($bdd, $name, $content, $prix);
}

//include des vues
include './view/header.php';
include './view/view_accueil.php';
include './view/footer.php';


?>