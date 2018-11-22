<?php

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $activity = NEW activities();
    $activity->id = $_GET['id'];
    $displayAnActivity = $activity->displayActivity();
}
$category = NEW categories();
$schoolDegree = NEW schoolDegrees();
$actBySchDgr = NEW activityBySchoolDegree();

$categoriesList = $category->getCategoriesList();
$schoolDegreesList = $schoolDegree->getSchoolDegreesList();


if (isset($_POST['submit'])) {

    if (!empty($_POST['name'])) {
//déclaration de la variable avec le htmlspecialchars
        $name = htmlspecialchars($_POST['name']);
    } else {
//si le champs est vide, on stocke le message d'erreur dans le tableau correspondant
        $formError['name'] = 'Veuillez indiquer le nom de l\'atelier';
    }

    if (!empty($_POST['selectCategories'])) {
        $idCategories = $_POST['selectCategories'];
    } else {
        $formError['selectCategories'] = 'Veuillez indiquer la catégorie de l\'atelier';
    }

    if (!empty($_POST['selectSchoolDegrees'])) {
        $idSchoolDegrees = $_POST['selectSchoolDegrees'];
    } else {
        $formError['selectSchoolDegrees'] = 'Veuillez indiquer le ou les niveaux scolaires de l\'atelier';
    }

    if (!empty($_POST['object'])) {
        $object = htmlspecialchars($_POST['object']);
    } else {
        $formError['object'] = 'Veuillez indiquer l\'objectif de l\'atelier';
    }

    if (!empty($_POST['planning'])) {
        $planning = htmlspecialchars($_POST['planning']);
    } else {
        $formError['planning'] = 'Veuillez indiquer comment vous préparez votre atelier';
    }

    if (!empty($_POST['progress'])) {
        $progress = htmlspecialchars($_POST['progress']);
    } else {
        $formError['progress'] = 'Veuillez indiquer comment se déroule l\'atelier';
    }

    if (!empty($_POST['resultOfActivity'])) {
        $resultOfActivity = htmlspecialchars($_POST['resultOfActivity']);
    } else {
        $formError['resultOfActivity'] = 'Veuillez indiquer le résultat obtenu lors de l\'atelier';
    }

    if (count($formError) == 0) {
        try {
            database::getInstance()->beginTransaction();
            $activity->name = $name;
            $activity->idCategories = $idCategories;
            $activity->object = $object;
            $activity->planning = $planning;
            $activity->progress = $progress;
            $activity->resultOfActivity = $resultOfActivity;
            $activity->idTeachers = $_SESSION['id'];
            $activity->updateAnActivity();
            foreach ($idSchoolDegrees as $selectSchDgr) {
                $actBySchDgr->idActivities = $lastId;
                $actBySchDgr->idSchoolDegrees = $selectBySchDgr;
                $actBySchDgr->insertSchoolDegreeInTableWhenATeacherAddAnActivity();
            }


            database::getInstance()->commit();
        } catch (Exception $e) { // catch error message
            database::getInstance()->rollback();
            die('Erreur : ' . $e->getMessage());
        }
    }
}
