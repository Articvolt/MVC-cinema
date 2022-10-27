<?php 
ob_start();
$role = $requete->fetch();
?>

<div class="aside">
    <div>
        <h1><?= $role["nomRole"] ?></h1>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>ANNEE DE SORTIE</th>
                <th>Acteur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requete2->fetchAll() as $roles) { ?>
            <tr>
                <td><a href="index.php?action=film&id=<?=$roles["id_film"]?>"><?= $roles["titre"] ?></a></td>
                <td><?= $roles["anneeSortie"] ?></td>
                <td><a href="index.php?action=acteur&id=<?=$roles["id_personne"]?>"><?= $roles["identite"] ?></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail d'un role";
$titre_secondaire = "role";
$contenu = ob_get_clean();
require "view/template.php";