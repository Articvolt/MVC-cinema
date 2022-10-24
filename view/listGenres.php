<?php ob_start(); ?>


<div class="aside">
    <p>Il y a <?= $requete->rowCount() ?> genres enregistrés</p>

    <table>
    <thead>
        <tr>
            <th>TYPE DE GENRE</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $genre) { ?>
                <tr>
                    <td><?= $genre["nomGenre"] ?></td>
                </tr>
        <?php    } ?>
    </tbody>
</table>
</div>


<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";