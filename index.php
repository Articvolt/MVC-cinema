<?php

use Controller\CinemaController;


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$ctrlCinema = new CinemaController();

// En fonction de l'action détectée dans l'URL via la propriété "action", on interagit avec la bonne méthode du controller

// $_GET = tableau associatif des valeurs qui sont introduite via un script dans les paramètres URL
if(isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms" : 
            $ctrlCinema->listFilms(); 
            break;
        case "listActeurs" : 
            $ctrlCinema->listActeurs(); 
            break;
        case "listRealisateurs" : 
            $ctrlCinema->listRealisateurs(); 
            break;
        case "listGenres" :
            $ctrlCinema->listGenres();
            break;
        case "listRoles" :
            $ctrlCinema->listRoles();
            break;
    // CAS PAR CAS
        case "film" :
            $ctrlCinema->descriptionFilm($id);
            break;
        case "acteur" :
            $ctrlCinema->descriptionActeur($id);
            break;
        case "realisateur" :
            $ctrlCinema->descriptionRealisateur($id);
            break;
        case "genre" :
            $ctrlCinema->descriptionGenre($id);
            break;
        case "role" :
            $ctrlCinema->descriptionRole($id);
            break;
    // FORMULAIRE
            case "formulaire":
                $ctrlCinema->formulaire();
            break;
            case "addGenre" :
                $ctrlCinema->ajoutGenre();
            break;
            case "addRole" :
                $ctrlCinema->ajoutRole();
            break;
    }
    // PAR DEFAUT
} else {
    $ctrlCinema->accueil();
}
