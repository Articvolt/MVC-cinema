<?php

$acteur = $requete->fetch();

?>

<div class="aside">
    <div>
        <h1><?= $acteur["identite"] ?></h1>
        <figure>
            <img class="affiche" src="<?= $acteur["photo"] ?>" alt="photo">
            <figcaption>
                <p>Date de naissance : <?= $acteur["date"] ?></p>
            </figcaption>
        </figure>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>ROLE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>


<?php

$titre = "Détail d'un acteur";
$titre_secondaire = "Filmographie";
$contenu = ob_get_clean();
require "view/template.php";