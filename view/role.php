<?php

$acteur = $requete->fetch();

?>

<div class="aside">
    <div>
        <h1><?= $acteur["identite"] ?></h1>
        <img class="affiche" src="<?= $acteur["photo"] ?>" alt="photo">
    </div>
    
    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>ANNEE DE SORTIE</th>
                <th>ROLE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requete2->fetchAll() as $casting) { ?>
            <tr>
                <td><?= $casting["titre"] ?></td>
                <td><?= $casting["anneeSortie"] ?></td>
                <td><?= $casting["nomRole"] ?></td>
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