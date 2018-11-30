<?php
// instanciation des objets nécessaires à l'ajout d'atelier
$activity = NEW activities();
$category = NEW categories();
$schoolDegree = NEW schoolDegrees();
$actBySchDgr = NEW activityBySchoolDegree();
$teacher = NEW teachers();
// déclaration des variables qui permettent l'affichage des listes déroulantes grâce aux méthodes associées
$categoriesList = $category->getCategoriesList();
$schoolDegreesList = $schoolDegree->getSchoolDegreesList();
//initialisation des variables
$lastId = 0;
$idCategories = 0;
$idActivities = 0;
$idSchoolDegrees = 0;
// déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['addActivityButton'])) {
    if (!empty($_POST['name'])) {
// application du htmlspecialchars (converti les caractères spéciaux en entité html) pour ensuite stocker la valeur dans une variable
        $name = htmlspecialchars($_POST['name']);
    } else {
// si le champs est vide, on stocke le message d'erreur dans le tableau correspondant
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
        // si il n'y a aucune erreur dans le formulaire  on débute la transaction
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
            $activity->addActivity();
            // on récupère l'id qui a été précédement créer par le biais de la méthode addActivity() grâce à la méthode getLastInsertId()
            $lastId = database::getLastInsertId();
            // boucle permettant d'ajouter autant de niveau scolaire 
            foreach ($idSchoolDegrees as $selectBySchDgr) {
                $actBySchDgr->idActivities = $lastId;
                $actBySchDgr->idSchoolDegrees = $selectBySchDgr;
                $actBySchDgr->insertSchoolDegreeAndIdActivitiesInTableWhenATeacherAddAnActivity();
            }
            database::getInstance()->commit();
            $message = 'Votre atelier a été enregistré';
            //si la transaction a réussi, on affiche un message de réusite
        } catch (Exception $error) {
            database::getInstance()->rollback();
            die($message = 'Il y a eu une erreur');
            //si la transaction a échouée, elle "annule" toutes les méthodes effectuées durant celle-ci et on affiche un message d'erreur
        }
    }
}




