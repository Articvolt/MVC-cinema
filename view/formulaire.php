<?php 
ob_start(); 
?>

<h2>Ajouter un role</h2>

<form class="form"  action="index.php?action=addRole" method="post">
    <input type="text" name="nomRole" id="nomRole" placeholder="Ajouter un rôle" required>
    <input type="submit" name="submit" value="ajouter">
</form>

<h2>Ajouter un genre</h2>

<form class="form"  action="index.php?action=addGenre" method="post">
    <input type="text" name="nomGenre" id="nomGenre" placeholder="Ajouter un genre" required>
    <input type="url" name="photo" id="photo" pattern="https://.*" placeholder="Ajouter le lien d'une photo" required>
    <input type="submit" name="submit" value="ajouter">
</form>


<h2>Ajouter un acteur</h2>

<form class="form" action="index.php?action=addActeur" method="post">
    <input type="text" name="nom" id="nom" placeholder="nom" required>
    <input type="text" name="prenom" id="prenom" placeholder="prenom" required>
    <fieldset>
        <legend>Choix du sexe</legend>
        <div>
            <input type="radio" name="sexe" id="M">
            <label for="M">M</label>
        </div>
        <div>
            <input type="radio" name="sexe" id="F">
            <label for="F">F</label>
        </div>
    </fieldset>
    <label for="dateNaissance">Date de naissance : </label>
    <input type="date" name="dateNaissance" id="dateNaissance" required>
    <label for="dateDeces">date décès : </label>
    <input type="date" name="dateMort" id="dateMort">
    <input type="submit" name="submit" value="ajouter">
</form>

<?php
$titre = "formulaire";
$titre_secondaire = "gestion des informations";
$contenu = ob_get_clean();
require "view/template.php";

?> 

