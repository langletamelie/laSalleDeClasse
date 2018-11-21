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
    try {
        database::getInstance()->beginTransaction();
        if (!empty($_POST['activityName'])) {
//déclaration de la variable avec le htmlspecialchars
            $activity->name = htmlspecialchars($_POST['activityName']);
        } else {
//si le champs est vide, on stocke le message d'erreur dans le tableau correspondant
            $formError['activityName'] = 'Veuillez indiquer le nom de l\'activité';
        }

        if (!empty($_POST['selectCategories'])) {
            $activity->idCategories = $_POST['selectCategories'];
        } else {
            $formError['selectCategories'] = 'Veuillez indiquer la catégorie de l\'atelier';
        }

        if (!empty($_POST['selectSchoolDegrees'])) {
            $actBySchDgr->idSchoolDegrees = $_POST['selectSchoolDegrees'];
        } else {
            $formError['selectSchoolDegrees'] = 'Veuillez indiquer le ou les niveaux scolaires de l\'atelier';
        }

        if (!empty($_POST['object'])) {
            $activity->object = htmlspecialchars($_POST['object']);
        } else {
            $formError['object'] = 'Veuillez indiquer l\'objectif de l\'atelier';
        }

        if (!empty($_POST['planning'])) {
            $activity->planning = htmlspecialchars($_POST['planning']);
        } else {
            $formError['planning'] = 'Veuillez indiquer comment vous préparez votre atelier';
        }

        if (!empty($_POST['progress'])) {
            $activity->progress = htmlspecialchars($_POST['progress']);
        } else {
            $formError['progress'] = 'Veuillez indiquer comment se déroule l\'atelier';
        }

        if (!empty($_POST['resultOfActivity'])) {
            $activity->resultOfActivity = htmlspecialchars($_POST['resultOfActivity']);
        } else {
            $formError['resultOfActivity'] = 'Veuillez indiquer le résultat obtenu lors de l\'atelier';
        }

        if (count($formError) == 0) {
            $activity = NEW activities();
            $activity->idTeachers = $_SESSION['id'];
            $activity->addActivity();
            $lastId = database::getLastInsertId();
            $actBySchDgr->idActivities = $lastId;
            $actBySchDgr->insertActivityInTableWhenATeacherAddAnActivity();
            
            foreach($_POST['selectSchoolDegrees'] as $selectSchDgr) {
                $selectSchDgr = $actBySchDgr->idSchoolDegrees;
                $actBySchDgr->insertSchoolDegreeInTableWhenAteacherAddAnActivity();
            }
           
        }
        database::getInstance()->commit();
    } 
    catch (Exception $e) { // catch error message
        database::getInstance()->rollback();
        die('Erreur : ' . $e->getMessage());
    }
}
