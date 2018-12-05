<?php
//instanciation des objets nécessaire à la modification de l'atelier
$category = NEW categories();
$schoolDegree = NEW schoolDegrees();
$actBySchDgr = NEW activityBySchoolDegree();


if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $activity = NEW activities();
    $activity->id = $_GET['id'];
    $displayAnActivity = $activity->displayActivity();
    $actBySchDgr->idActivities = $_GET['id'];
    $displaySchDgr = $actBySchDgr->getAllTheSchoolDegreesIds();
}
//appel des méthodes pour l'affichage des listes déroulantes
$categoriesList = $category->getCategoriesList();
$schoolDegreesList = $schoolDegree->getSchoolDegreesList();

//déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['modifyAct'])) {
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
 // transmission des données qui ont été stocker dans les variables à mon objet activity
            $activity->name = $name;
            $activity->idCategories = $idCategories;
            $activity->object = $object;
            $activity->planning = $planning;
            $activity->progress = $progress;
            $activity->resultOfActivity = $resultOfActivity;
            $activity->idTeachers = $_SESSION['id'];
            $activity->updateAnActivity();
            $actBySchDgr->idActivities = $_GET['id'];
            //suppression des données de la table activityBySchoolDegrees
            $actBySchDgr->deleteSchDgrByActivity();
            foreach ($idSchoolDegrees as $selectBySchDgr) {
                $actBySchDgr->idActivities = $_GET['id'];
                $actBySchDgr->idSchoolDegrees = $selectBySchDgr;
                //ajout des valeurs sélectionnés dans la liste déroulante dans la table activityBySchoolDegrees
                $actBySchDgr->insertSchoolDegreeAndIdActivitiesInTableWhenATeacherAddAnActivity();
            }
            database::getInstance()->commit();
            $message = 'Votre atelier a été modifié';
            //si la transaction a réussi, on affiche un message de réusite
        } catch (Exception $error) { 
            database::getInstance()->rollback();
            die($message = 'La modification n\'as pas été prise en compte');
        }
    }
}
