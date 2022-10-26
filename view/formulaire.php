<?php 
ob_start(); 
?>

<h2>Ajouter un role</h2>

<form action="">
    <input type="text" name="nomRole" id="nomRole" placeholder="Ajouter un rôle">
    <input type="submit" name="submit" value="ajouter">
</form>

<?php
$titre = "formulaire";
$titre_secondaire = "gestion des informations";
$contenu = ob_get_clean();
require "view/template.php";

?> 

<h2>Ajouter un genre</h2>

