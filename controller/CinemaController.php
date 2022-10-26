<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete=$pdo->query("
        SELECT id_film, titre, DATE_FORMAT(anneeSortieFrance, '%Y') 
        FROM film
        ORDER BY anneeSortieFrance DESC
    ");
        require "view/listFilms.php";
    }

// LISTES
    public function listActeurs() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT a.id_personne, CONCAT(p.prenom,' ',p.nom) AS identité ,DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') AS date
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

// AFFICHER AU DETAIL

    public function descriptionFilm($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT titre, DATE_FORMAT(f.anneeSortieFrance, '%Y') AS anneeSortie, synopsis, affiche, note, SEC_TO_TIME(f.duree *60) AS duree , CONCAT(p.prenom,' ',p.nom) AS realisateur
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE f.id_film = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
        SELECT CONCAT(p.prenom,' ', p.nom) AS listActeur, r.nomRole AS nomRole
        FROM film f
        INNER JOIN jouer j ON j.id_film = f.id_film
        INNER JOIN acteur a ON j.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne
        INNER JOIN role r ON j.id_role = r.id_role
        WHERE f.id_film = :id;
        ");
        $requete2->execute(
            ["id" => $id]
        );

        require "view/film.php";
    }
    public function descriptionActeur($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT a.id_personne, CONCAT(prenom,' ',nom) AS identite, DATE_FORMAT(dateNaissance, '%d/%m/%Y') AS date, photo
            FROM personne p
            INNER JOIN acteur a ON p.id_personne = a.id_personne
            WHERE a.id_personne = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        // $requete2=$pdo->prepare("

        // ");
        // $requete2->execute(
        //     ["id" => $id]
        // );

        require "view/acteur.php";
    }

}