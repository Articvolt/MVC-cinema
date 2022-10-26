<?php

$acteur = $requete->fetch();

?>

<div class="aside">
    <div>
        <h1><?= $acteur["identité"] ?></h1>
        <figure>
            <img class="affiche" src="<?= $acteur["photo"] ?>" alt="photo">
            <figcaption>
                <p>Date de naissance : <?= $acteur["DATE_FORMAT(p.dateNaissance, '%d/%m/%Y')"] ?></p>
            </figcaption>
        </figure>
    </div>
    
    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
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