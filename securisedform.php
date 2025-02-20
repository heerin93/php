<?php
//déclarer les variables d'affichage
$message ='';

//htmlentities()
//echo "<script>alert('hello world')</script>";

//strip_tags()
//echo strip_tags("<script>alert('hello world')</script>");

//trim()
//$test = "Hello World !          ";
//echo trim($test)."Espace";

//stripslashes()
//echo "C\'est parti!";
//echo stripslashes("C\'est parti !");

//password_hash()
//$mdp = "1234";
//echo $mdp;

//création de ma fonction de nettoyage des données
function nettoyage($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//vérifier que le formulaire est submut
if(isset($_POST["submit"])){

    //vérifier que les données ne sont pas vides avec isset() et empty()

    if (
        isset($_POST["login"]) && !empty($_POST["login"]) && 
        isset($_POST["email"]) && !empty($_POST["email"]) && 
        isset($_POST["password"]) && !empty($_POST["password"])
    ) {
        // deuxième étape de sécurité : vérifier le format des données

        //on va vérifier que l'email a bien un format d'email et que l'âge est bien un entier

        // filte_var(): permet grâce à un ensemble de filtres de s'assurer du format de nos données

        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            //je vérifie le format de l'âge (integer)

            if(!empty($_POST["age"]) && filter_var($_POST["age"], FILTER_VALIDATE_INT) || empty($_POST["age"])) {

                //3ème étape de sécurité : nettoyer les données --> on veut enlever tout code malveillant

                //htmlentities(): transforme les balises HTML en texte

                // strip_tags() : supprime les balises HTML et PHP

                //trim() : supprime les espace en début et fin de chaîne de caractère

                //stripslashes() : supprime les antislash

                // on va pouvoir stocker nos variables nettoyées 
                $login= nettoyage($_POST["login"]);
                $email= nettoyage($_POST["email"]);
                $password= nettoyage($_POST["password"]);
                if(!empty($_POST["age"])){
                    $age = nettoyage($_POST["age"]);
                }

                // étape bonus si inscription en BDD : chiffrer les données (hasher le mot de passe par exemple)

                $password = password_hash($password, PASSWORD_BCRYPT);

                // --> on peut enfin communiquer avec la BDD et lui envoyer des données propres

                //communiquer avec la BBD
                //étape 1 : instanciation de l'objet de connexion à la BDD
                //il faut précise plusieurs paramètres : host, dbname, nom d'utilisateur et mot de passe utilisateur
                $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                
                //try... catch pour gérer des erreurs de communication avec la BDD
                try {
                    //étape 2 : envoie de la requête SQL
                    //vesion simplifiée : la mauvaise manière (passoire à injection SQL)
                    //$req = $bdd ->query("INSERT INTO users (`login`, `email`, `mdp`, `age`) VALUES ('$login', '$email', '$password', '$age')");
                    //étape 2 : la bonne méthode
                    //avec une requête SQL préparée
                    //étape 2.1 : méthode prepare()
                    $req = $bdd->prepare("INSERT INTO users (`login`, `email`, `mdp`, `age`) VALUES (?, ?, ?, ?)");
                    //étape 2.2 : compléter les ? avec un binding des paramètres
                    $req->bindParam(1, $login, PDO::PARAM_STR);
                    $req->bindParam(2, $email, PDO::PARAM_STR);
                    $req->bindParam(3, $password, PDO::PARAM_STR);
                    $req->bindParam(4, $age, PDO::PARAM_INT);
                    //étape 2.3 : éxecuter la requête avec execute() :
                    $req->execute();
                    //étape bonus : si retour de la BDD : récupérer la réponse de la BDD
                    //ce sera un tableau contenant les enregistrements sous forme de tableau associatifs (ou d'objet)
                    //$data = $req->fetchAll();
                    //message de confirmation à l'utilisateur
                    $message = "L'enregistrement de $login, dont l'email est : $email, a été affecté avec succès.";
                }catch(EXCEPTION $error){
                    //en cas de pb, je récupère le message d'erreur et je l'affiche
                    $message = $error->getMessage();
                }

            } else { //on gère une erreur lié au format de l'âge

                $message = "Veuillez saisir un nombre entier pour l'âge";

            }
        } else { // on gère une erreur de format de mail

            $message = "Votre mail n'est pas au bon format !";

        }

    } else { // on gère une erreur de données non remplie

        // on affiche un message d'erreur à l'utilisateur

        $message = "veuillez remplir les champs obligatoires !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mon formulaire à sécuriser</h1>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Login" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="number" name="age" placeholder="Âge" >
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" name="submit" value="S'inscrire" >
    </form>
    <p><?php echo $message ?></p>
</body>
</html>