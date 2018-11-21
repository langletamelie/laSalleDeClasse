<?php

$category = NEW categories();
$schoolDegree = NEW schoolDegrees();
$activityBySchoolDegree = NEW activityBySchoolDegree();
$formError = array();

$categoriesList = $category->getCategoriesList();
$schoolDegreesList = $schoolDegree->getSchoolDegreesList();

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
        $formError['selectSchoolDegrees'] = 'Veuillez choisir un ou plusieurs niveau scolaire';
    }

    if (count($formError) == 0) {
        $activity = NEW activities();
        $activity->idCategories = $category;
        $activity->idSchoolDegrees = $schoolDegree;
        $displayActivity = $activity->getActivityByTeacherChoice();
    }
}
