<?php ob_start(); ?>

<?php
$realisateur = $requete->fetch();
?>

<div class="aside">
    <div>
        <h1><?= $realisateur["identite"] ?></h1>
        <figure>
            <img class="affiche" src="<?= $realisateur["photo"] ?>" alt="photo">
            <figcaption>
                <p>sexe : <?= $realisateur["sexe"] ?></p>
                <p>Date de naissance : <?= $realisateur["date"] ?></p>
            </figcaption>
        </figure>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>ANNEE DE SORTIE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($requete2->fetchAll() as $casting) { ?>
            <tr>
                <td><a href="index.php?action=film&id=<?=$casting["id_film"]?>"><?= $casting["titre"] ?></td>
                <td><?= $casting["anneeSortie"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail d'un réalisateur";
$titre_secondaire = "Filmographie";
$contenu = ob_get_clean();
require "view/template.php";