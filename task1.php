<?php
$message='';
$usersList='';

function nettoyage($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

if(isset($_POST["submit"])) { //on vérifie qu'on puisse bien envoyer le formulaire
    
    if( // vérifie s'il y a des champs vides
        isset($_POST["name_user"]) && !empty($_POST["name_user"])&&
        isset($_POST["firstname_user"])&& !empty($_POST["firstname_user"])&&
        isset($_POST["email_user"]) && !empty($_POST["email_user"]) &&
        isset($_POST["mdp_user"]) && !empty($_POST["mdp_user"]) &&
        isset($_POST["passwordrepeat"]) && !empty($_POST["passwordrepeat"])
    ){ 
        if(filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){ //vérifier le format de l'email 
            if ($_POST["mdp_user"] == $_POST["passwordrepeat"]) { //vérifier si les 2 mdp sont identiques
                //nettoyage
                $name= nettoyage($_POST["name_user"]);
                $firstname= nettoyage($_POST["firstname_user"]);
                $email= nettoyage($_POST["email_user"]);
                $password= nettoyage($_POST["mdp_user"]);
                //hash
                $password = password_hash($password, PASSWORD_BCRYPT);
                //communiquer avec la BDD
                $bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                try {
                    $req = $bdd->prepare("SELECT id_user FROM users WHERE email_user = ? LIMIT 1");
                    $req->bindParam(1, $email, PDO::PARAM_STR);
                    $req->execute();

                    $data = $req->fetchAll();
                    if (empty($data)) {
                        $req = $bdd->prepare("INSERT INTO users(`name_user`, `firstname_user`, `email_user`, `mdp_user`) VALUES (?, ?, ?, ?)");
                        $req->bindParam(1, $name, PDO::PARAM_STR);
                        $req->bindParam(2, $firstname, PDO::PARAM_STR);
                        $req->bindParam(3, $email, PDO::PARAM_STR);
                        $req->bindParam(4, $password, PDO::PARAM_STR);
                        $req->execute();
                        $message = "L'enregistrement de $name $firstname, dont l'email est : $email, a été affecté avec succès.";
                    } else {
                        $message = "L'email est déjà utilisé";
                    }
                } catch(EXCEPTION $error) {
                    $message = $error->getMessage();   
                }

            } else { //si les mdp ne sont pas identiques
                $message = "Les mots de passe ne correspondent pas.";
            }
        } else { //si l'adresse mail est pas bonne
            $message = "Merci de renseigner une adresse email valide";
        }

    } else { //si les champs ne sont pas remplis
        $message = "Merci de remplir tous les champs";
    }
}

$bdd = new PDO('mysql:host=localhost;dbname=task', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    try {
        $req= $bdd->prepare("SELECT name_user, firstname_user, email_user FROM users");
        $req->execute();
        $data = $req->fetchAll();
        foreach($data as $users) {
            $usersList= $usersList."<li>{$users['name_user']} {$users['firstname_user']} {$users['email_user']} </li>"; 
        }
    } catch(EXCEPTION $error) {
        $usersList = $error->getMessage();   
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        .message {
            margin-top: 10px;
            color: red;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form method="post">
            <input type="text" placeholder="Nom" name="name_user">
            <br>
            <input type="text" placeholder="Prénom" name="firstname_user">
            <br>
            <input type="text" placeholder="Adresse email" name="email_user">
            <br>
            <input type="password" placeholder="Mot de passe" name="mdp_user">
            <br>
            <input type="password" placeholder="Répéter le mot de passe" name="passwordrepeat">
            <br>
            <input type="submit" value="Inscription" name="submit"> 
        </form>
        <?php echo $message ?>
    </div>
    <h2>Liste des utilisateurs :</h2>
    <?php echo $usersList ?>
    </form>
</body>
</html>