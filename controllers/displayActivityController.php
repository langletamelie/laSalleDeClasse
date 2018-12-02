<?php

//affichage de l'activité en récupérant l'id via la superglobale $_GET
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $activity = NEW activities();
    $activity->id = $_GET['id'];
    $displayAnActivity = $activity->displayActivity();
}
//instanciation de l'objet favorites
$favorite = NEW favorites();

if (isset($_POST['addActInFav'])) {

    $favorite->idActivities = $_GET['id'];
    $favorite->idTeachers = $_SESSION['id'];
    //vérification que l'atelier n'est pas déjà enregistré dans les favoris du professeur
    $check = $favorite->checkIfTeacherAlreadyAddAnActivityInFavorite();
    
    //si l'activité n'a pas déjà été ajouter en favori, elle le devient
    if ($check == 0) {
        return $favorite->insertActivityAndTeacherInTableWhenATeacherAddAnActivityInHisFavorites();
    }
}
