<?php 
ob_start();
?>

<div class=aside>
    <p>Il y a <?= $requete->rowCount() ?> films enregistrés</p>

    <table>
        <thead>
            <tr>
                <th>TITRE</th>
                <th>ANNEE SORTIE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $film) { ?>
                    <tr>
                        <td><a href="index.php?action=film&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                        <td><?= $film["DATE_FORMAT(anneeSortieFrance, '%Y')"] ?></td>
                    </tr>
            <?php    } ?>
        </tbody>
    </table>
</div>


<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";