<?php 
ob_start();
$film = $requete->fetch();
?>

<div class="aside">
    <div>
        <h1><?= $film["titre"] ?></h1>
        <figure>
            <img class="affiche" src="<?= $film["affiche"] ?>" alt="affiche">
            <figcaption>
                <p>Année de sortie : <?= $film["anneeSortie"] ?></p>
            </figcaption>
        </figure>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>SYNOPSIS</th>
                <th>NOTE</th>
                <th>DUREE</th>
                <th>REALISATEUR</th>
                <th>CASTING</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $film["synopsis"] ?></td>
                <td><?= $film["note"] ?> / 5</td>
                <td><?= $film["duree"] ?></td>
                <td><?= $film["realisateur"] ?></td>
                <td class="castingList">
                        <?php foreach($requete2->fetchAll() as $casting) { ?>
                        <?= $casting["listActeur"] ?> dans le rôle de  "<?= $casting["nomRole"] ?>"<br><br>
                        <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail d'un film";
$titre_secondaire = "Détail d'un film";
$contenu = ob_get_clean();
require "view/template.php";