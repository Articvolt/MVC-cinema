<?php 
ob_start(); 
?>


<div class="aside">
    <p>Il y a <?= $requete->rowCount() ?> rôles enregistrés</p>

    <table>
    <thead>
        <tr>
            <th>NOM DU ROLE</th> 
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $role) { ?>
                <tr>
                    <td><a href="index.php?action=role&id=<?=$role["id_role"]?>"><?= $role["nomRole"] ?></a></td>
                </tr>
        <?php    } ?>
    </tbody>
</table>
</div>


<?php

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";
