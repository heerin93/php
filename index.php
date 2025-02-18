<?php

echo "Hello";
$maVariable = 10;
$maVariable = "bonjour";
$monTab3 = [1,2,3,4,5];

$test = "Hello";
$fruit = "pomme";

$notes = [
    "français" => 12,
    "maths" => 16,
    "svt" => 15
];

//$message1 = "div> <h2>Test sans Buffering </h2>
//<p> ça marche bien ! </p> </div>"

//ob_start permet de collecter et mettre en tampon tout le code qui le suit
ob_start();
?>

<h2> Voyons ce que donne le buffering</h2>
<p> ça marche aussi !</p>

<?php
$message2 = ob_get_clean();
//ob_get_clean permet de récolter tout le code mis en tampon pour l'assigner à une varaible
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon premier script PHP</title>
</head>
<body>
    <h1> Mon premier programme </h1>
    <?php
        echo "<p>coucou</p>";
        //commenter une ligne
        /* commentaire
        sur plusieurs
        lignes */
        $message = "Bonjour tout le monde";
    ?>
    <p>
        <?php
        echo $maVariable;

        //Concaténation : 1ère méthode
        echo "<h2>".$maVariable." On est lundi !</h2>";

        // Concaténation : 2ème méthode
        echo "<h3> $maVariable Prêts ?</h3>";

        //Afficher le nom de la variable ("$maVaraible") : il me faut le caractère d'échapemment \
        echo "\$maVariable = $maVariable";

        // Concaténation : 3ème méthode
        echo "<h4> {$monTab3[3]} euros </h4>";
        echo "<h6> Je vous dis {$maVariable}</h6>";

        echo gettype($maVariable);
        echo "<p>".gettype ($monTab3)."</p>";

        echo "<div>";

        ?>

        Le contenu de ma div.

        <?php
        echo "</div>";
        ?>
        <!-- Syntaxe alternative du echo -->
        <?= "<p> Ce que je veux afficher </p>" ?>
        <p><?=$message ?></p>

        <!-- Syntaxe alternative du if ... else -->
         <?php if($test): ?>
            <p> La condition est validée</p>
        <?php else : ?> 
            <div>
                <p> C'est pas valide</p>
            </div>
        <?php endif; ?>
        <!-- Existe pour le if, le switch...case, le foreach, le for et le while -->
         <!-- alternative switch -->
        <?php switch($fruit):
        case "pomme":?>
            <p> Le fruit est une pomme </p>

        <?php case "framboise" :?>
            <p> Le fruit est une framboise</p>
        <?php endswitch; ?>

        <!-- alternative du foreach -->
         <?php foreach($notes as $matiere => $note) : ?>
            <p> L'élève a eu <?= $note ?> en <?= $matiere ?></p>
         <?php endforeach; ?>

         <!-- Syntaxr alternativedu for -->
          <?php for($i =0; $i <5; $i++) : ?>
            <div>
                <p> Chapitre <?= $i ?> </p>
            </div>
        <?php endfor; ?>
        <?= $message2 ?>

    </p>
    
</body>
</html>
<?php
$message = "Bonjour tout le monde";
//LES VARIABLES
$maVariable = 10;
$maVariable = "bonjour";
echo $maVariable;
echo "<br>";
$monTab = ["salut", 42, "La réponse à l'univers"];
$monTab2 = array("test",25,45);
var_dump($monTab);
echo"<br>";
print_r($monTab2);

//LES FONCTIONS
function nom_de_la_fonction(){
    echo "Ma fonction";
}
echo "<br>";
nom_de_la_fonction();

function addition($a, $b){
    $c = $a + $b;
    return $c;
}
echo addition(5,6);
echo "<br>";
$a = 79;
$b = 45;
//La comparaison combinée
if (($a <=>$b) == 0){
    echo "égaux";
} else if (($a <=> $b) == 1){
    echo "a est plus grand";
} else {
    echo "a plus petit";
}
echo "<br>";
if ($a <=>$b) {
    echo "true";
} else { 
    echo "false";
}
echo "<br>";
// les opérateurs logiques
if ($a>10 and $a<15){
    echo "a est compris entre 10 et 15";
}else if ($a>10 && $a<11){
    echo "a est compris entre 10 et 11";
}else {
    echo "erreur";
}

echo "<br>";
//switch case
$value = 5;

switch($value) {
    case 1:
        echo "\$value vaut 1";
        break;
    case 2:
        echo "\$value vaut 2";
        break;
    case 3:
        echo "\$value vaut 3";
        break;
    case 4:
        echo "\$value vaut 4";
        break;
    case 5:
        echo "\$value vaut 5";
        break;
}  
echo "<br>";
//Boucles
// for
for($i=0; $i <10; $i++){
    echo "ceci est une boucle for";
    echo "<br>";
}

// while
$i = 0;

while ($i < 10) {
    echo "ceci est une boucle while";
    echo "<br>";
    $i++;
}

//for each
$tableau = ["valeur1" , "valeur2" , "valeur3"];
foreach($tableau as $valeur){
    echo "$valeur<br/>";
}
$tableauA = [
    "propriété1" =>"valeur1",
    "prénom" => "Juste",
    "nom" => "Leblanc"
   //notes" => [1,2,3]
];
foreach($tableauA as $cle=>$valeur){
    echo "$cle : $valeur<br/>";
}

// accéder à une valeur

$tableauB= [
    "propriété1" =>"valeur1",
    "prénom" => "Juste",
    "nom" => "Leblanc",
    "notes" =>[1,2,3]
];
echo $tableau[0];
echo "<br>";

echo $tableauB["prénom"];
echo "<br>";
print_r($tableauB["notes"]);
print_r($tableauB["notes"][0]);
echo "<br>";
$tableau[] = 10;
print_r($tableau);
echo "<br>";

array_push($tableau, 20);
print_r($tableau);
echo "<br>";

array_push($tableau, 20, 15, 13);
print_r($tableau);
echo "<br>";

//Ajouter une nouvel élément au début d'un tableau indexé
array_unshift($tableau, "Nouveau premier");
print_r($tableau);
echo "<br>";

//Tableau associatif
print_r($tableauB);
echo "<br>";

// ajouter un nouvl élément à un tableau associatif
$tableauB["nouvelleCle"] = "C'est la nouvelle clé";
print_r($tableauB);
echo"<br>";

//Modifier une vlaeur
//Tableau indexé
$tableau[0] = "Nouvelle valeur 1";
print_r($tableau);
echo"<br>";

//Tableau associatif
$tableauB["prénom"] = "Nouveau prénom";
print_r($tableauB);
echo "<br>";

//Supprimer une valeur
//Tableau indexé
array_pop($tableau); // supprime la dernière valeur
print_r($tableau);
echo "<br>";

array_shift($tableau); // supprime la première valeur
print_r($tableau);
echo "<br>";

//Tablau associatif
array_pop($tableauB); // supprimer la dernière valeur
print_r($tableauB);
echo"<br>";

array_shift($tableauB); // supprime la première valeur
print_r($tableauB);
echo "<br>";

// Parcourir un tableau de manière automatique
//boucle Foreach
//Tableau indexé
echo "<p>Affichage de mon tableau indexé avec Foreach</p>";
foreach($tableau as $element) {
    echo "$element <br>";
}
echo "<br>";

//Tableau associatif
foreach($tableauA as $cle => $valeur){
    echo "<p> $cle : $valeur </p>";
}
echo "<br>";

?>

