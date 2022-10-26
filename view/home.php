<?php 
ob_start(); 
?>

<section class="aside">
    <div>
        <p>Réalisation d'un "design patern" sur l'exercice "cinema".</p>
        <br>
        <p>L'objectif est de pouvoir afficher la base de données via des requêtes SQL via PDO.</p>
    </div>
    <img src="public/img/cinema.jpg" alt="cinema">
</section>

<?php

$titre = "Accueil";
$titre_secondaire = "ENONCE DE L'EXERCICE";
$contenu = ob_get_clean();
require "view/template.php";
