<?php

$activity = NEW activities();
$category = NEW categories();
$schoolDegree = NEW schoolDegrees();
$formError = array();

$categoriesList = $category->getCategoriesList();
$schoolDegreesList = $schoolDegree->getSchoolDegreesList();

if (isset($_POST['submit'])) {

    if (isset($_POST['selectCategories'])) {
        $category = $_POST['selectCategories'];
    }
    if (empty($_POST['selectCategories'])) {
        $formError['selectCategories'] = 'Veuillez choisir une catégorie';
    }

    if (isset($_POST['selectSchoolDegrees'])) {
        $category = $_POST['selectSchoolDegrees'];
    }
    if (empty($_POST['selectSchoolDegrees'])) {
        $formError['selectSchoolDegrees'] = 'Veuillez choisir un ou plusieurs niveau scolaire';
    }

    if (count($formError) == 0) {
        $displayActivity = $activity->getActivityByTeacherChoice();
    } 
}
