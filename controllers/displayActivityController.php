<?php


//affichage de l'activité
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $activity = NEW activities();
    $activity->id = $_GET['id'];
    $displayAnActivity = $activity->displayActivity();
    
}

$favorite = NEW favorites();

if (isset($_POST['addActInFav'])) {

    $favorite->idActivities = $_GET['id'];
    $favorite->idTeachers = $_SESSION['id'];
    $check = $favorite->checkIfTeacherAlreadyAddAnActivityInFavorite();
    //si l'activité n'a pas déjà été ajouter en favori, elle le devient
   
 if ($check === 0) {
     return  $favorite->insertActivityAndTeacherInTableWhenATeacherAddAnActivityInHisFavorites();
 } 
 

}
