<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    public function listFilms() {

        $pdo = Connect::seConnecter();
        $sql = "SELECT titre, anneeSortieFrance FROM film";
        $requete = $pdo->query($sql);

        require "view/listFilms.php";
    }

    public function listActeurs() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT p.nom, p.prenom
            FROM personne p
            inner join acteur a ON p.id_personne = a.id_personne
        ");
        require "view/listActeurs.php";
    }
}