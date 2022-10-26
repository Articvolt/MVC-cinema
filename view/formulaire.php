<?php 
ob_start(); 
?>



<?php
$titre = "formulaire";
$titre_secondaire = "gestion des informations";
$contenu = ob_get_clean();
require "view/template.php";