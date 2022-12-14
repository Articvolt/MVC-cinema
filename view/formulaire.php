<?php 
ob_start(); 
?>

<h2>Ajouter un role</h2>

<form class="form"  action="index.php?action=addRole" method="post">
    <input type="text" name="nomRole" id="nomRole" placeholder="Ajouter un rôle" required>
    <input type="submit" name="submit"  id="button" value="ajouter">
</form>

<h2>Ajouter un genre</h2>

<form class="form"  action="index.php?action=addGenre" method="post">
    <input type="text" name="nomGenre" id="nomGenre" placeholder="Ajouter un genre" required>
    <input type="url" name="photo" id="photo" pattern="https://.*" placeholder="Ajouter le lien d'une photo" required>
    <input type="submit" name="submit" id="button" value="ajouter">
</form>


<h2>Ajouter un acteur</h2>

<form class="form" action="index.php?action=addActeur" method="post">
    <div class="form-bloc">
        <div class="form-step">
        <label for="form-step">Nom et prénom : </label>
            <input type="text" name="nom" id="nom" placeholder="nom" required>
            <input type="text" name="prenom" id="prenom" placeholder="prenom" required>
        </div>
        <fieldset>
            <legend>Choix du sexe</legend>
            <div>
                <input type="radio" name="sexe" id="M" value="M">
                <label for="M">M</label>
            </div>
            <div>
                <input type="radio" name="sexe" id="F" value="F">
                <label for="F">F</label>
            </div>
        </fieldset>
        <div class="form-step">
            <label for="dateNaissance">Date de naissance : </label>
            <input type="date" name="dateNaissance" id="dateNaissance" required>
            <label for="dateDeces">date décès : </label>
            <input type="date" name="dateMort" id="dateMort">
        </div>
    </div>
    <input type="submit" name="submit" id="button" value="ajouter">
</form>

<h2>Ajouter un realisateur</h2>

<form class="form" action="index.php?action=addRealisateur" method="post">
    <div class="form-bloc">
        <div class="form-step">
            <label for="form-step">Nom et prénom : </label>
            <input type="text" name="nom" id="nom" placeholder="nom" required>
            <input type="text" name="prenom" id="prenom" placeholder="prenom" required>
        </div>
        <fieldset>
            <legend>Choix du sexe</legend>
            <div>
                <input type="radio" name="sexe" id="M" value="M">
                <label for="M">M</label>
            </div>
            <div>
                <input type="radio" name="sexe" id="F" value="F">
                <label for="F">F</label>
            </div>
        </fieldset>
        <div class="form-step">
            <label for="dateNaissance">Date de naissance : </label>
            <input type="date" name="dateNaissance" id="dateNaissance" required>
            <label for="dateDeces">date décès (optionnel) : </label>
            <input type="date" name="dateMort" id="dateMort">
        </div>
    </div>
    <input type="submit" name="submit" id="button" value="ajouter">
</form>

<h2>Ajouter un film</h2>

<form action="index.php?action=addFilm" method="post">
    <input type="text" name="titre" id="titre" placeholder="titre" required>
    <input type="date" name="anneeSortieFrance" id="anneeSortieFrance" required>
    <input type="textarea" name="synopsis" id="synopsis" placeholder="synopsis du film" required>
    <input type="number" name="duree" id="duree" min="1" max="500" placeholder="duree" required>
    <label>Note</label>
    <select name="note" id="note" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <input type="affiche" name="affiche" id="affiche" placeholder="lien affiche" required>
    <select name="id_realisateur">
        <?php
            echo "<option value='default'>Par défaut</option>";

                foreach($realisateurs AS $realisateur) {
                echo "<option value=".$realisateur['id_realisateur'].">".$realisateur['identite']."</option>";
                } ?>
    </select>
    <input type="submit" name="submit" id="button" value="ajouter">
</form>


<?php
$titre = "formulaire";
$titre_secondaire = "gestion des informations";
$contenu = ob_get_clean();
require "view/template.php";

?> 

