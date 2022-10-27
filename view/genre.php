<?php 
ob_start(); 
$genre = $requete->fetch();
?>

<div class="aside">
    <div>
        <h1><?= $genre["nomGenre"] ?></h1>
        <img class="affiche" src="<?= $genre["photo"] ?>" alt="photo">
    </div>
    
    <table>
        <thead>
            <tr>
                <th>LISTE DE FILMS</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($requete2->fetchAll() as $casting) { ?>
            <tr>
                <td><a href="index.php?action=film&id=<?=$casting["id_film"]?>"><?= $casting["titre"] ?></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail d'un genre";
$titre_secondaire = "genre";
$contenu = ob_get_clean();
require "view/template.php";