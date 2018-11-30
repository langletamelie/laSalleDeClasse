<?php
//instanciation des objets nécessaires à l'affichage
$category = NEW categories();
$schoolDegree = NEW schoolDegrees();
$activityBySchoolDegree = NEW activityBySchoolDegree();
$formError = array();
//appel des méthodes pour l'affichage des listes déroulantes
$categoriesList = $category->getCategoriesList();
$schoolDegreesList = $schoolDegree->getSchoolDegreesList();
//initialisation des variables
$category = '';
$schoolDegree = '';
$activity = '';
$activityBySchoolDegree = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['selectCategories'])) {
        $category = $_POST['selectCategories'];
    }
    if (empty($_POST['selectCategories'])) {
        $formError['selectCategories'] = 'Veuillez choisir une catégorie';
    }
    if (!empty($_POST['selectSchoolDegrees'])) {
        $schoolDegree = $_POST['selectSchoolDegrees'];
    }
    if (empty($_POST['selectSchoolDegrees'])) {
        $formError['selectSchoolDegrees'] = 'Veuillez choisir un niveau scolaire';
    }
    if (count($formError) == 0) {
        //si il n'y a pas d'erreur, j'affiche le résultat obtenu
        $activity = NEW activities();
        $activity->idCategories = $category;
        $activity->idSchoolDegrees = $schoolDegree;
        $displayActivity = $activity->getActivityByTeacherChoice();
    }
    if (empty($displayActivity)) {
        $message = 'Il n\'y a pas d\'activité pour la sélection demandée';
    }
}
