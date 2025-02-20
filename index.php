<?php 

include "data.php";

$tabData = [];

array_push($tabData, $USERS_HUMAN, $USERS_PET, $USERS_XENO);

function displayHuman($userH){
    echo "<article style= 'border-bottom : 3px solid black;'>
    <h2>nom : {$userH['name']} </h2>
    <p>email : {$userH['email']} </p>
    <p>age : {$userH['age']}  ans</p>
    </article>";
}

function displayPet($userP){
    echo "<article style= 'border-bottom : 3px solid black;'>
    <h2>nom : {$userP['name']} </h2>
    <p>espece : {$userP['espece']} </p>
    <p>age : {$userP['age']}  ans</p>
    <p>propriétaire : {$userP['propriétaire']} </p>
    </article>";
}

function displayXeno($userX){
    echo "<article style= 'border-bottom : 3px solid black;'>
    <h2>nom : {$userX['name']} </h2>
    <p>espece : {$userX['espece']} </p>
    <p>age : {$userX['age']}  ans</p>
    <p>niveau de menace : {$userX['menace']} </p>
    </article>";
}

function displayUser($users) {
    foreach ($users as $user) {
        //print_r($user);
        if ($user['type'] == "humain") {
            displayHuman($user);
        } else if ($user['type'] == "animal de compagnie") {
            displayPet($user);
        } else if ($user['type'] == "Xeno") {
            displayXeno($user);
        } else {
            echo "Type de profil non existant";
        }
    }
}

function displayAll($grandTableau) {
    foreach ($grandTableau as $petitTableau) {
        displayUser($petitTableau);
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
    <?php

    displayHuman($USERS_HUMAN[0]);

    displayPet($USERS_PET[0]);

    displayXeno($USERS_XENO[1]);

    displayUser($USERS_HUMAN);

    displayUser($USERS_PET);

    displayUser($USERS_XENO);

    displayAll($tabData);
    ?>
</body>
</html>