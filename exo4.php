<?php
$name= "";
$content= "";
$prix= "";
$message = "";
$articleList="";
function nettoyage($data){ //
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

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

    //on se connecte à la BDD
    $bdd = new PDO('mysql:host=localhost;dbname=articles', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    try {
        $req= $bdd->prepare("INSERT INTO article (`nom_article`, `description_article`, `prix_article`) VALUES (?, ?, ?)");
        $req->bindParam(1, $name, PDO::PARAM_STR);
        $req->bindParam(2, $content, PDO::PARAM_STR);
        $req->bindParam(3, $prix, PDO::PARAM_STR);
        $req->execute();
        $message = "L'article a bien été enregistré";
    } catch(EXCEPTION $error) {
        $message = $error->getMessage();   
    }
}

$bdd = new PDO('mysql:host=localhost;dbname=articles', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    try {
        $req= $bdd->prepare('SELECT nom_article, description_article, prix_article FROM article');
        $req->execute();
        $data = $req->fetchAll();
        foreach($data as $article) {
            $articleList= $articleList."<h1>{$article['nom_article']} :</h1> <p>{$article['description_article']}</p> <h2>{$article['prix_article']} euros<h2>"; 
        }
    } catch(EXCEPTION $error) {
        $articleList = $error->getMessage();   
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
    <form method="post">
        <input type="text" name="nom_article">
        <br>
        <input type="text" name="description_article">
        <br>
        <input type="number" step="0.01" name="prix_article">
        <br>
        <input type="submit" value="Ajouter" name="submit"> 
    </form>
    <p><?php echo $message ?></p>
    <p><?php echo $articleList  ?></p>
</body>
</html>