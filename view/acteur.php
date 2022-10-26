<?php 
ob_start();
$acteur = $requete->fetch();
?>

<div class="aside">
    <div>
        <h1><?= $acteur["identite"] ?></h1>
        <figure>
            <img class="affiche" src="<?= $acteur["photo"] ?>" alt="photo">
            <figcaption>
                <p>sexe : <?= $acteur["sexe"] ?></p>
                <p>Date de naissance : <?= $acteur["date"] ?></p>
            </figcaption>
        </figure>
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

$titre = "Détail d'un acteur";
$titre_secondaire = "Filmographie";
$contenu = ob_get_clean();
require "view/template.php";