<?php

namespace Controller;
use Model\Connect;

class CinemaController {



    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete=$pdo->query("
            SELECT titre, annee_sortie
            FROM film
        ");

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