<?php
//Le model : contient les fonctions qui communiquent avec la BDD

//articleAdd() : je crée la fonction qui me permettra d'ajouter un nouvel article en BDD

function articleAdd($bdd, $nom, $contenu, $prix) {
    //on se connecte à la BDD
    try {
        $req= $bdd->prepare("INSERT INTO article (`nom_article`, `description_article`, `prix_article`) VALUES (?, ?, ?)");
        $req->bindParam(1, $name, PDO::PARAM_STR);
        $req->bindParam(2, $content, PDO::PARAM_STR);
        $req->bindParam(3, $prix, PDO::PARAM_STR);
        $req->execute();
        return "Nom : $nom - Contenu : $contenu ; a bien été ajouté en BDD";
    } catch(EXCEPTION $e) {
        return  $e->getMessage();   
    }
}


//articleAll() : je crée la fonction qui va récupérer tous les articles
function articleAll($bdd){
    try {
        $req= $bdd->prepare('SELECT nom_article, description_article, prix_article FROM article');
        $req->execute();
        $data = $req->fetchAll();
        $articlesList='';
        foreach($data as $article) {
            $articleList= $articlesList."<h1>{$article['nom_article']} :</h1> <p>{$article['description_article']}</p> <h2>{$article['prix_article']} euros<h2>"; 
        return $articlesList;
        }
    } catch(EXCEPTION $e) {
        return $e->getMessage();   
    }
}
?>