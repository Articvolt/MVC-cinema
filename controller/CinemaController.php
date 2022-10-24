<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete=$pdo->query("
        SELECT titre, DATE_FORMAT(anneeSortieFrance, '%Y') 
        FROM film
        ORDER BY anneeSortieFrance DESC
    ");
        require "view/listFilms.php";
    }

    public function listActeurs() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT p.nom, p.prenom,DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') 
            FROM personne p
            inner join acteur a ON p.id_personne = a.id_personne
            ORDER BY p.dateNaissance DESC
        ");
        require "view/listActeurs.php";
    }

    public function listRealisateurs() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT p.nom, p.prenom,DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') 
            FROM personne p
            inner join realisateur r ON p.id_personne = r.id_personne
            ORDER BY p.dateNaissance DESC
        ");
        require "view/listRealisateurs.php";
    }

    public function listGenres() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT nomGenre
            FROM genre
        ");
        require "view/listGenres.php";
    }
    
    public function listRoles() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT nomRole
            FROM role
        ");
        require "view/listRoles.php";
    }

    public function accueil() {
        require "view/home.php";
    }


}