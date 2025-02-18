<?php

//exo 2
$a = 12;
$b = 10;
$total = $a + $b;


//exo 3
$prixHT = 7;
$nbArticle = 5;
$TVA = 0.05;
$prixTTC = $prixHT * $nbArticle * (1+ $TVA);

//exo 4
function soustraction($a, $b){
    $c = $a - $b;
    return $c;
}

// exo 5
function arrondir(float $nombre) : float {
    return round($nombre);
}

//exo 6
function somme($a, $b, $c,){
    $d = $a + $b + $c;
    return $d;
}

//exo 7
function moyenne($a, $b, $c){
    $d = ($a + $b + $c) / 3;
    return $d;
}

//exo 8
function tester($nombre){
    if ($nombre > 0) {
        echo "$nombre est positif";
    } else if ($nombre < 0) {
        echo "$nombre et négatif";
    } else {
        echo "$nombre est à la fois positif et négatif";
    }
}

//exo 9

function maxi($a, $b, $c){
    if ($a >= $b && $a >= $c) {
        $maxi = $a ;
    } else if ($b >= $a && $b >= $c) {
        $maxi = $b;
    } else {
        $maxi = $c;
    }
    echo "Le plus grand nombre est $maxi";
}

//exo 10

function mini($a, $b, $c){
    if ($a <= $b && $a <= $c) {
        $mini = $a ;
    } else if ($b <= $a && $b <= $c) {
        $mini = $b;
    } else{
        $mini = $c;
    }
    echo "Le plus petit nombre est $mini";
}

//exo 11

function categorie($age) {
    switch (true) {
        case ($age >= 6 && $age <= 7):
            echo "Poussin";
            break;
        case ($age >= 8 && $age <= 9):
            echo "Pupille";
            break;
        case ($age >= 10 && $age <= 11):
            echo "Minime";
            break;
        case ($age >= 12):
            echo "Cadet";
            break;
        default : 
            echo "âge invalide";
            break;
    }
}

/*function categorie($age) {
    if ($age >= 6 && $age <= 7) {
        echo "Poussin";
    } else if ($age >= 8 && $age <= 9) {
        echo "Pupille";
    } else if ($age >= 10 && $age <= 11) {
        echo "Minime";
    } else if ($age >= 12) {
        echo "Cadet";
    } else {
        echo "âge invalide";
    }
}*/

// Exo 12

/*function valeurMaxi($tableau){
    $valeurMaxi = max($tableau);
    echo "La valeur maximale du tableau est $valeurMaxi";
}*/

function valeurMaxi($tableau){
    $maxi = $tableau[0];
    foreach($tableau as $valeur){
        if ($valeur > $maxi) {
            $maxi = $valeur;
        }
    }
    echo "La valeur maximale du tableau est $maxi";
}

//Exo 13
function moyenneTableau($tableau){
    $somme = 0;
    $compteur = 0;
    foreach($tableau as $valeur){
        $somme += $valeur;
        $compteur ++;
    }
    echo "La moyenne du tableau est " . ($somme / $compteur );
}

// Exo 14
function valeurMini($tableau){
    $mini = $tableau[0];
    foreach($tableau as $valeur){
        if ($valeur < $mini) {
            $mini = $valeur;
        }
    }
    echo "La valeur maximale du tableau est $mini";
}

//Exo 16
function dixSuivants($nbr) {
    for ($j = 1 ; $j <= 10 ; $j++) {
        echo ($nbr + $j) . "<br>";
    }
}

//Exo 17
/*function casesTableau($tableau){
    foreach ($tableau as $element){
        echo $element ."<br>";
    }
}*/

function casesTableau($tableau){
    for($h = 0; $h < count($tableau) ; $h++){
        echo $tableau[$h] ."<br>";
    }
}

// Exo 18
/*function tableaux($grandTableau){
    foreach ($grandTableau as $tableau){
        print_r ($tableau);
        echo "<br>";
    }
}*/

function tableaux($grandTableau){
    for ( $i = 0; $i < count($grandTableau) ; $i++ ) {
        print_r($grandTableau[$i]);
        echo"<br>";
    }
}

//Exo 19
/*function tableauxNombres($grandTableau) {
    foreach ($grandTableau as $tableau){
        foreach ($tableau as $nombre){
            echo $nombre . "<br>";
        }
    }
}*/

function tableauxNombres($grandTableau) {
    for ($i = 0; $i < count($grandTableau) ; $i++ ) {
        for($j = 0; $j < count($grandTableau[$i]); $j++) {
            echo $grandTableau[$i][$j] . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo</title>
</head>
<body>
    <h1> Exo 2</h1>
<?php

echo $total;

?>
    <h1> Exo 3 </h1>
    <?php
    echo $prixHT;
    echo "</br>";
    echo $nbArticle;
    echo "</br>";
    echo $TVA;
    echo "</br>";
    echo $prixTTC;
    ?>

    <h1>Exo 4</h1>
<?php
echo soustraction(5,4);

?>

    <h1> Exo 5</h1>
    <?php
    echo arrondir(12.74546);
    ?>

<h1> Exo 6</h1>
    <?php
    echo somme(4,5,6);
    ?>

<h1> Exo 7</h1>
    <?php
    echo moyenne(7,8,9);
    ?>

<h1> Exo 8</h1>
    <?php
    echo tester(10);
    ?>

<h1> Exo 9</h1>
    <?php
    echo maxi(11,12,13);
    ?>

<h1> Exo 10</h1>
    <?php
    echo mini(14,15,16);
    ?>

<h1> Exo 11</h1>
    <?php
    echo categorie(9,5);
    ?>

<h1> Exo 12</h1>
    <?php
    $tableau3 = [17,18,19];
   echo valeurMaxi($tableau3);
    ?>

<h1> Exo 13</h1>
    <?php
    $tableau4 = [20,21,22];
   echo moyenneTableau($tableau4);
    ?>

<h1> Exo 14</h1>
    <?php
    $tableau5 = [23,24,25];
   echo valeurMini($tableau5);
    ?>
<h1>Exo 15</h1>
<?php
for($i = 1; $i <= 5 ; $i++){
    echo $i . "<br>";
    }
?>

<h1>Exo 16</h1>
<?php
echo dixSuivants(26);
?>

<h1>Exo 17</h1>
<?php
$tableau5 = [27,28,29];
echo casesTableau ($tableau5);;
?>

<h1>Exo 18</h1>
<?php
$bigTab = [[1,2,3],[4,5,6],[7,8,9]];
echo tableaux ($bigTab);;
?>

<h1>Exo 19</h1>
<?php
echo tableauxNombres ($bigTab);;
?>
</body>
</html>
