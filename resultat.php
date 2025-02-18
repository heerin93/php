<?php
//test si la superglobale $_GET existe
if(isset($_POST["nom"]) && ($_POST["prenom"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    echo "Mon nom est : $prenom $nom.";
}

?>