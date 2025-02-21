
<main>
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
</main>
