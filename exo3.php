<?php
//exo 20
/*$value = '';
    if(isset($_POST['somme'])) {
        if(isset($_POST['nombre1']) && is_numeric($_POST['nombre1']) && isset($_POST['nombre2']) && is_numeric($_POST['nombre2'])){
            $value = $_POST['nombre1'] + $_POST['nombre2'];
        }
    }*/
//exo 21
$value ='';
if(isset($_POST['somme'])){
    if(isset($_POST['prixHT']) && !empty($_POST['prixHT'] ) && ($_POST['nbArticle']) && !empty($_POST['nbArticle']) && ($_POST['TVA']) && !empty($_POST['TVA'])) {
        $value = $_POST['prixHT']*$_POST['nbArticle'] * (1+ $_POST['TVA']);
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
   <!-- <form method="post">
        <input type ="number" name = "nombre1">
        <br>
        <input type ="number" name = "nombre2">
        <br>
        <input type="submit" name="somme" value="Calculer">
    </form>
    <p>La somme est égale à  <//?= $value ?> </p> -->

        <form method="post">
        <input type ="number" name = "prixHT">
        <br>
        <input type ="number" name = "nbArticle">
        <br>
        <input type ="number" step = "0.01" required name = "TVA">
        <br>
        <input type="submit" name="somme"  value="Prix Total">
    </form>
    <p>Le prix TTC est égal à  <?= $value ?> € </p>
</body>
</html>