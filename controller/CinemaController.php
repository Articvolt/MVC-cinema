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
            SELECT r.id_personne, CONCAT(p.prenom,' ',p.nom) AS identite, DATE_FORMAT(p.dateNaissance, '%d/%m/%Y') 
            FROM personne p
            inner join realisateur r ON p.id_personne = r.id_personne
            ORDER BY p.dateNaissance DESC
        ");
        require "view/listRealisateurs.php";
    }

    public function listGenres() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT nomGenre, id_genre
            FROM genre
        ");
        require "view/listGenres.php";
    }

    public function listRoles() {
        $pdo=Connect::seConnecter();
        $requete=$pdo->query("
            SELECT nomRole, id_role
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
            SELECT a.id_personne, sexe, CONCAT(prenom,' ',nom) AS identite, DATE_FORMAT(dateNaissance, '%d/%m/%Y') AS date, photo
            FROM personne p
            INNER JOIN acteur a ON p.id_personne = a.id_personne
            WHERE a.id_personne = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
            SELECT  r.nomRole AS nomRole, f.titre, DATE_FORMAT(f.anneeSortieFrance, '%Y') AS anneeSortie
            FROM film f
            INNER JOIN jouer j ON j.id_film = f.id_film
            INNER JOIN acteur a ON j.id_acteur = a.id_acteur
            INNER JOIN personne p ON a.id_personne = p.id_personne
            INNER JOIN role r ON j.id_role = r.id_role
            WHERE a.id_personne = :id 
            ORDER BY anneeSortie DESC
        ");
        $requete2->execute(
            ["id" => $id]
        );

        require "view/acteur.php";
    }

    public function descriptionRealisateur($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT r.id_personne, sexe, CONCAT(prenom,' ',nom) AS identite, DATE_FORMAT(dateNaissance, '%d/%m/%Y') AS date, photo
            FROM personne p
            INNER JOIN realisateur r ON p.id_personne = r.id_personne
            WHERE r.id_personne = :id;
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
            SELECT r.id_personne, f.titre , DATE_FORMAT(f.anneeSortieFrance, '%Y') AS anneeSortie
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE  r.id_personne = :id
            ORDER BY anneeSortie DESC
        ");
        $requete2->execute(
            ["id" => $id]
        );

        require "view/realisateur.php";
    }

    public function descriptionGenre($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
            SELECT  g.id_genre, nomGenre, photo
            FROM genre g
            WHERE  g.id_genre = :id
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
            SELECT  g.id_genre, titre
            FROM genre g
            LEFT JOIN associer a ON g.id_genre = a.id_genre
            LEFT JOIN film f ON a.id_film = f.id_film
            WHERE  g.id_genre = :id
        ");
        $requete2->execute(
            ["id" => $id]
        );
        require "view/genre.php";
    }

    public function descriptionRole($id) {
        $pdo=Connect::seConnecter();
        $requete=$pdo->prepare("
        SELECT  r.id_role , r.nomRole
        FROM role r 
        WHERE r.id_role = :id
        ");
        $requete->execute(
            ["id" => $id]
        );
        $requete2=$pdo->prepare("
        SELECT  r.id_role, f.titre, CONCAT(p.prenom,' ',p.nom) AS identite, DATE_FORMAT(f.anneeSortieFrance, '%Y') AS anneeSortie
        FROM role r
		INNER JOIN jouer j ON j.id_role = r.id_role
        INNER JOIN film f ON j.id_film = f.id_film       
        INNER JOIN acteur a ON j.id_acteur = a.id_acteur
        INNER JOIN personne p ON a.id_personne = p.id_personne  
        WHERE r.id_role = :id
        ");
        $requete2->execute(
            ["id" => $id]
        );
        require "view/role.php";
    }

}