<?php

$role = $requete->fetch();

?>

<div class="aside">
    <div>
        <h1><?= $role["nomRole"] ?></h1>
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
            <?php foreach($requete->fetchAll() as $role) { ?>
            <tr>
                <td><?= $role["titre"] ?></td>
                <td><?= $role["anneeSortie"] ?></td>
                <td><?= $role["identite"] ?></td>
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