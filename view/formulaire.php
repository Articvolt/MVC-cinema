<?php 
ob_start(); 
?>

<h2>Ajouter un role</h2>

<form action="">
    <input type="text" name="nomRole" id="nomRole" placeholder="Ajouter un rôle">
    <input type="submit" name="submit" value="ajouter">
</form>

<h2>Ajouter un genre</h2>

<form action="index.php?action=addGenre" method="post">
    <input type="text" name="nomGenre" id="nomGenre" placeholder="Ajouter un genre">
    <input type="url" name="photo" id="photo" pattern="https://.*" placeholder="Ajouter le lien d'une photo">
    <input type="submit" name="submit" value="ajouter">
</form>

<?php
$titre = "formulaire";
$titre_secondaire = "gestion des informations";
$contenu = ob_get_clean();
require "view/template.php";

?> 

