<?php ob_start(); ?>


<div class="aside">
    <p>Il y a <?= $requete->rowCount() ?> acteurs enregistrés</p>

    <table>
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $acteur) { ?>
                <tr>
                    <td><?= $acteur["nom"] ?></td>
                    <td><?= $acteur["prenom"] ?></td>
                    <td><?= $acteur["DATE_FORMAT(p.dateNaissance, '%d/%m/%Y')"] ?></td>
                </tr>
        <?php    } ?>
    </tbody>
</table>
</div>


<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";

// temporisation permet de travailler sur le contenu avant de l'envoyer au navigateur

// ob_start() = enclenche la temporisation de sortie
// ob_get_clean() = lit le contenu courant du tampon de sortie puis l'efface