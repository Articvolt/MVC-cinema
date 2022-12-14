<?php 
ob_start(); 
?>


<div class="aside">
    <p>Il y a <?= $requete->rowCount() ?> realisateurs enregistrés</p>

    <table>
    <thead>
        <tr>
            <th>NOM PRENOM</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $realisateur) { ?>
                <tr>
                    <td><a href="index.php?action=realisateur&id=<?=$realisateur["id_personne"]?>"><?= $realisateur["identite"] ?></a></td>
                    <td><?= $realisateur["DATE_FORMAT(p.dateNaissance, '%d/%m/%Y')"] ?></td>
                </tr>
        <?php    } ?>
    </tbody>
</table>
</div>


<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
