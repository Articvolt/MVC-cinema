<?php ob_start(); ?>

<h1>HOME</h1>

<p></p>

<?php

$titre = "Home";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";
