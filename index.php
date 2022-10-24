<?php

use Controller\CinemaController;


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

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
    }
    // affiche par défaut
} else {
    $ctrlCinema->accueil();
}
